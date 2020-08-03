<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('server_id')->unsigned();

            $table->float('cpu')->default(500);
            $table->float('hdd')->default(102.4);
            $table->float('ram')->default(256);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('server_id')->references('id')->on('servers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('hardware');
    }
}
