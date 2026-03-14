<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_page_articles', function (Blueprint $table) {
            $table->id();
            $table->date('published_at')->nullable();
            $table->text('title_ar')->nullable();
            $table->text('title_en')->nullable();
            $table->string('image')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_page_articles');
    }
};