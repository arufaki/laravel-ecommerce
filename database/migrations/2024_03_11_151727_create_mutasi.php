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
            $table->id('id_mutasi');
            $table->integer('no_bukti');
            $table->string('masuk_keluar');
            $table->integer('qty');
            $table->integer('harga');
            $table->string('keterangan');
            $table->bigInteger('id_stok')->unsigned()->index()->nullable();
            $table->foreign('id_stok')->references('id_stok')->on('tbstok')->onDelete('cascade');
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
