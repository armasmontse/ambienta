<?php

namespace App\Http\Binds\Collections;

use App\Http\Binds\CltvoBind;
use App\Models\Collections\Type;

use Route;

class ManageTypesBind extends CltvoBind
{
    public static function Bind(){
        Route::bind('type', function ($type) {
            return Type::find($type);
        });
    }
}
