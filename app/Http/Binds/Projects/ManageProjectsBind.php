<?php

namespace App\Http\Binds\Projects;

use App\Http\Binds\CltvoBind;
use App\Models\Projects\Project;
use Route;
use Auth;

class ManageProjectsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('project', function ($project_id) {
            return Project::with('languages', 'photos', 'publish')->find($project_id);
        });

    }

}
