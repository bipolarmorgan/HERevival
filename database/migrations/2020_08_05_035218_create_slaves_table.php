<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlavesTable extends Migration {
    public function up() {
        Schema::create('slaves', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->morphs('exploit');

            $table->string('username');
            $table->string('password');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('slaves');
    }
}
