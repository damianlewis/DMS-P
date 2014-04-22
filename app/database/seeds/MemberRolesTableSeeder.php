<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MemberRolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');
        
        DB::table('member_roles')->delete();

        MemberRole::create([
            'role'          => 'Administrator',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        MemberRole::create([
            'role'          => 'Receptionist',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        MemberRole::create([
            'role'          => 'Supplier',
            'description'   => $faker->text($maxNbChars = 200)
        ]);
    }

}