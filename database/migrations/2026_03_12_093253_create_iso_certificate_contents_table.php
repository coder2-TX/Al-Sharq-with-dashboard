<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iso_certificate_contents', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_short');
            $table->string('certificate_name');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('certificate_icon')->nullable();
            $table->string('certificate_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iso_certificate_contents');
    }
};