<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page_about_sections', function (Blueprint $table) {
            $table->id();
            $table->text('lead_ar');
            $table->text('lead_en');
            $table->longText('text_ar');
            $table->longText('text_en');
            $table->string('youtube_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_about_sections');
    }
};