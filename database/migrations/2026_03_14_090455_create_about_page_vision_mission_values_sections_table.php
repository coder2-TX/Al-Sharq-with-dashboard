<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_page_vision_mission_values_sections', function (Blueprint $table) {
            $table->id();
            $table->longText('vision_text_ar')->nullable();
            $table->longText('vision_text_en')->nullable();
            $table->longText('mission_text_ar')->nullable();
            $table->longText('mission_text_en')->nullable();
            $table->longText('values_text_ar')->nullable();
            $table->longText('values_text_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_page_vision_mission_values_sections');
    }
};