<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('members')->delete();

        Member::create([
            'member_role_id'  => 1,
            'honorific_id'      => 1,
            'first_name'        => 'Damian',
            'last_name'         => 'Lewis',
            'email'             => 'damian@damianlewis.net',
            'username'          => 'damian',
            'password'          => Hash::make('admin')
        ]);

        Member::create([
            'member_role_id'  => 2,
            'honorific_id'      => 2,
            'first_name'        => 'Emma',
            'last_name'         => 'Lewis',
            'email'             => 'damian@damianlewis.net',
            'username'          => 'emma',
            'password'          => Hash::make('recpt')
        ]);

        Member::create([
            'member_role_id'  => 3,
            'honorific_id'      => 1,
            'first_name'        => 'Thomas',
            'last_name'         => 'Lewis',
            'email'             => 'damian@damianlewis.net',
            'username'          => 'thomas',
            'password'          => Hash::make('suppl')
        ]);
    }

}