<?php

namespace App\Http\Binds\Products;

use App\Http\Binds\CltvoBind;
use App\Models\Products\Product;
use Route;
use Auth;

class ProductsBind extends CltvoBind
{
    public static function Bind(){

        Route::bind('public_product', function ($product_slug) {
            $query = Product::with('languages', 'photos', 'collections', 'publish')->getModelBySlug($product_slug);
            
            $user = Auth::user();
            
            if( !($user && $user->hasPermission('manage_products')) ){
                $query = $query->published();
            }
            
            return $query->first();
        });

    }

}
