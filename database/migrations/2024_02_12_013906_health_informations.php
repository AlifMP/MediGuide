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
        Schema::create('health_information', function (Blueprint $table) {
            $table->id('id_info');
            $table->string('img_info');
            $table->string('title_info');
            $table->string('desc_info');
            $table->string('slug_info');
            $table->string('tag_info')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_information');
    }
};
