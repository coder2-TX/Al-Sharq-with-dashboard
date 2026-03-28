<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors_page_main_sections', function (Blueprint $table) {
            $table->id();
            $table->string('medical_sector_image')->nullable();
            $table->string('commercial_sector_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors_page_main_sections');
    }
};