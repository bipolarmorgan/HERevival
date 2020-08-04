<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworksTable extends Migration {
    public function up() {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();

            $table->morphs('owner');

            $table->integer('speed');
            $table->ipAddress('ip_address');

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('networks');
    }
}
