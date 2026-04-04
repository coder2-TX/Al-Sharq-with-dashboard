<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors_page_milk_food_partners', function (Blueprint $table) {
            $table->id();

            $table->integer('sort_order')->default(0);

            $table->string('partner_image')->nullable();
            $table->string('products_hero_image')->nullable();

            $table->string('partner_name');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors_page_milk_food_partners');
    }
};