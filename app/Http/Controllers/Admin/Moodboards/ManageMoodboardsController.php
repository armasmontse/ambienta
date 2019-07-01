<?php

namespace App\Http\Controllers\Admin\Moodboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Moodboards\Moodboard;
use App\Models\Publish;

use App\Http\Requests\Admin\Moodboards\CreateMoodboardRequest;
use App\Http\Requests\Admin\Moodboards\UpdateMoodboardRequest;

use Response;
use Redirect;

class ManageMoodboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'moodboards'    =>  Moodboard::with("languages","publish","photos.languages")->get()
        ];

        return view('admin.moodboards.index',$data);

    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function indexView()
    // {
    //    return view('admin.Moodboards.index');
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "moodboard" => new Moodboard,
            'publishes_list' => Publish::getPublishesList(),
        ];

        return view('admin.moodboards.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMoodboardRequest $request)
    {
        $input = $request->all();

        $new_moodboard = Moodboard::create([
            'publish_id'    => $input['publish_id'],
            'publish_at'    => $input['publish_at'],
            'content'       => $input['content'],
        ]);

        if (!$new_moodboard) {
            return Redirect::back()->withErrors([trans('manage_moodboards.create.error')]);
        }

        foreach ($this->languages as $language) {
            $title = $input['title'][$language->iso6391];
            $description = $input['description'][$language->iso6391];
            $new_moodboard->updateTranslationByIso($language->iso6391,[
                'title'     => $title,
                'slug'      => Moodboard::generateUniqueSlug($title, $language->iso6391),
                'description' => $description
            ]);
        }

        return Redirect::route('admin::moodboards.edit', [$new_moodboard->id])->with('status', trans('manage_moodboards.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Moodboard $moodboard)
    {
        $data = [
            "moodboard" => $moodboard,
            'publishes_list' => Publish::getPublishesList(),
        ];

       return view('admin.moodboards.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoodboardRequest $request, Moodboard $moodboard)
    {
        $input = $request->all();
        $moodboard->publish_id  = $input['publish_id'];
        $moodboard->publish_at  = $input['publish_at'];
        $moodboard->content     = $input['content'];


        if (!$moodboard->save()) {
            return Redirect::back()->withErrors([trans('manage_moodboards.update.error')]);
        }

        foreach ($this->languages as $language) {
            $title = $input['title'][$language->iso6391];
            $description = $input['description'][$language->iso6391];
            $moodboard->updateTranslationByIso($language->iso6391,[
                'title'     => $title,
                'slug'      => $moodboard->updateUniqueSlug($title, $language->iso6391),
                'description' => $description
            ]);
        }

        return Redirect::route('admin::moodboards.edit', [$moodboard->id])->with('status', trans('manage_moodboards.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moodboard $moodboard)
    {
        if (!$moodboard->photos->isEmpty()) {
            if (!$moodboard->photos()->detach()) {
                return Redirect::back()->withErrors([trans('manage_moodboards.delete.photos_error')]);
            }
        }

        if (!$moodboard->languages()->detach()) {
            return Redirect::back()->withErrors([trans('manage_moodboards.delete.lang_error')]);
        }

        if (!$moodboard->delete()) {
            return Redirect::back()->withErrors([trans('manage_moodboards.delete.error')]);
        }

        return Redirect::route('admin::moodboards.index')->with('status', trans('manage_moodboards.delete.success'));
    }

}
