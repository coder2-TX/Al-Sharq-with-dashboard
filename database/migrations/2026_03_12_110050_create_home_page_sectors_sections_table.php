<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page_sectors_sections', function (Blueprint $table) {
            $table->id();
            $table->string('first_sector_name_ar');
            $table->string('first_sector_name_en');
            $table->string('first_sector_image')->nullable();
            $table->string('second_sector_name_ar');
            $table->string('second_sector_name_en');
            $table->string('second_sector_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_sectors_sections');
    }
};