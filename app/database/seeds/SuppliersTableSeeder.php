<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SuppliersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('suppliers')->delete();

        foreach(range(1, 10) as $index)
        {
            Supplier::create([
                'name'          => $faker->company,
                'address1'      => $faker->streetAddress,
                'city'          => $faker->city,
                'region'        => $faker->county,
                'post_code'     => $faker->postcode,
                'country'       => $faker->country,
                'description'   => $faker->text($maxNbChars = 400)
            ]);
        }
    }

}