<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EmployeeRolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');
        
        DB::table('employee_roles')->delete();

        EmployeeRole::create([
            'role'          => 'Driver',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        EmployeeRole::create([
            'role'          => 'Delivery assistant',
            'description'   => $faker->text($maxNbChars = 200)
        ]);
    }

}