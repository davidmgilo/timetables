<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Timeslot;


/**
 * Class TimeslotsSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class TimeslotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTimeslot('Primera',"08:00","09:00");
        $this->createTimeslot('Segona',"09:00","10:00");
        $this->createTimeslot('Tercera',"10:00","11:00");
        $this->createTimeslot('Quarta',"11:30","12:30");
        $this->createTimeslot('Cinquena',"12:30","13:30");
        $this->createTimeslot('Sisena',"13:30","14:30");
        $this->createTimeslot('Setena',"15:30","16:30");
        $this->createTimeslot('Vuitena',"16:30","17:30");
        $this->createTimeslot('Novena',"17:30","18:30");
        $this->createTimeslot('Desena',"19:00","20:00");
        $this->createTimeslot('Onzena',"20:00","21:00");
        $this->createTimeslot('Dotzena',"21:00","22:00");

    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createTimeslot($name, $init_hour, $final_hour)
    {
        Timeslot::firstOrCreate([
            'name' => $name,
            'init_hour' => $init_hour,
            'final_hour' => $final_hour
        ]);
    }
}
