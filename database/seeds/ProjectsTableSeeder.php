<?php

use Illuminate\Database\Seeder;
use App\Models\Projects\Project;
use App\Models\Photo;
use App\Models\Language;

class ProjectsTableSeeder extends Seeder
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

        factory(Project::class, 20)->create()->each(function($project) use ($languages,$photos,$faker){

			//idiomas
	        foreach ($languages as $id => $iso) {
	        	$title =$faker->sentence;
	            $project->updateTranslationByIso($iso,[
	            	'title'             => $title,
	                'slug'              => Project::generateUniqueSlug($title),
                    'subtitle'          => $faker->sentence,
					'content'           => $faker->realText
	            ]);
	        }

			// imágenes
            if (!$photos->isEmpty()) {
                if (rand(0,9) < 7) {
                    $project->associateImage($photos->random(1), [
                        'use'       => "thumbnail" ,
                        'order'     => null,
                        'class'     => null
                    ]);
                }

                if (rand(0,9) < 7) {
                    $random_photos = getRandomElements($photos);
                    foreach ($random_photos as $key => $photo) {
                        $project->associateImage($photo, [
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
        });
    }
}
