<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('client_id')->unsigned();
            //chave estrangeira
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     *
     *  Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //definir metodo para excluir a chave estrangeira
            $table->dropForeign(['client_id']);
            //apaga a coluna
            $table->dropColumn('client_id');
        });
    }
}

