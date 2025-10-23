<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhotbah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khotbahs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pengkhotbah')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('youtube_url'); // tempat simpan link YouTube
            $table->string('slug')->unique();
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
        Schema::dropIfExists('khotbahs');
    }
}
