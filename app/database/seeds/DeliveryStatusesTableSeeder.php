<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DeliveryStatusesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('delivery_statuses')->delete();

        DeliveryStatus::create([
            'status'        => 'Booked',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DeliveryStatus::create([
            'status'        => 'In Progress',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DeliveryStatus::create([
            'status'        => 'Done',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DeliveryStatus::create([
            'status'        => 'Cancelled',
            'description'   => $faker->text($maxNbChars = 200)
        ]);

        DeliveryStatus::create([
            'status'        => 'Expired',
            'description'   => $faker->text($maxNbChars = 200)
        ]);
    }
}