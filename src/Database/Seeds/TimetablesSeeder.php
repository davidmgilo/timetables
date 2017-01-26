<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;

/**
 * Class TimetablesSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class TimetablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AttendancesSeeder::class);
        $this->call(DaysSeeder::class);
    }
}
