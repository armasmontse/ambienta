<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products\Product;
use App\Models\Publish;

use App\Http\Requests\Admin\Products\AssociateProductsCategoriesRequest;
use App\Http\Requests\Admin\Products\AssociateProductsCollectionsRequest;
use App\Http\Requests\Admin\Products\AssociateProductsRequest;

use App\Http\Requests\Admin\Products\CreateProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;

use Response;
use Redirect;

class ManageProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Product::with("languages","categories.languages","photos.languages", "publish","collections.languages")->get()->map(function($product){
		   return (object)[
			   'code'					=> $product->code,
			   'edit_url'				=> $product->edit_url,
			   'id'						=> $product->id,
			   'implode_categories'		=> $product->implode_categories,
			   'implode_collections'	=> $product->implode_collections,
			   'public_url'				=> $product->public_url,
			   'publish_format_date'	=> $product->publish_format_date,
			   'publish_label'		    => $product->publish_label,
			   'title'					=>	$product->title,
               'thumbnail_image'        => $product->thumbnail_image_minified,
		   ];
	   });
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexView()
	{
	   return view('admin.products.index');
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = [
			"product"	=> new Product,
			'publishes_list' => Publish::getPublishesList(),
		];
        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $new_product = Product::create([
            'publish_id'    => $input['publish_id'],
            'publish_at'    => $input['publish_at'],
            'code'   		=> Product::generateUniqueCode(implode(" ", $input["title"])  ),
        ]);

        if (!$new_product) {
            return Redirect::back()->withErrors([trans('manage_products.create.error')]);
        }

        foreach ($this->languages as $language) {
            $title = $input['title'][$language->iso6391];
            $new_product->updateTranslationByIso($language->iso6391,[
                'title'     	=> $title,
                'slug'      	=> Product::generateUniqueSlug($title, $language->iso6391),
                'description'   => $input['description'][$language->iso6391],
            ]);
        }

        return Redirect::route('admin::products.edit', [$new_product->id])->with('status', trans('manage_products.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
		$data = [
			"product"	=> $product,
			'publishes_list' => Publish::getPublishesList(),
            'seo' => $product->getOrCreateSeo()
		];
       return view('admin.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
		$input = $request->all();

		$product->publish_id 	= $input['publish_id'];
		$product->publish_at 	= $input['publish_at'];

		if (!$product->save()) {
			return Redirect::back()->withErrors([trans('manage_products.update.error')]);
		}

		foreach ($this->languages as $language) {
			$title =  $input['title'][$language->iso6391];
			$product->updateTranslationByIso($language->iso6391,[
				'title'     => $title,
				'slug'      => $product->updateUniqueSlug($title, $language->iso6391),
				'description'   => $input['description'][$language->iso6391],
			]);
		}

		return Redirect::route('admin::products.edit', [$product->id])->with('status', trans('manage_products.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

		if (!$product->isDeletable()){
		  return Response::json([
			'error'=> [trans('manage_products.deletable.error')]
		  ],422);
		}

		if (!$product->categories->isEmpty()) {
            if (!$product->categories()->detach()) {
				return Response::json([
				  'error'=> [trans('manage_products.delete.categories_error')]
				],422);
            }
        }

		if (!$product->related->isEmpty()) {
            if (!$product->related()->detach()) {
				return Response::json([
				  'error'=> [trans('manage_products.delete.related_error')]
				],422);
            }
        }

        if (!$product->products->isEmpty()) {
            if (!$product->products()->detach()) {
				return Response::json([
				  'error'=> [trans('manage_products.delete.products_error')]
				],422);
            }
        }

		if (!$product->collections->isEmpty()) {
            if (!$product->collections()->detach()) {
				return Response::json([
				  'error'=> [trans('manage_products.delete.collections_error')]
				],422);
            }
        }

        if (!$product->photos->isEmpty()) {
            if (!$product->photos()->detach()) {
				return Response::json([
				  'error'=> [trans('manage_products.delete.photos_error')]
				],422);
            }
        }

        if (!$product->languages()->detach()) {
			return Response::json([
			  'error'=> [trans('manage_products.delete.lang_error')]
			],422);
        }

        if (!$product->delete()) {
			return Response::json([
			  'error'=> [trans('manage_products.delete.error')]
			],422);
        }

        return Response::json([
            'message' => [trans('manage_products.delete.success')],
            'success' => true
        ]);
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function categories(AssociateProductsCategoriesRequest $request, Product $product)
	{
		$input = $request->all();
		$categories = isset($input['categories']) ? $input['categories'] : [];
		$product->categories()->sync($categories);

		return Response::json([
			'data'    => $product->load('categories')->categories_ids,
			'message' => [trans('manage_products.associate.categories.success')],
			'success' => true
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function collections(AssociateProductsCollectionsRequest $request, Product $product)
	{
		$input = $request->all();
		$collections = isset($input['collections']) ? $input['collections'] : [];
		$product->collections()->sync($collections);

		return Response::json([
			'data'    => $product->load('collections')->collections_ids,
			'message' => [trans('manage_products.associate.collections.success')],
			'success' => true
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function products(AssociateProductsRequest $request, Product $product)
	{
		$input = $request->all();
		$products = isset($input['products']) ? $input['products'] : [];
		$product->products()->sync($products);

		return Response::json([
			'data'    => $product->load('products')->products_ids,
			'message' => [trans('manage_products.associate.products.success')],
			'success' => true
		]);
	}
}
