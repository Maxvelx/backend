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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string('power')->nullable();
            $table->string('vincode');
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('engine')->nullable();
            $table->string('year')->nullable();
            $table->string('body')->nullable();
            $table->string('transmission')->nullable();
            $table->string('drive')->nullable();
            $table->string('packageAuto');
            $table->string('image')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('garages');
    }
};
