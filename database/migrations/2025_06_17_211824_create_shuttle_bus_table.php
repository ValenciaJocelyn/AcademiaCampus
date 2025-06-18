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
        Schema::create('shuttle_bus', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number');
            $table->enum('bus_type', ['Campus', 'Inter-campus', 'Others']);
            $table->foreignId('route_id')->constrained('shuttle_routes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shuttle_bus');
    }
};
