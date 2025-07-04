<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('magangs', function (Blueprint $table) {
        $table->id();
        $table->string('keahlian');
        $table->string('min_pendidikan');
        $table->decimal('gaji', 10, 2)->nullable();
        $table->text('deskripsi');
        $table->string('email');
        $table->string('no_telp');
        $table->string('foto')->nullable();
        $table->timestamps();
        
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magangs');
    }
};
