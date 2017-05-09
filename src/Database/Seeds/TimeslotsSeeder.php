<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Shift;
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
        $mati = Shift::find(1);
        $tarda = Shift::find(2);
        $tslt = $this->createTimeslot('Primera',"08:00","09:00");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Segona',"09:00","10:00");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Tercera',"10:00","11:00");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Quarta',"11:30","12:30");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Cinquena',"12:30","13:30");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Sisena',"13:30","14:30");
        $tslt->shifts()->save($mati);
        $tslt =$this->createTimeslot('Setena',"15:30","16:30");
        $tslt->shifts()->save($tarda);
        $tslt = $this->createTimeslot('Vuitena',"16:30","17:30");
        $tslt->shifts()->save($tarda);
        $tslt =$this->createTimeslot('Novena',"17:30","18:30");
        $tslt->shifts()->save($tarda);
        $tslt =$this->createTimeslot('Desena',"19:00","20:00");
        $tslt->shifts()->save($tarda);
        $tslt =$this->createTimeslot('Onzena',"20:00","21:00");
        $tslt->shifts()->save($tarda);
        $tslt =$this->createTimeslot('Dotzena',"21:00","22:00");
        $tslt->shifts()->save($tarda);

    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createTimeslot($name, $init_hour, $final_hour)
    {
       return Timeslot::firstOrCreate([
            'name' => $name,
            'init_hour' => $init_hour,
            'final_hour' => $final_hour
        ]);
    }
}
