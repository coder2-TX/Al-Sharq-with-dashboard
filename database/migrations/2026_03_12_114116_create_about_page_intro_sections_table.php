<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_page_intro_sections', function (Blueprint $table) {
            $table->id();
            $table->longText('subtitle_ar')->nullable();
            $table->longText('subtitle_en')->nullable();
            $table->longText('article_ar')->nullable();
            $table->longText('article_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_page_intro_sections');
    }
};