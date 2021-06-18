<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pes');
            $table->unsignedBigInteger('id')->index();
            $table->string('nama_cus');
            $table->unsignedBigInteger('id_brg')->index();
            $table->integer('hrg_jsat');
            $table->integer('jlh_item');
            $table->integer('total_hrg');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_brg')->references('id_brg')->on('barang')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
