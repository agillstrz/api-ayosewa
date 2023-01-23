<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kate_id');
            $table->string('name');
            $table->integer('harga');
            $table->boolean('tersedia')->default(true);
            $table->boolean('rekomendasi')->default(false);
            $table->string('lantai')->nullable();
            $table->string('alamat');
            $table->text('link_alamat');
            $table->string('link_video');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('luas')->nullable();
            $table->string('garasi')->nullable();
            $table->string('kmandi')->nullable();
            $table->string('kamar')->nullable();
            $table->string('wifi')->nullable();
            $table->string('ac')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewas');
    }
};