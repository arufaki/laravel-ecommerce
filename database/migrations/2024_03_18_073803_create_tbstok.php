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
        Schema::create('tbstok', function (Blueprint $table) {
            $table->id("id_stok");
            $table->integer("kode_stok");
            $table->string("nama_stok");
            $table->string('saldo_awal');
            $table->string("harga_beli");
            $table->string("harga_jual");
            $table->string("harga_modal");
            $table->string("foto_barang");
            $table->string("deskripsi_barang");
            $table->string("pajang");
            $table->bigInteger("id_satuan")->unsigned()->index()->nullable();
            $table->foreign('id_satuan')->references('id_satuan')->on('tbsatuan')->onDelete('cascade');
            $table->bigInteger("id_kategori")->unsigned()->index()->nullable();
            $table->foreign('id_kategori')->references('id_kategori')->on('tbkategori')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbstok');
    }
};
