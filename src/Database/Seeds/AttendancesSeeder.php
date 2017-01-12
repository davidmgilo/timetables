<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Attendance;
use Scool\Timetables\Models\AttendanceType;

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
        $this->createAttendancesType(AttendanceType::R_TYPE);
        $this->createAttendancesType(AttendanceType::RJ_TYPE);
        $this->createAttendancesType(AttendanceType::F_TYPE);
        $this->createAttendancesType(AttendanceType::FJ_TYPE);
        $this->createAttendancesType(AttendanceType::E_TYPE);
        $this->createAttendances();
    }

    public function createAttendances()
    {
        factory(Attendance::class, 30)->create();
    }


    private function createAttendancesType($name)
    {
        AttendanceType::firstOrCreate([
            'name' => $name
        ]);
    }
}
