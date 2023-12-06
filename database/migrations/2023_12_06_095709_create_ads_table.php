<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->date('date')->default(now()->subYear()->addDay()); // Varsayılan olarak bir yıl önceki tarih
            $table->unsignedInteger('impressions');
            $table->unsignedInteger('clicks');
            $table->float('spend', 8, 2);
            $table->float('revenue', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
