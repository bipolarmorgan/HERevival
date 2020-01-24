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
            $table->bigInteger('user_id');

            $table->float('cpu')->default(512);
            $table->float('hdd')->default(102.4);
            $table->float('ram')->default(256);
            $table->float('net')->default(1);

            $table->boolean('is_npc')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('servers', function (Blueprint $table) {
            $table->dropColumn([
                'cpu',
                'hdd',
                'ram',
                'network'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('hardware');

        Schema::table('servers', function (Blueprint $table) {
            $table->integer('cpu')->default(512);
            $table->integer('hdd')->default(102.4);
            $table->integer('ram')->default(256);
            $table->integer('network')->default(1);
        });
    }
}
