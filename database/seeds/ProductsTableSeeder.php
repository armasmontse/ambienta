<?php

use Illuminate\Database\Seeder;
use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Collections\Collection;
use App\Models\Photo;
use App\Models\Language;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $languages = Language::GetLanguagesIso()->toArray();

		$photos = Photo::get();

        $categories = Category::get();
        $collections = Collection::get();

        factory(Product::class, 20)->create()->each(function($product) use ($languages,$photos,$faker,$categories,$collections){

			//idiomas
	        foreach ($languages as $id => $iso) {
	        	$title =$faker->sentence;
	            $product->updateTranslationByIso($iso,[
	            	'title'             => $title,
	                'slug'              => Product::generateUniqueSlug($title),
					 'description'       => $faker->realText
	            ]);
	        }

			// imágenes
            if (!$photos->isEmpty()) {
                if (rand(0,9) < 7) {
                    $product->associateImage($photos->random(1), [
                        'use'       => "thumbnail" ,
                        'order'     => null,
                        'class'     => null
                    ]);
                }

                if (rand(0,9) < 7) {
                    $random_photos = getRandomElements($photos);
                    foreach ($random_photos as $key => $photo) {
                        $product->associateImage($photo, [
                            'use'       => "gallery" ,
                            'order'     => $key,
                            'class'     => null
                        ]);
                        if ($key > 9) {
                            break;
                        }
                    }
                }
            }

			// categorías
            if (!$categories->isEmpty()) {
                $product->categories()->sync( getRandomElements($categories));
            }

            //colecciones
            if (!$collections->isEmpty()) {
                $product->collections()->sync( getRandomElements($collections));
            }

			//productos relacionados
			$products = Product::where("id","!=",$product->id)->get();
            if (!$products->isEmpty()) {
                $product->products()->sync(  getRandomElements($products));
            }
        });
    }
}
