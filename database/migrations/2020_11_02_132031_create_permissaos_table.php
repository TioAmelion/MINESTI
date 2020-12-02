<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_permissao', 50)->unique();
            $table->string('descricao', 200);
            $table->timestamps();
        });

        Schema::create('permissao_papel', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('permissao_id');
            $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');

            $table->unsignedInteger('papel_id');
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissao_papels');
        Schema::dropIfExists('permissaos');
        
    }
}
