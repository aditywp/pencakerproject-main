<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('menunggu'); // status default
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('lamarans');
    }
};
