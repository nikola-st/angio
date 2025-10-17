<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('id_doktora');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('imeprezime');
            $table->string('specijalizacija')->nullable();
            $table->string('broj_licence')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};