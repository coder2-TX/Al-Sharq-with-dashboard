<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors_page_medical_sector_sections', function (Blueprint $table) {
            $table->id();
            $table->string('hero_video')->nullable();
            $table->string('medicines_image')->nullable();
            $table->string('medical_supplies_image')->nullable();
            $table->string('milk_food_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors_page_medical_sector_sections');
    }
};