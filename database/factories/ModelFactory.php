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
        'stripe_id' => null,
        'card_brand' => null,
        'card_last_four' => null,
        'trial_ends_at' => null,
        'last_logged_in_at' => null,
        'remember_token' => str_random(10),
        'created_at' => $faker->unixTime,
        'updated_at' => null
    ];
});
