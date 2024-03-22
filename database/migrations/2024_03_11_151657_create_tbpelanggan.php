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
        Schema::create('tbpelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->integer('kode_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->string('nohp');
            $table->string('top');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbpelanggan');
    }
};
