<?php

namespace App\Http\Binds\Projects;

use App\Http\Binds\CltvoBind;
use App\Models\Projects\Project;
use Route;
use Auth;

class ProjectsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_project', function ($project_slug) {
            $query = Project::with('languages', 'photos', 'publish')->getModelBySlug($project_slug);
            $user = Auth::user();

            if( !($user && $user->hasPermission('manage_projects')) ){
                $query = $query->published();
            }

            return $query->first();
        });

    }

}
