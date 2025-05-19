<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penerbits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerbit');
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerbits');
    }
};
