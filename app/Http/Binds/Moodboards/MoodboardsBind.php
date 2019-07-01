<?php

namespace App\Http\Binds\Moodboards;

use App\Http\Binds\CltvoBind;
use App\Models\Moodboards\Moodboard;
use Route;
use Auth;

class MoodboardsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_moodboard', function ($moodboard_slug) {
            $query = Moodboard::with('languages', 'photos', 'publish')->getModelBySlug($moodboard_slug);
            $user = Auth::user();
            if( !($user && $user->hasPermission('manage_moodboards')) ){
                $query = $query->published();
            }
            return $query->first();
        });

    }

}
