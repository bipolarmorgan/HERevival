<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('npc_id');

            $table->float('cpu')->default(512);
            $table->float('hdd')->default(102.4);
            $table->float('ram')->default(256);
            $table->float('net')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('npc_id')->references('id')->on('npcs');
        });

        Schema::dropIfExists('servers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('hardware');

        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('npc_id')->nullable();

            $table->string('name');

            $table->integer('cpu')->default(500);
            $table->integer('hdd')->default(100);
            $table->integer('ram')->default(256);
            $table->integer('network')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('servers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('npc_id')->references('id')->on('npcs');
        });
    }
}
