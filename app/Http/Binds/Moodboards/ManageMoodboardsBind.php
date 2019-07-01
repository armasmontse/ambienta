<?php

namespace App\Http\Binds\Moodboards;

use App\Http\Binds\CltvoBind;
use App\Models\Moodboards\Moodboard;
use Route;
use Auth;

class ManageMoodboardsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('moodboard', function ($moodboard_id) {
            return Moodboard::with('languages', 'photos', 'publish')->find($moodboard_id);
        });

    }

}
