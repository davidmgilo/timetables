<?php

namespace Scool\Timetables\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Timetables\Models\Classroom;


/**
 * Class UsersSeeder
 * @package Scool\Timetables\Database\Seeds
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = $this->createUser('Sergi Tur','sergitur@prova.com','123456');
       $user->assignRole('manage lessons');
    }


    /**
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    private function createUser($name, $email, $password)
    {
       return \App\User::firstOrCreate([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
    }
}
