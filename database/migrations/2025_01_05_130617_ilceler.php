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
        Schema::create('ilcebilgi', function (Blueprint $table) {
            $table->id();
            $table->string('ilce_adi')->nullable();
            $table->string('il_adi')->nullable();
            $table->string('isim')->nullable();
            $table->integer('sayi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilcebilgi');
    }
};