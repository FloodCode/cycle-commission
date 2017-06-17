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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    $loremFaker = new Faker\Provider\Lorem($faker);

    $message = '';

    for ($i = 0; $i < 5; $i++) {
        $message .= '<p>' . htmlspecialchars($loremFaker->text(500)) . '</p>';
    }

    $paragraphs = $loremFaker->paragraphs(5);

    return [
        'title' => $loremFaker->text(80),
        'short_message' => $loremFaker->text(500),
        'message' => $message,
        'user_id' => 1
    ];
});
