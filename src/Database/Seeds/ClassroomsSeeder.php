<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Classroom;

/**
 * Class ClassroomsSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createClassroom('2DAM');
        $this->createClassroom('2ASIX');
        $this->createClassroom('1ASIX/DAM');
    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createClassroom($name)
    {
        Classroom::firstOrCreate([
            'name' => $name
        ]);
    }
}
