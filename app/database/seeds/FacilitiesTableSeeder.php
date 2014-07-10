<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FacilitiesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('facilities')->delete();

        foreach(range(1, 10) as $index)
        {
            Facility::create([
                'name'          => $faker->company,
                'address1'      => $faker->streetAddress,
                'city'          => $faker->city,
                'county'        => $faker->county,
                'post_code'     => $faker->postcode,
                'latitude'      => $faker->latitude,
                'longitude'     => $faker->longitude,
                'capacity'      => $faker->numberBetween(1000, 4000),
                'description'   => $faker->text($maxNbChars = 400)
            ]);
        }
    }

}