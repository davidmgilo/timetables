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
        $this->createClassroom('20.2');
        $this->createClassroom('20.3');
        $this->createClassroom('20.4');
        $this->createClassroom('21');
        $this->createClassroom('22');
        $this->createClassroom('23');

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
