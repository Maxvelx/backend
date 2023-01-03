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
        Schema::create ( 'parts', function ( Blueprint $table ) {
            $table->id ();
            $table->unsignedBigInteger ( 'brand_model_auto_id' )->nullable ();
            $table->string ( 'brand_part' )->nullable ();
            $table->string ( 'num_part' )->nullable ();
            $table->string ( 'num_oem' )->nullable ();
            $table->string ( 'name_parts' )->nullable ();
            $table->string ( 'quantity' )->nullable ();
            $table->float ( 'price_1' )->nullable ();
            $table->float ( 'price_2' )->nullable ();
            $table->integer ( 'price_currency' )->nullable ();
            $table->unsignedBigInteger ( 'category_id' )->nullable ();
            $table->timestamps ();

            $table->softDeletes ();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'parts' );
    }
};
