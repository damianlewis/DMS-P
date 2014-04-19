<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DeliveriesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table('deliveries')->delete();
        DB::table('drops')->delete();

        foreach(range(1, 10) as $index)
        {
            Delivery::create([
                'delivery_status_id' => 1,
                'date'               => date($format = 'Y-m-d', strtotime('+3 days')),
                'note'               => $faker->text($maxNbChars = 400)
            ]);
        }

        // foreach(range(1, 5) as $index)
        // {
        //     Delivery::create([
        //         'delivery_status_id' => 3,
        //         'date'               => date($format = 'Y-m-d', strtotime('-3 days')),
        //         'note'               => $faker->text($maxNbChars = 400)
        //     ]);
        // }

        // foreach(range(1, 5) as $index)
        // {
        //     Delivery::create([
        //         'delivery_status_id' => 2,
        //         'date'               => date($format = 'Y-m-d', strtotime('now')),
        //         'note'               => $faker->text($maxNbChars = 400)
        //     ]);
        // }

        foreach(Delivery::all() as $delivery)
        {
            $supplier = Supplier::orderBy(DB::raw('RAND()'))->first();
            $employee = SupplierEmployee::orderBy(DB::raw('RAND()'))->where('supplier_id', $supplier->id)->first();
            $vehcile = Vehicle::orderBy(DB::raw('RAND()'))->where('supplier_id', $supplier->id)->first();

            $delivery->supplierEmployees()->attach($employee->id);
            $delivery->vehicles()->attach($vehcile->id);

            $facilities = Facility::orderBy(DB::raw('RAND()'))->take(3)->get();
            $timeSlots = TimeSlot::orderBy(DB::raw('RAND()'))->take(3)->get();

            foreach(range(0, 2) as $index)
            {
                // Drop::create([
                //     'delivery_id'  => $delivery->id,
                //     'time_slot_id' => $timeSlots[$index]->id,
                //     'facility_id'  => $facilities[$index]->id
                // ]);

                Drop::create([
                    'delivery_id'       => $delivery->id,
                    'facility_id'       => $facilities[$index]->id,
                    'drop_status_id'    => 1,
                    'time_slot'         => $timeSlots[$index]->start_time,
                ]);
            }
        }
    }
}