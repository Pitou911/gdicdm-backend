<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cms_education', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['PDF', 'VIDEO', 'IMG', 'LINK']);
            $table->string('title');
            $table->string('language')->default('EN');
            $table->string('file_url')->nullable();
            $table->string('date')->nullable();
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_education');
    }
};
