<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SupplierEmployeesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_GB');
        
        DB::table('supplier_employees')->delete();

        foreach(range(1, 100) as $index)
        {
            $supplier = Supplier::orderBy(DB::raw('RAND()'))->first();
            $role = EmployeeRole::orderBy(DB::raw('RAND()'))->first();
            $honorific = Honorific::orderBy(DB::raw('RAND()'))->first();

            SupplierEmployee::create([
                'supplier_id'       => $supplier->id,
                'employee_role_id'  => $role->id,
                'honorific_id'      => $honorific->id,
                'first_name'        => $faker->firstName,
                'last_name'         => $faker->lastName,
                'phone_number'      => $faker->phoneNumber
            ]);
        }
    }

}