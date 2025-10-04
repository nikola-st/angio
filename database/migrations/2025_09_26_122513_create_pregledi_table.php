<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreglediTable extends Migration
{
    public function up(): void
    {
        Schema::create('pregledi', function (Blueprint $table) {
            $table->id('idpregleda'); // primarni ključ
            $table->foreignId('idpacijenta') // veza sa pacijenti tabelom
                ->constrained('pacijenti', 'idpacijenta')
                ->onDelete('cascade');
            $table->date('datum');
            $table->boolean('prvi_kontrolni');
            $table->string('vrsta_pregleda');
            $table->boolean('angioloski');
            $table->string('nalaz'); // ime Word fajla
            $table->dateTime('datumUpdated')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pregledi');
    }
}
