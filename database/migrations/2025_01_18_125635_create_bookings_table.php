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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('driver_id')->constrained('drivers')->nullable();
            $table->foreignId('approved_by_level_1')->constrained('users')->nullable();
            $table->foreignId('approved_by_level_2')->constrained('users')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('purpose');
            $table->integer('start_odometer');
            $table->integer('end_odometer')->nullable();
            $table->float('fuel_consumed')->nullable();
            $table->string('note')->nullable();
            $table->enum('status', ['pending', 'approved_level_1', 'approved_level_2', 'rejected_level_1', 'rejected_level_2', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
