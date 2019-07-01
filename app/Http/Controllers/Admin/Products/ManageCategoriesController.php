<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\Categories\CreateCategoryRequest;
use App\Http\Requests\Admin\Products\Categories\UpdateCategoryRequest;
use App\Models\Products\Category;
use Response;

class ManageCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('admin.products.categories.index');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Category::getWithTranslations()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**z
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $category = Category::create([]);

        if (!$category) {
            return Response::json([
                'error' => [trans('manage_categories.create.error')]
            ], 422);
        }

        foreach ($this->languages as $language) {
            $name = $input["label"][$language->iso6391];
            $category->updateTranslationByIso($language->iso6391,[
                'label'         => $name,
                'slug'          => Category::generateUniqueSlug($name)
            ]);
        }

        return Response::json([ // todo bien
            'data'    => Category::find($category->id),
            'message' => [trans('manage_categories.create.success')],
            'success' => true
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $input = $request->all();

        foreach ($this->languages as $language) {

            $name = $input["label"][$language->iso6391];

            $category->updateTranslationByIso($language->iso6391,[
                'label'         => $name,
                'slug'          => $category->updateUniqueSlug($name, $language->iso6391)
            ]);
        }

        return Response::json([ // todo bien
            'data'    => Category::find($category->id),
            'message' => [trans('manage_categories.update.success')],
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

      if (!$category->isDeletable()){
        return Response::json([
          'error'=> [trans('manage_categories.deletable.error')]
        ],422);
      }

      if (!$category->languages()->detach()) {
          return Response::json([
              'error' => [trans('manage_categories.delete.error')]
            ], 422);
      }

      if (!$category->delete()) {
          return Response::json([
              'error' => [trans('manage_categories.delete.error')]
            ], 422);
      }

      return Response::json([ // todo bien
          'message' => [trans('manage_categories.delete.success')],
          'success' => true
      ]);


    }

}
