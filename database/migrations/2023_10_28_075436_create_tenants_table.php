<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('home_id');
            $table->string('name');
            $table->string('email');
            $table->string('dob');
            $table->string('id_number');
            $table->string('phone');
            $table->string('move_in_date');
            $table->string('rental_duration');
            $table->string('lease_expiry');
            $table->string('tenancy_status')->default('Active');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
