<?php

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

$factory->define(App\Models\Articles::class, function (Faker\Generator $faker) {

    return [
        'created_by' => 'factory',
        'updated_by' => 'factory',
        'users_id' => random_int(1, 5),
    ];
});
