<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('hotel_type');
            $table->integer('room_qty');
            $table->boolean('ac_available')->default(false);
            $table->boolean('bar_available')->default(false);
            $table->boolean('swimming_pool_available')->default(false);
            $table->boolean('tourist_board_approved')->default(false);
            $table->string('location');
            $table->json('images')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
