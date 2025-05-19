<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->year('tahun');
            $table->string('penulis');
            $table->string('cover')->nullable();
            $table->foreignId('penerbit_id')
            ->constrained('penerbits')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
