<?php

use App\Models\Projects\Project;
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
 * factory categories
 */
$factory->define(Project::class, function ($faker) use ($factory) {
    return [
        'publish_id'        => Publish::get()->random(1)->id,
        'publish_at'        => time()
    ];

});
