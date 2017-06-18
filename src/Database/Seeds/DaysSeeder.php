<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Day;

/**
 * Class DaysSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDay('Dilluns', 1, true);
        $this->createDay('Dimarts', 2, true);
        $this->createDay('Dimecres', 3, true);
        $this->createDay('Dijous', 4, true);
        $this->createDay('Divendres', 5, true);
        $this->createDay('Dissabte', 6, false);
        $this->createDay('Diumenge', 7, false);
    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createDay($name, $code, $lective)
    {
        Day::firstOrCreate([
            'name' => $name,
            'code' => $code,
            'lective' => $lective
        ]);
    }
}
