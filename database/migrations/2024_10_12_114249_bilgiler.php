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
        Schema::create('tblbilgiler', function (Blueprint $table) {
            $table->id();
            $table->text('ad');
            $table->text('metin')->nullable();// ->nullable(); bu alanın boş bırakılabileceğini
            $table->timestamps(); //ilk kayıt ve güncelleme tarihleri için otomatik geliyor
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblbilgiler');
    }
};
