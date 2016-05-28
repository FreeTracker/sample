<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorrentHub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torrent_hub', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('torrent_name');
            $table->string('torrent_id');
            $table->string('logo');
            $table->text('description');
            $table->string('curator');
            $table->integer('view');
            $table->enum('active', ['0','1']);
            $table->string('category_id');
            $table->integer('count');
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
        Schema::drop('torrent_hub');
    }
}
