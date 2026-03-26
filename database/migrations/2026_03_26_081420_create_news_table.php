<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 10);
            $table->string('category');
            $table->string('title');
            $table->string('date');
            $table->boolean('featured')->default(false);
            $table->string('chip')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('link_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('news');
    }
};