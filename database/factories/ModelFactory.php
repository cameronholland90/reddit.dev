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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(env('USER_PASS')),
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
    	'created_by' => App\User::all()->random()->id,
        'title' => $faker->sentence,
        'content' => $faker->paragraphs(3, true),
        'url' => $faker->url,
    ];
});
