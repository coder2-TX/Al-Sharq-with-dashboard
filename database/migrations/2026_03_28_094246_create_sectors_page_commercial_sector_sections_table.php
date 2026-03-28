<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors_page_commercial_sector_sections', function (Blueprint $table) {
            $table->id();
            $table->string('hero_video')->nullable();
            $table->string('cars_image')->nullable();
            $table->string('communications_image')->nullable();
            $table->string('advertising_image')->nullable();
            $table->string('paints_image')->nullable();
            $table->string('vocational_training_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors_page_commercial_sector_sections');
    }
};