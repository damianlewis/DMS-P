<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');
        
        DB::table('vehicles')->delete();
        DB::table('vehicle_makes')->delete();
        DB::table('vehicle_models')->delete();
        // DB::table('vehicle_categories')->delete();

        foreach(range(1, 10) as $index)
        {
            VehicleMake::create(['make' => ucfirst($faker->unique()->word)]);
        }

        $makes = VehicleMake::all();

        foreach($makes as $make)
        {
            foreach(range(1, 5) as $index)
            {
                VehicleModel::create([
                    'vehicle_make_id' => $make->id,
                    'model' => ucfirst($faker->unique()->word)
                ]);
            }
        }

        // foreach(range(1, 10) as $index)
        // {
        //     VehicleCategory::create(['category' => ucfirst($faker->unique()->word)]);
        // }

        foreach(range(1, 10) as $index)
        {
            $supplier = Supplier::orderBy(DB::raw('RAND()'))->first();
            $vehicleModel = VehicleModel::orderBy(DB::raw('RAND()'))->first();
            // $vehicleCategory = VehicleCategory::orderBy(DB::raw('RAND()'))->first();

            Vehicle::create([
                'supplier_id'           => $supplier->id,
                'vehicle_model_id'      => $vehicleModel->id,
                // 'vehicle_category_id'   => $vehicleCategory->id,
                'registration_number'   => strtoupper($faker->unique()->bothify($string = '??## ???')),
                'description'           => $faker->text($maxNbChars = 200)
            ]);
        }
    }

}