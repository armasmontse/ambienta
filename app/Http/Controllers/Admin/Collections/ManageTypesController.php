<?php

namespace App\Http\Controllers\Admin\Collections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collections\Type;
use App\Http\Requests\Admin\Collections\Types\CreateTypeRequest;
use App\Http\Requests\Admin\Collections\Types\UpdateTypeRequest;
use Response;

class ManageTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('admin.collections.types.index');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Type::getWithTranslations()->get();
    }

    /**z
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeRequest $request)
    {
        $input = $request->all();
        $type = Type::create([]);

        if (!$type) {
            return Response::json([
                'error' => [trans('manage_types.create.error')]
            ], 422);
        }

        foreach ($this->languages as $language) {
            $name = $input['label'][$language->iso6391];
            $type->updateTranslationByIso($language->iso6391,[
                'label' => $name,
                'slug' => Type::generateUniqueSlug($name)
            ]);
        }

        return Response::json([
            'data'    => Type::find($type->id),
            'message' => [trans('manage_types.create.success')],
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
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $input = $request->all();

        foreach ($this->languages as $language) {
            $name = $input["label"][$language->iso6391];
            $type->updateTranslationByIso($language->iso6391, [
                'label' => $name,
                'slug' => $type->updateUniqueSlug($name, $language->iso6391)
            ]);
        }

        return Response::json([
            'data' => Type::find($type->id),
            'message' => [trans('manage_types.update.success')],
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if (!$type->isDeletable()){
            return Response::json([
                'error'=> [trans('manage_types.deletable.error')]
            ], 422);
        }

        if (!$type->languages()->detach()) {
            return Response::json([
                'error' => [trans('manage_types.delete.error')]
            ], 422);
        }

        if (!$type->delete()) {
            return Response::json([
                'error' => [trans('manage_types.delete.error')]
            ], 422);
        }

        return Response::json([
            'message' => [trans('manage_types.delete.success')],
            'success' => true
        ]);
    }

}
