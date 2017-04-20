<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Timetables\Models\Attendance::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'user_id' => $faker->randomDigitNotNull ,
        'day_id' => $faker->randomElement($array = array ('1','2','3','4','5','6','7')) ,
        'timeslot_id' => $faker->randomDigitNotNull ,
        'date' => $faker->dateTimeThisMonth,
        'studysubmodule_id' => $faker->randomDigitNotNull ,
        'type_id' => $faker->randomElement($array = array ('1','2','3','4','5')) ,
        'notes' => $faker->sentence,
    ];
});
