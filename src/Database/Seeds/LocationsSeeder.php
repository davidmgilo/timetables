<?php

namespace Scool\Timetables\Database\Seeds;

use Scool\Timetables\Models\Location;
use Illuminate\Database\Seeder;

/**
 * Class LocationsSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createLocation('20.2', 'Aula 20.2');
        $this->createLocation('20.3', 'Aula 20.3');
        $this->createLocation('20.4', 'Aula 20.4');
        $this->createLocation('21', 'Aula 21');
        $this->createLocation('22', 'Aula 22');
        $this->createLocation('23', 'Aula 23');
        $this->createLocation('Actes', 'Sala d\'actes');
    }

    /**
     * @param $name
     * @param $code
     * @param $lective
     */
    private function createLocation($name, $description)
    {
        Location::firstOrCreate([
            'name' => $name,
            'description' => $description
        ]);
    }
}
