<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors_page_vocational_training_partner_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('partner_id');

            $table->foreign('partner_id', 'vt_partner_products_fk')
                ->references('id')
                ->on('sectors_page_vocational_training_partners')
                ->cascadeOnDelete();

            $table->integer('sort_order')->default(0);

            $table->string('product_image');
            $table->string('name_ar');
            $table->string('name_en');

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors_page_vocational_training_partner_products');
    }
};