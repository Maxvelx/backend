<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_model_auto_id')->nullable();
            $table->string('brand_part')->nullable();
            $table->string('num_part')->index()->nullable();
            $table->string('num_oem')->nullable();
            $table->string('name_parts')->nullable();
            $table->string('quantity')->nullable();
            $table->float('price_1')->nullable()->default(0);
            $table->float('price_2')->nullable()->default(0);
            $table->float('price_show')->nullable();
            $table->integer('price_currency')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('label')->index()->nullable();
            $table->string('is_published')->index()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
};
