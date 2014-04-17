<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class HonorificsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        Honorific::create(['honorific' => 'Mr']);
        Honorific::create(['honorific' => 'Ms']);
    }

}