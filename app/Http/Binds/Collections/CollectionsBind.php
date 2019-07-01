<?php

namespace App\Http\Binds\Collections;

use App\Http\Binds\CltvoBind;
use App\Models\Collections\Collection;
use Route;
use Auth;

class CollectionsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_collection', function ($collection_slug) {
            $query = Collection::with('languages', 'photos', 'types', 'publish')->getModelBySlug($collection_slug);
            $user = Auth::user();
            if( !($user && $user->hasPermission('manage_collections')) ){
                $query = $query->published();
            }
            return $query->first();
        });

    }

}
