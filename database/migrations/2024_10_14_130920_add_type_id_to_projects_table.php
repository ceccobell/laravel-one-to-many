<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Aggiungo la colonna type_id come chiave esterna
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            
            // Definisco la chiave esterna con la tabella 'types' e imposto 'set null' alla cancellazione del type
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rimuovo il vincolo di chiave esterna
            $table->dropForeign(['type_id']);
            
            // Rimuovo la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
