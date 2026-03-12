<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page_hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('subtitle_ar');
            $table->text('subtitle_en');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_hero_sections');
    }
};