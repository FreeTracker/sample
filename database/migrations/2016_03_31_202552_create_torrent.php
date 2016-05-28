<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorrent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torrent', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('hub_id');
            $table->string('info_hash');
            $table->text('description');
            $table->string('autor');
            $table->bigInteger('size');
            $table->timestamp('date');
            $table->enum('type', ['0','1']);
            $table->integer('numfiles');
            $table->integer('hits');
            $table->integer('times_complited');
            $table->integer('leechers');
            $table->integer('remote_leechers');
            $table->integer('seeders');
            $table->integer('remote_seeders');
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
        Schema::drop('torrent');
    }
}
