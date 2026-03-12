<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page_numbers_sections', function (Blueprint $table) {
            $table->id();

            $table->string('item_1_name_ar');
            $table->string('item_1_name_en');
            $table->unsignedInteger('item_1_number');

            $table->string('item_2_name_ar');
            $table->string('item_2_name_en');
            $table->unsignedInteger('item_2_number');

            $table->string('item_3_name_ar');
            $table->string('item_3_name_en');
            $table->unsignedInteger('item_3_number');

            $table->string('item_4_name_ar');
            $table->string('item_4_name_en');
            $table->unsignedInteger('item_4_number');

            $table->string('item_5_name_ar');
            $table->string('item_5_name_en');
            $table->unsignedInteger('item_5_number');

            $table->string('item_6_name_ar');
            $table->string('item_6_name_en');
            $table->unsignedInteger('item_6_number');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_numbers_sections');
    }
};