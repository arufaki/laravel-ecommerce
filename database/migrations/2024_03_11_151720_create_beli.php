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
        Schema::create('beli', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->integer('no_bukti');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->bigInteger('id_pemasok')->unsigned()->index()->nullable();
            $table->foreign('id_pemasok')->references('id_pemasok')->on('tbpemasok')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli');
    }
};
