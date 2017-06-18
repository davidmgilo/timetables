<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Shift;

/**
 * Class ShiftsSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createShift('mati', "matinal");
        $this->createShift('tarda', "vesprada");
    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createShift($torn, $name)
    {
        Shift::firstOrCreate([
            'torn' => $torn,
            'name' => $name
        ]);
    }
}
