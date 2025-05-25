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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name')->constrained()->onDelete('cascade');
            $table->foreignId('username')->constrained()->onDelete('cascade');
            $table->foreignId('no_hp')->constrained()->onDelete('cascade');
            $table->string('student_number')->unique();
            $table->string('major');
            $table->date('birth_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
