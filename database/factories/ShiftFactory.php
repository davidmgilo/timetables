<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Timetables\Models\Shift::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'torn' => $faker->randomElement(['tarda','mati']),
        'name' => $faker->word,
    ];
});