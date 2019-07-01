<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Projects\Project;
use Redirect;

use App\Models\Publish;

use App\Http\Requests\Admin\Projects\CreateProjectRequest;
use App\Http\Requests\Admin\Projects\UpdateProjectRequest;


class ManageProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "projects" => Project::with("publish","languages")->get()
        ];

        return view('admin.projects.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = [
			'publishes_list' => Publish::getPublishesList(),
			'project'		 => new Project
 		];
    	return view('admin.projects.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
		$input = $request->all();

        $new_project = Project::create([
            'publish_id'    => $input['publish_id'],
            'publish_at'    => $input['publish_at'],
        ]);

        if (!$new_project) {
            return Redirect::back()->withErrors([trans('manage_projects.create.error')]);
        }

        foreach ($this->languages as $language) {
            $title = $input['title'][$language->iso6391];
            $new_project->updateTranslationByIso($language->iso6391,[
                'title'     	=> $title,
                'slug'      	=> Project::generateUniqueSlug($title, $language->iso6391),
                'content'   	=> $input['content'][$language->iso6391],
				'subtitle'   	=> $input['subtitle'][$language->iso6391],
            ]);
        }

        return Redirect::route('admin::projects.edit', [$new_project->id])->with('status', trans('manage_projects.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
		$data = [
			'publishes_list' => Publish::getPublishesList(),
			'project'		 => $project
 		];
    	return view('admin.projects.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
		$input = $request->all();

		$project->publish_id 	= $input['publish_id'];
		$project->publish_at 	= $input['publish_at'];

		if (!$project->save()) {
			return Redirect::back()->withErrors([trans('manage_projects.update.error')]);
		}

		foreach ($this->languages as $language) {
			$title =  $input['title'][$language->iso6391];
			$project->updateTranslationByIso($language->iso6391,[
				'title'     => $title,
				'slug'      => $project->updateUniqueSlug($title, $language->iso6391),
                'subtitle'   	=> $input['subtitle'][$language->iso6391],
				'content'   => $input['content'][$language->iso6391],
			]);
		}

		return Redirect::route('admin::projects.edit', [$project->id])->with('status', trans('manage_projects.update.success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if (!$project->photos->isEmpty()) {
            if (!$project->photos()->detach()) {
                return Redirect::back()->withErrors([trans('manage_projects.delete.photos_error')]);
            }
        }

        if (!$project->languages()->detach()) {
            return Redirect::back()->withErrors([trans('manage_projects.delete.lang_error')]);
        }

        if (!$project->delete()) {
            return Redirect::back()->withErrors([trans('manage_projects.delete.error')]);
        }

        return Redirect::route('admin::projects.index')->with('status', trans('manage_projects.delete.success'));
    }
}
