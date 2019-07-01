<?php

namespace App\Http\Controllers\Client\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projects\Project;

class ProjectsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$query = Project::with('languages', 'photos', 'publish');

		if( !($this->user && $this->user->hasPermission('manage_projects')) ){
			$query = $query->published();
		}

		$data = [
			'projects' => $query->get()
		];
        return view("client.projects.index",$data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Project $public_project)
    {
		$data = [
			"public_project" => $public_project,
		];
        return view("client.projects.show",$data);
    }
}
