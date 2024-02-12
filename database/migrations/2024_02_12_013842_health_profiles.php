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
        Schema::create('health_profile', function (Blueprint $table) {
            $table->id('id_profil');
            $table->foreignId('user_id')->references('id')->default(null)->on('users');
            $table->string('height');
            $table->enum('blood_type', ['O+', 'A+', 'B+', 'AB+', 'O-', 'A-', 'B-', 'AB-', 'Rh-null'])->default(null)->unique();
            $table->string('weight');
            $table->string('allergies');
            $table->string('medical_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_profile');
    }
};
