<?php

namespace App\Http\Controllers\Admin\Collections;

use Response;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Collections\CreateCollectionRequest;
use App\Http\Requests\Admin\Collections\UpdateCollectionRequest;
use App\Http\Requests\Admin\Collections\AssociateCollectionsTypesRequest;

use App\Models\Publish;
use App\Models\Settings\Copy;
use App\Models\Collections\Type;
use App\Models\Collections\Collection;

class ManageCollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        $data = [
            // 'collections' => Collection::with('publish', 'types')->get(),
            'publishes_list' => Publish::getPublishesList(),
        ];

        return view('admin.collections.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Collection::with('publish', 'types')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCollectionRequest $request)
    {
        $input = $request->all();

        $new_collection = Collection::create([
            'publish_id'    => $input['publish_id'],
            'publish_at'    => $input['publish_at'],
            'highlighted'   => isset($input['highlighted']),
        ]);

        if (!$new_collection) {
            return Response::json([
              'error'=> [trans('manage_collections.create.error')]
            ],422);
        }

        foreach ($this->languages as $language) {
            $title = $input['title'][$language->iso6391];
            $new_collection->updateTranslationByIso($language->iso6391,[
                'title'     => $title,
                'slug'      => Collection::generateUniqueSlug($title, $language->iso6391),
                'subtitle'  => $input['subtitle'][$language->iso6391],
                'excerpt'   => $input['excerpt'][$language->iso6391],
                'content'   => $input['content'][$language->iso6391],
            ]);
        }

        return Response::json([ // todo bien
            'data'    => Collection::getWithTranslations()->find($new_collection->id),
            'message' => [trans('manage_collections.create.success')],
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        $data = [
            'collection_editable' => $collection,
            'publishes_list' => Publish::getPublishesList(),
            'seo' => $collection->getOrCreateSeo()
        ];

        return view('admin.collections.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $input = $request->all();

        $collection->publish_id 	= $input['publish_id'];
        $collection->publish_at 	= $input['publish_at'];
		$collection->highlighted 	= isset($input['highlighted']);

        if (!$collection->save()) {
            return Redirect::back()->withErrors([trans('manage_collections.update.error')]);
        }

        foreach ($this->languages as $language) {
			$title =  $input['title'][$language->iso6391];
            $collection->updateTranslationByIso($language->iso6391,[
                'title'     => $title,
                'slug'      => $collection->updateUniqueSlug($title, $language->iso6391),
                'subtitle'  => $input['subtitle'][$language->iso6391],
                'excerpt'   => $input['excerpt'][$language->iso6391],
                'content'   => $input['content'][$language->iso6391],
            ]);
        }

        return Redirect::route('admin::collections.edit', [$collection->id])->with('status', trans('manage_collections.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
		if (!$collection->isDeletable()){
		  return Response::json([
			'error'=> [trans('manage_collections.deletable.error')]
		  ],422);
		}

        if (!$collection->types->isEmpty()) {
            if (!$collection->types()->detach()) {
                return Response::json([
                  'error'=> [trans('manage_collections.delete.types_error')]
                ],422);
            }
        }

        if (!$collection->photos->isEmpty()) {
            if (!$collection->photos()->detach()) {
                return Response::json([
                  'error'=> [trans('manage_collections.delete.photos_error')]
                ],422);
            }
        }

        if (!$collection->languages()->detach()) {
            return Response::json([
              'error'=> [trans('manage_collections.delete.lang_error')]
            ],422);

        }

        if (!$collection->delete()) {
            return Response::json([
              'error'=> [trans('manage_collections.delete.error')]
            ],422);
        }

        return Response::json([
            'message' => [trans('manage_collections.delete.success')],
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function types(AssociateCollectionsTypesRequest $request, Collection $collection)
    {
        $input = $request->all();
        $types = isset($input['types']) ? $input['types'] : [];
        $collection->types()->sync($types);

        return Response::json([
            'data'    => $collection->load('types')->types_ids,
            'message' => [trans('manage_collections.associate.types.success')],
            'success' => true
        ]);
    }
}
