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
        $this->call(DaysSeeder::class);
        $this->call(ClassroomsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ShiftsSeeder::class);
        $this->call(TimeslotsSeeder::class);
        $this->call(LocationsSeeder::class);
//        $this->call(AttendancesSeeder::class);
    }
}
