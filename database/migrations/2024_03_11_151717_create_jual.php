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
        Schema::create('jual', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->integer('no_bukti');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->bigInteger('id_pelanggan')->unsigned()->index()->nullable();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('tbpelanggan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual');
    }
};
