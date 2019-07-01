<?php

namespace App\Http\Controllers\Admin\Press;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Press\CreatePressRequest;
use App\Http\Requests\Admin\Press\UpdatePressRequest;
use App\Models\Press\Press;
use App\Models\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Response;

class ManagePressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            //'pressArr' =>  Press::with("publish")->get()
            'pressArr' =>  Press::with("publish", "photos")->get()
        ];

        return view('admin.press.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = [
			"press"	=> new Press,
			'publishes_list' => Publish::getPublishesList(),
			'content_types' => Press::getContentTypes()
		];

        return view('admin.press.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(CreateMoodboardRequest $request)
    public function store(CreatePressRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('content_pdf')){
            //Guadamos la liga del archivo
            $input['content'] = $request->file('content_pdf')->store(Press::STORAGE_PATH_PDF);
        }

        if($request->content_type == Press::LINK_TYPE){
            $input['content'] = static::getYoutubeEmbedUrl($input['content_link']);
        }

        if($request->content_type == Press::IMAGE_TYPE){
            $input['content'] = NULL;
        }

        $new_press = Press::create([
            'title'    => $input['title'],
            'publish_id'    => $input['publish_id'],
            'publish_at'    => $input['publish_at'],
            'content'       => $input['content'],
            'content_type' => $input['content_type']
        ]);

        if (!$new_press) {
            return Redirect::back()->withErrors([trans('manage_press.create.error')]);
        }

        return Redirect::route('admin::press.edit', [$new_press->id])->with('status', trans('manage_press.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Press $press)
    {
		$data = [
			//Por alguna razón, en la inyección no pasa las relaciones
			"press"	=> Press::with('photos', 'publish')->find($press->id),
			'publishes_list' => Publish::getPublishesList(),
			'content_types' => Press::getContentTypes()
		];

       return view('admin.press.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePressRequest $request, Press $press)
    {
		$input = $request->all();

        if($request->hasFile('content_pdf')){
            //Guadamos la liga del archivo
            $input['content'] = $request->file('content_pdf')->store('public/pdf');
        }

        if($request->content_type == Press::LINK_TYPE){
            $input['content'] = static::getYoutubeEmbedUrl($input['content_link']);
        }

		$press->publish_id = $input['publish_id'];
        $press->publish_at = $input['publish_at'];
        $press->content = isset($input['content']) ? $input['content'] : $press->content ;
        $press->content_type = $input['content_type'];
        $press->title = $input['title'];

        //Si antes tenía el tipo pdf, borramos el archivo físico
        if($press->content_type == Press::PDF_TYPE){
            Storage::delete($press->content);
        }

		if (!$press->save()) {
			return Redirect::back()->withErrors([trans('manage_press.update.error')]);
		}

		return Redirect::route('admin::press.edit', [$press->id])->with('status', trans('manage_press.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Press $press)
    {
		if (!$press->photos->isEmpty()) {
            if (!$press->photos()->detach()) {
                return Redirect::back()->withErrors([trans('manage_press.delete.photos_error')]);
            }
        }

        if($press->content_type == Press::PDF_TYPE){
            Storage::delete($press->content);
        }

        if (!$press->delete()) {
            return Redirect::back()->withErrors([trans('manage_press.delete.error')]);
        }

        return Redirect::route('admin::press.index')->with('status', trans('manage_press.delete.success'));
    }

    public static function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }

}

