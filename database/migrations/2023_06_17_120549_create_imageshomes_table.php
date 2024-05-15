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
        Schema::create('imageshomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_id');
            $table->String('home_name')->nullable();
            $table->String('original_name')->nullable();

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
        Schema::dropIfExists('imageshomes');
    }
};
