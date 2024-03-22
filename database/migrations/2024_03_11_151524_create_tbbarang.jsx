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
        Schema::create('tbbarang', function (Blueprint $table) {
            $table->id("id_barang");
            $table->integer("kode_barang");
            $table->string("nama_barang");
            $table->string('sawal');
            $table->string("harga_barang");
            $table->string("harga_jual");
            $table->string("foto_barang");
            $table->string("deskripsi_barang");
            $table->string("panjang_barang");
            $table->bigInteger("id_satuan")->unsigned()->index()->nullable();
            $table->foreign('id_satuan')->references('id_satuan')->on('tbsatuan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbbarang');
    }
};
