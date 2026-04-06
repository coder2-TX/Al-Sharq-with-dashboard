<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_footer_sections', function (Blueprint $table) {
            $table->text('copyright_text_ar')->nullable();
            $table->text('copyright_text_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_footer_sections', function (Blueprint $table) {
            $table->dropColumn([
                'copyright_text_ar',
                'copyright_text_en',
            ]);
        });
    }
};