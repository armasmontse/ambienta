<?php

namespace App\Http\Binds\Products;

use App\Http\Binds\CltvoBind;
use App\Models\Products\Product;
use Route;
use Auth;

class ManageProductsBind extends CltvoBind
{
    public static function Bind(){

		Route::bind('product', function ($product_id) {
            return Product::with('languages', 'photos', 'collections', 'publish','products')->find($product_id);
        });

    }

}
