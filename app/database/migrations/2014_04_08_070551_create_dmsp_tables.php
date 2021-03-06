<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmspTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Shared

        Schema::create('honorifics', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('honorific')->unique();
            $table->timestamps();
        });

        Schema::create('employee_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('role')->unique();
            $table->text('description');
            $table->timestamps();
        });

        // Schema::create('days', function(Blueprint $table)
        // {
        //     $table->increments('id');
        //     $table->string('day')->unique();
        //     $table->timestamps();
        // });

        // Memebrs

        Schema::create('member_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('role')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('members', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('member_role_id')->unsigned();
            $table->integer('honorific_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            // $table->string('email')->unique();
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            // $table->boolean('status');
            $table->string('remember_token')->nullable();
            $table->timestamps();

            $table->foreign('member_role_id')
                ->references('id')->on('member_roles')
                ->onDelete('restrict');
                
            $table->foreign('honorific_id')
                ->references('id')->on('honorifics')
                ->onDelete('restrict');
        });

        // Suppliers

        Schema::create('suppliers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('region');
            $table->string('post_code');
            $table->string('country');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('supplier_employees', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('employee_role_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('honorific_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->unique();
            $table->timestamps();

            $table->foreign('employee_role_id')
                ->references('id')->on('employee_roles')
                ->onDelete('restrict');

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade');
                
            $table->foreign('honorific_id')
                ->references('id')->on('honorifics')
                ->onDelete('restrict');
        });

        Schema::create('vehicle_makes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('make')->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_models', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('vehicle_make_id')->unsigned();
            $table->string('model')->unique();
            $table->timestamps();

            $table->foreign('vehicle_make_id')
                ->references('id')->on('vehicle_makes')
                ->onDelete('cascade');
        });

        // Schema::create('vehicle_categories', function(Blueprint $table)
        // {
        //     $table->increments('id');
        //     $table->string('category')->unique();
        //     $table->timestamps();
        // });

        Schema::create('vehicles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            // $table->integer('vehicle_make_id')->unsigned()->nullable();
            $table->integer('vehicle_model_id')->unsigned();
            // $table->integer('vehicle_category_id')->unsigned()->nullable();
            $table->string('registration_number')->unique();
            $table->text('description');
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade');

            // $table->foreign('vehicle_make_id')
            //     ->references('id')->on('vehicle_makes')
            //     ->onDelete('set null');
                
            $table->foreign('vehicle_model_id')
                ->references('id')->on('vehicle_models')
                ->onDelete('cascade');

            // $table->foreign('vehicle_category_id')
            //     ->references('id')->on('vehicle_categories')
            //     ->onDelete('set null');
        });

        // Facility

        Schema::create('facilities', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('county');
            $table->string('post_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('capacity')->unsigned();
            $table->text('description');
            $table->timestamps();
        });

        // Schema::create('storage_area_categories', function(Blueprint $table)
        // {
        //     $table->increments('id');
        //     $table->string('category')->unique();
        //     $table->text('description');
        //     $table->timestamps();
        // });

        // Schema::create('storage_areas', function(Blueprint $table)
        // {
        //     $table->increments('id');
        //     $table->integer('facility_id')->unsigned();
        //     $table->integer('storage_area_category_id')->unsigned()->nullable();
        //     $table->integer('allocation')->unsigned();
        //     $table->timestamps();

        //     $table->foreign('facility_id')
        //         ->references('id')->on('facilities')
        //         ->onDelete('restrict');

        //     $table->foreign('storage_area_category_id')
        //         ->references('id')->on('storage_area_categories')
        //         ->onDelete('set null');

        //     // $table->foreign('day_id')
        //     //     ->references('id')->on('days')
        //     //     ->onDelete('set null');
        // });

        Schema::create('time_slots', function(Blueprint $table)
        {
            $table->increments('id');
            // $table->integer('facility_id')->unsigned();
            // $table->integer('day_id')->unsigned()->nullable();
            $table->time('start_time');
            // $table->time('end_time');
            // $table->boolean('booked');
            $table->timestamps();

            // $table->foreign('facility_id')
            //     ->references('id')->on('facilities')
            //     ->onDelete('restrict');

            // $table->foreign('day_id')
            //     ->references('id')->on('days')
            //     ->onDelete('set null');
        });
        
        // Deliveries

        Schema::create('delivery_statuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('status')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('deliveries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('delivery_status_id')->unsigned();
            $table->date('date');
            $table->text('note');
            $table->timestamps();

            $table->foreign('delivery_status_id')
                ->references('id')->on('delivery_statuses')
                ->onDelete('restrict');
        });

        Schema::create('deliveries_employees', function(Blueprint $table)
        {
            $table->integer('delivery_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->timestamps();
            $table->primary(array('delivery_id', 'employee_id'));
            
            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade');

            $table->foreign('employee_id')
                ->references('id')->on('supplier_employees')
                ->onDelete('cascade');
        });

        Schema::create('deliveries_vehicles', function(Blueprint $table)
        {
            $table->integer('delivery_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->timestamps();
            $table->primary(array('delivery_id', 'vehicle_id'));

            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade');

            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');
        });

        // Schema::create('deliveries_facilities', function(Blueprint $table)
        // {
        //     $table->integer('delivery_id')->unsigned();
        //     $table->integer('facility_id')->unsigned();
        //     $table->timestamps();

        //     $table->foreign('delivery_id')
        //         ->references('id')->on('deliveries')
        //         ->onDelete('cascade');

        //     $table->foreign('facility_id')
        //         ->references('id')->on('facilities')
        //         ->onDelete('restrict');
        // });

        // Schema::create('deliveries_time_slots', function(Blueprint $table)
        // {
        //     $table->integer('delivery_id')->unsigned();
        //     $table->integer('time_slot_id')->unsigned();
        //     $table->timestamps();

        //     $table->foreign('delivery_id')
        //         ->references('id')->on('deliveries')
        //         ->onDelete('cascade');

        //     $table->foreign('time_slot_id')
        //         ->references('id')->on('time_slots')
        //         ->onDelete('restrict');
        // });
        Schema::create('drop_statuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('status')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('drops', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('delivery_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->integer('drop_status_id')->unsigned();
            // $table->integer('time_slot_id')->unsigned();
            $table->time('time_slot');
            $table->timestamps();

            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade');

            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('cascade');

            // $table->foreign('time_slot_id')
            //     ->references('id')->on('time_slots')
            //     ->onDelete('restrict');
            $table->foreign('drop_status_id')
                ->references('id')->on('drop_statuses')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('deliveries_time_slots');
        // Schema::drop('deliveries_facilities');
        Schema::drop('drops');
        Schema::drop('drop_statuses');
        Schema::drop('deliveries_vehicles');
        Schema::drop('deliveries_employees');
        Schema::drop('deliveries');
        Schema::drop('delivery_statuses');
        Schema::drop('time_slots');
        // Schema::drop('storage_areas');
        // Schema::drop('storage_area_categories');
        Schema::drop('facilities');
        Schema::drop('vehicles');
        // Schema::drop('vehicle_categories');
        Schema::drop('vehicle_models');
        Schema::drop('vehicle_makes');
        Schema::drop('supplier_employees');
        Schema::drop('suppliers');
        Schema::drop('members');
        Schema::drop('member_roles');
        // Schema::drop('days');
        Schema::drop('employee_roles');
        Schema::drop('honorifics');
    }
}