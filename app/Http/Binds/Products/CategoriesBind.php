<?php

namespace App\Http\Binds\Products;

use App\Http\Binds\CltvoBind;
use App\Models\Products\Category;

use Route;
use Auth;

class CategoriesBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_category', function ($category_slug) {
            $query = Category::with('languages')->getModelBySlug($category_slug)->has("products");
            return $query->first();
        });

    }

}
