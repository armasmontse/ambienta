<?php

namespace App\Http\Binds\Collections;

use App\Http\Binds\CltvoBind;
use App\Models\Collections\Collection;
use Route;

class ManageCollectionsBind extends CltvoBind
{
    public static function Bind(){

        // Para el show
        Route::bind('collection', function ($collection_id) {
            return Collection::with('languages', 'photos', 'types', 'publish')->find($collection_id);
        });
    }

}
