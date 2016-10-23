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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Courses::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'subtitle' => $faker->paragraph(3),
        'description' => $faker->paragraph(5),
        'price' => $faker->randomFloat(2),
        'duration' => $faker->randomFloat(1),
        'published' => $faker->boolean()
    ];
});