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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\BonusCard::class, function (Faker\Generator $faker) {
    return [
        'series' => strtoupper($faker->lexify('???')),
        'number' => $faker->randomNumber(6),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'expired_at' => $faker->dateTimeBetween('-2 years', '+3 years'),
    ];
});

$factory->define(App\Models\Purchase::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(),
        'amount' => $faker->randomFloat(2, 10),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
