<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::table('cms_documents', function (Blueprint $table) {
            $table->string('cover_url')->nullable()->after('file_url');
        });
        Schema::table('cms_education', function (Blueprint $table) {
            $table->string('cover_url')->nullable()->after('file_url');
        });
        Schema::table('cms_news', function (Blueprint $table) {
            $table->string('cover_url')->nullable()->after('image_url');
        });
    }

    public function down(): void {
        Schema::table('cms_documents', function (Blueprint $table) { $table->dropColumn('cover_url'); });
        Schema::table('cms_education', function (Blueprint $table) { $table->dropColumn('cover_url'); });
        Schema::table('cms_news',      function (Blueprint $table) { $table->dropColumn('cover_url'); });
    }
};
