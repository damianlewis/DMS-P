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

        Schema::create('days', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('day')->unique();
            $table->timestamps();
        });

        // Suppliers

        Schema::create('suppliers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address1');
            $table->string('address2');
            $table->string('locality');
            $table->string('region');
            $table->string('post_code');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('suppliers_staff_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('role')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('suppliers_staff', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('staff_role_id')->unsigned()->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('honorific_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->unique();
            $table->timestamps();

            $table->foreign('staff_role_id')
                ->references('id')->on('suppliers_staff_roles')
                ->onDelete('set null');

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('set null');
                
            $table->foreign('honorific_id')
                ->references('id')->on('honorifics')
                ->onDelete('set null');
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
            $table->string('model')->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('category')->unique();
            $table->timestamps();
        });

        Schema::create('vehicles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('vehicle_make_id')->unsigned()->nullable();
            $table->integer('vehicle_model_id')->unsigned()->nullable();
            $table->integer('vehicle_category_id')->unsigned()->nullable();
            $table->string('registration_number')->unique();
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('set null');

            $table->foreign('vehicle_make_id')
                ->references('id')->on('vehicle_makes')
                ->onDelete('set null');
                
            $table->foreign('vehicle_model_id')
                ->references('id')->on('vehicle_models')
                ->onDelete('set null');
                
            $table->foreign('vehicle_category_id')
                ->references('id')->on('vehicle_categories')
                ->onDelete('set null');
        });

        // Facility

        Schema::create('facilities', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address1');
            $table->string('address2');
            $table->string('locality');
            $table->string('region');
            $table->string('post_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('capacity');
            $table->timestamps();
        });

        Schema::create('storage_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('category')->unique();
            $table->timestamps();
        });

        Schema::create('storage_areas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('allocation');
            $table->timestamps();

            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('restrict');

            $table->foreign('category_id')
                ->references('id')->on('storage_categories')
                ->onDelete('set null');
        });

        Schema::create('booking_slot', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->integer('day_id')->unsigned()->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('restrict');

            $table->foreign('day_id')
                ->references('id')->on('days')
                ->onDelete('set null');
        });

        Schema::create('facility_member_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('role')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('facility_members', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('facility_id')->unsigned()->nullable();
            $table->integer('member_role_id')->unsigned()->nullable();
            $table->integer('honorific_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();

            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('set null');

            $table->foreign('member_role_id')
                ->references('id')->on('facility_member_roles')
                ->onDelete('set null');
                
            $table->foreign('honorific_id')
                ->references('id')->on('honorifics')
                ->onDelete('set null');
        });
        
        // Deliveries

        Schema::create('delivery_status', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('status')->unique();
            $table->timestamps();
        });

        Schema::create('deliveries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('booking_slot_id')->unsigned();
            $table->integer('delivery_status_id')->unsigned();
            $table->timestamps();

            $table->foreign('booking_slot_id')
                ->references('id')->on('booking_slot')
                ->onDelete('restrict');

            $table->foreign('delivery_status_id')
                ->references('id')->on('delivery_status')
                ->onDelete('restrict');
        });

        Schema::create('deliveries_facilities', function(Blueprint $table)
        {
            $table->integer('delivery_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->timestamps();

            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('cascade');
        });

        Schema::create('deliveries_staff', function(Blueprint $table)
        {
            $table->integer('delivery_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->timestamps();

            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('staff_id')
                ->references('id')->on('suppliers_staff')
                ->onDelete('cascade');
        });

        Schema::create('deliveries_vehicles', function(Blueprint $table)
        {
            $table->integer('delivery_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->timestamps();

            $table->foreign('delivery_id')
                ->references('id')->on('deliveries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deliveries_vehicles');
        Schema::drop('deliveries_staff');
        Schema::drop('deliveries_facilities');
        Schema::drop('deliveries');
        Schema::drop('delivery_status');
        Schema::drop('facility_members');
        Schema::drop('facility_member_roles');
        Schema::drop('booking_slot');
        Schema::drop('storage_areas');
        Schema::drop('storage_categories');
        Schema::drop('facilities');
        Schema::drop('vehicles');
        Schema::drop('vehicle_categories');
        Schema::drop('vehicle_models');
        Schema::drop('vehicle_makes');
        Schema::drop('suppliers_staff');
        Schema::drop('suppliers_staff_roles');
        Schema::drop('suppliers');
        Schema::drop('days');
        Schema::drop('honorifics');
    }
}