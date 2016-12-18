<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Attendance;

/**
 * Class AttendancesSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class AttendancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Attendance::class, 30)->create();
    }
}
