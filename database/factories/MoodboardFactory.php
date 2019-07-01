<?php

use App\Models\Moodboards\Moodboard;
use App\Models\Users\User;
use App\Models\Publish;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * factory de moodboards
 */
$factory->define(Moodboard::class, function (Faker\Generator $faker) {

    return [
        'content'           => 'https://www.pinterest.com.mx/developersr/ss/',
        'publish_id'        => Publish::get()->random(1)->id,
        'publish_at'        => time()
    ];
});
