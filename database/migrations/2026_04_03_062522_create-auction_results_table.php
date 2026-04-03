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
    Schema::create('auction_results', function (Blueprint $table) {
        $table->id();
        $table->date('auction_date');
        $table->string('date_label');
        $table->enum('currency', ['KHR', 'USD']);
        $table->integer('tenor');
        $table->string('title');
        $table->decimal('offered',    10, 2);
        $table->decimal('bidding',    10, 2);
        $table->decimal('accepted',   10, 2);
        $table->decimal('coupon',     5,  2);
        $table->decimal('cover_ratio',5,  2);
        $table->integer('investors');
        $table->enum('status', ['settled', 'pending'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
