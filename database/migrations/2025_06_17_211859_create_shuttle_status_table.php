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
        Schema::create('shuttle_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shuttle_id')->constrained('shuttle_bus')->onDelete('cascade');
            $table->string('current_stop')->nullable();
            $table->string('next_stop')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('arrival_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shuttle_status');
    }
};
