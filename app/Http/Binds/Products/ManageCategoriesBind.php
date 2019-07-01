<?php

namespace App\Http\Binds\Products;

use App\Http\Binds\CltvoBind;
use App\Models\Products\Category;

use Route;

class ManageCategoriesBind extends CltvoBind
{

    /**
     * bind methods
     */
    public static function Bind(){
    // para las fotos
        Route::bind('category', function ($category) {
            return Category::getWithTranslations()->find($category);
        });

    }

}
