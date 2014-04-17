<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('HonorificsTableSeeder');
        $this->call('FacilitiesTableSeeder');
        $this->call('SuppliersTableSeeder');
        $this->call('VehiclesTableSeeder');
        $this->call('SupplierEmployeesTableSeeder');
        
    }

}