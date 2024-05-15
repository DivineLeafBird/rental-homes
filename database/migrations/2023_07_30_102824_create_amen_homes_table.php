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
        Schema::create('amen_homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amenity_id')->nullable();
            $table->string('amenity_name')->nullable();
            $table->unsignedBigInteger('home_id')->nullable();
            $table->String('home_name')->nullable();


            $table->timestamps();
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amen_homes');
    }
};
