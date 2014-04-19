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
        $this->call('EmployeeRolesTableSeeder');
        $this->call('SupplierEmployeesTableSeeder');
        $this->call('TimeSlotsTableSeeder');
        $this->call('DropStatusesTableSeeder');        
        $this->call('DeliveryStatusesTableSeeder');
        $this->call('DeliveriesTableSeeder');
    }

}