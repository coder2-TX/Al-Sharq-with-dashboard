<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_footer_sections', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp_number')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('home_description_ar')->nullable();
            $table->text('home_description_en')->nullable();
            $table->text('about_description_ar')->nullable();
            $table->text('about_description_en')->nullable();
            $table->text('news_description_ar')->nullable();
            $table->text('news_description_en')->nullable();
            $table->text('sectors_description_ar')->nullable();
            $table->text('sectors_description_en')->nullable();
            $table->text('contact_description_ar')->nullable();
            $table->text('contact_description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_footer_sections');
    }
};