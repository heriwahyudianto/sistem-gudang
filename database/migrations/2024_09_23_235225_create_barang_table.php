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
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode')->nullable();
            $table->string('name')->nullable();
            $table->string('kategori')->nullable();
            $table->string('lokasi')->nullable(); 
            $table->string('dimensi')->nullable(); 
            $table->string('berat')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
