<?php

use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Language;
use App\Models\Moodboards\Moodboard;

class MoodboardsTableSeeder extends Seeder
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

        factory(Moodboard::class, 20)->create()->each(function($moodboard) use ($languages,$photos,$faker){

			//idiomas
	        foreach ($languages as $id => $iso) {
	        	$title =$faker->sentence;
	            $moodboard->updateTranslationByIso($iso,[
	            	'title'             => $title,
					'slug'              => Moodboard::generateUniqueSlug($title),
	            ]);
	        }

			// imagenes
            if (!$photos->isEmpty()) {
                if (rand(0,9) < 7) {
                    $moodboard->associateImage($photos->random(1), [
                        'use'       => "thumbnail" ,
                        'order'     => null,
                        'class'     => null
                    ]);
                }
            }


        });
    }
}
