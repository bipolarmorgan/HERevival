<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirusesTable extends Migration {
    public function up() {
        Schema::create('viruses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('installer_id');
            $table->morphs('installed_on');

            $table->dateTime('active')->nullable();
            $table->dateTime('last_collected')->nullable();

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('exploits');
    }
}
