<?php

use Illuminate\Database\Seeder;

use App\Models\Collections\Type;
use App\Models\Language;

class TypesTableSeeder extends Seeder
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
        factory(Type::class, 5)->create()->each(function($type) use ($languages,$faker){
            foreach ($languages as $id => $iso) {
                $name = $faker->unique()->word;
                $type->updateTranslationByIso($iso,[
                    'label'         => $name,
                    'slug'          => Type::generateUniqueSlug($name)
                ]);
            }
        });
    }
}
