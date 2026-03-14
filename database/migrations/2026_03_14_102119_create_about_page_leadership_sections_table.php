<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_page_leadership_sections', function (Blueprint $table) {
            $table->id();
            $table->string('chairman_name_ar')->nullable();
            $table->string('chairman_name_en')->nullable();
            $table->string('chairman_image')->nullable();
            $table->longText('chairman_message_ar')->nullable();
            $table->longText('chairman_message_en')->nullable();
            $table->string('general_manager_name_ar')->nullable();
            $table->string('general_manager_name_en')->nullable();
            $table->string('general_manager_image')->nullable();
            $table->longText('general_manager_message_ar')->nullable();
            $table->longText('general_manager_message_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_page_leadership_sections');
    }
};