<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sectors_page_communications_partners', function (Blueprint $table) {
            $table->string('products_hero_image')->nullable()->after('partner_image');
        });
    }

    public function down(): void
    {
        Schema::table('sectors_page_communications_partners', function (Blueprint $table) {
            $table->dropColumn('products_hero_image');
        });
    }
};