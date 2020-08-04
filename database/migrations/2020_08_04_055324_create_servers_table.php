<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration {
    public function up() {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();

            $table->morphs('owner');

            $table->integer('cpu');
            $table->integer('hdd');
            $table->integer('ram');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('servers');
    }
}
