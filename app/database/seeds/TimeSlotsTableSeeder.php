<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TimeSlotsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('time_slots')->delete();

        foreach(range(1, 15) as $index)
        {
            $time = (6 + $index).':00:00';

            TimeSlot::create([
                'start_time' => $time
            ]);
        }
    }
}