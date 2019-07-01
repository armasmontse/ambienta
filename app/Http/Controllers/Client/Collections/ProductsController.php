<?php

namespace App\Http\Controllers\Client\Collections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\Category;

class ProductsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $public_product)
    {
		$data = [
			'public_product' => $public_product,
            'related' => $public_product->getRelatedProducts()
		];

        return view("client.collections.products.show", $data);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function categories(Category $public_category)
	{
		$query =  Product::with('languages', 'photos', 'publish')
			->whereHas('categories', function($query) use ($public_category){
				return $query->whereIn("id",[ $public_category->id]);
			});

		if( !($this->user && $this->user->hasPermission('manage_products')) ){
			$query = $query->published();
		}

		$data = [
			'category' 	=> $public_category,
			'products' 	=> $query->get()
		];

		return view("client.collections.products.index", $data);
	}

}
