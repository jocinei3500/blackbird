<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVeiculoObservacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('veiculos', function(Blueprint $table){
            $table->renameColumn('observação', 'observacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('veiculos', function(Blueprint $table){
            $table->renameColumn('observacao', 'observação');
        });
    }
}
