<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacijentiTable extends Migration
{
    public function up(): void
    {
        Schema::create('pacijenti', function (Blueprint $table) {
            $table->id('idpacijenta'); // primarni ključ
            $table->foreignId('user_id') // veza sa users tabelom
                ->constrained()
                ->onDelete('cascade');
            $table->string('imeprezime');
            $table->year('godina_rodjenja');
            $table->string('adresa');
            $table->string('telefon');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacijenti');
    }
}
