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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->uuid('kodemutasi')->primary();
            $table->string('jenis_mutasi')->default('masuk')->nullable(); //keluar
            $table->unsignedInteger('jumlah')->default(0)->nullable(); 
            $table->date('tglMutasi')->nullable();
            $table->foreignId('userId')->constrained(
                table: 'users', indexName: 'mutasiUserId'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->string('barangId');
            //TODO
            /*$table->foreignId('barangId')->constrained(
                table: 'barang', indexName: 'mutasiBarangId'
            )->onUpdate('cascade')->onDelete('cascade');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
