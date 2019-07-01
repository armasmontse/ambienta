<?php

use Illuminate\Database\Seeder;
use App\Models\Collections\Collection;
use App\Models\Collections\Type;
use App\Models\Photo;
use App\Models\Language;

class CollectionsTableSeeder extends Seeder
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

        $types = Type::get();

        factory(Collection::class, 20)->create()->each(function($collections) use ($languages,$photos,$faker,$types){

			//idiomas
	        foreach ($languages as $id => $iso) {
	        	$title =$faker->sentence;
	            $collections->updateTranslationByIso($iso,[
	            	'title'             => $title,
                    'subtitle'          => $faker->sentence,
	                'slug'              => Collection::generateUniqueSlug($title),
					 'excerpt'           => $faker->sentence,
					 'content'       => $faker->realText
	            ]);
	        }

			// imagenes
            if (!$photos->isEmpty()) {
                if (rand(0,9) < 7) {
                    $collections->associateImage($photos->random(1), [
                        'use'       => "thumbnail" ,
                        'order'     => null,
                        'class'     => null
                    ]);
                }
            }

			// types
            $collections->types()->sync( getRandomElements($types));
        });
    }
}
