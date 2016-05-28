<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('torrent');
            $table->string('peer_id', 20);
            $table->integer('passkey');
            $table->string('ip', 64);
            $table->smallInteger('port');
            $table->bigInteger('uploaded');
            $table->bigInteger('downloaded');
            $table->bigInteger('upload_ofset');
            $table->bigInteger('download_ofset');
            $table->bigInteger('to_go');
            $table->enum('seeder', ['0','1']);
            $table->enum('connect', ['0','1']);
            $table->string('agent', 60);
            $table->integer('user_id');
            $table->integer('finish');
            $table->timestamps();
            $table->timestamp('prev_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peers');
    }
}
