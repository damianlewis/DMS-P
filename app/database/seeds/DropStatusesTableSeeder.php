<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DropStatusesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('drop_statuses')->delete();

        DropStatus::create([
            'status'        => 'Booked',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DropStatus::create([
            'status'        => 'Authorised',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DropStatus::create([
            'status'        => 'Complete',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DropStatus::create([
            'status'        => 'Cancelled',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DropStatus::create([
            'status'        => 'Expired',
            'description'   => $faker->text($maxNbChars = 200)
        ]);
    }
}