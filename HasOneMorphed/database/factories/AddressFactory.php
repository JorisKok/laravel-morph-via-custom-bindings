<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Address::class, function (Faker $faker, array $attributes) {
    if (! \in_array($attributes['type'], ['home', 'delivery', 'work', 'invoice'])) {
        throw new OutOfBoundsException('Address type not valid');
    }

    return [
        'type' => $attributes['type'],
        'user_id' => $attributes['user_id'],
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1, 10),
        'suffix' => \str_random(1),
        'city' => $faker->city,
    ];
});
