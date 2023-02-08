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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained('users');
            $table->string( 'order_number' );
            $table->jsonb( 'parts' );
            $table->string('label')->nullable();
            $table->integer('viewed')->default(0);
            $table->text('message_order')->nullable();
            $table->unsignedSmallInteger( 'payment_status' )->default(0);
            $table->timestamp( 'payment_time' )->nullable();
            $table->unsignedSmallInteger( 'delivery_status' )->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
