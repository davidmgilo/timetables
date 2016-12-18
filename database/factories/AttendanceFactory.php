<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Timetables\Models\Attendance::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'user_id' => $faker->randomDigitNotNull ,
        'day_id' => $faker->randomDigitNotNull ,
        'timeslot_id' => $faker->randomDigitNotNull ,
        'date' => $faker->dateTimeThisMonth,
        'studysubmodule_id' => $faker->randomDigitNotNull ,
        'type_id' => $faker->randomDigitNotNull ,
        'notes' => $faker->sentence,
    ];
});
