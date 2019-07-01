<?php

namespace App\Http\Binds\Collections;

use App\Http\Binds\CltvoBind;
use App\Models\Collections\Type;

use Route;
use Auth;

class TypesBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_type', function ($type_slug) {
            $query = Type::with('languages')->getModelBySlug($type_slug)->has("collections");
            return $query->first();
        });

    }

}
