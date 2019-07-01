<?php

namespace App\Providers;

use App\Http\Helpers\EstafetaShipmentsHelper as Shipment;

use Validator;

use App\Models\Products\Product;
use App\Models\Skus\Sku;
use App\Models\Users\User;
use App\Models\Shop\Bag;
use App\Models\Events\Event;
use App\Models\Shop\BagUser;

use Hash;

use DB;

use Illuminate\Support\ServiceProvider;

class CustomValidationRulesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extendImplicit('password_check', function($attribute, $value, $parameters, $validator) {
            return Hash::check($value,$parameters[0]);
        });

        Validator::extendImplicit('pinterest_url', function($attribute, $value, $parameters, $validator) {

            if (strpos($value, 'pinterest.com') != false ) {

                try {
                    file_get_contents($value);
                } catch (Exception $e) {
                    return false;
                }

                return true;
            }
            return false;

        });

		Validator::extendImplicit('only_one_default', function ($attribute, $value, $parameters) {

			if (is_null($value)) {
				return true;
			}

			$query = DB::table($parameters[0])
				->where([$attribute => true]);

			if(isset($parameters[1]) ){
				$query = $query->whereNotIN("id",  [$parameters[1]]);
			}

			return $query->count()==0;
		});
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
