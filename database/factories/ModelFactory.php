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
        'stripe_id' => $faker->sha256,
        'card_brand' => $faker->creditCardType,
        'card_last_four' => $faker->numberBetween(1000, 9999),
        'trial_ends_at' => $faker->dateTimeBetween('now +7 days', '+30 days'),
        'last_logged_in_at' => $faker->unixTime,
        'remember_token' => str_random(10),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Click::class, function (Faker\Generator $faker) {
    return [
        'message_id' => $faker->numberBetween(0, 99),
        'user_id' => factory(App\User::class)->create()->id,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//$factory->define(\Spatie\TranslationLoader\LanguageLine::class, function (Faker\Generator $faker) {
//    return [
//        'group' => $faker->word,
//        'key' => $faker->words(3),
//        'text' => $faker->paragraph,
//        'created_at' => $faker->unixTime,
//        'updated_at' => $faker->unixTime
//    ];
//});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Cmgmyr\Messenger\Models\Thread::class, function (Faker\Generator $faker) {
    return [
        'subject' => $faker->sentence,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
        'deleted_at' => null
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Cmgmyr\Messenger\Models\Participant::class, function (Faker\Generator $faker) {
    return [
        'thread_id' => factory(\Cmgmyr\Messenger\Models\Thread::class)->create()->id,
        'user_id' => factory(App\User::class)->create()->id,
        'last_read' => $faker->unixTime,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
        'deleted_at' => null
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word,
        'description' => $faker->sentence(),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word,
        'description' => $faker->sentence,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Laravel\Cashier\Subscription::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'name' => $faker->name,
        'stripe_id' => $faker->sha256,
        'stripe_plan' => $faker->numberBetween(1, 3),
        'quantity' => $faker->numberBetween(1, 3),
        'trial_ends_at' => $faker->unixTime,
        'ends_at' => $faker->unixTime,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});


