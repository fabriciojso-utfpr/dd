<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan make:form Forms/PersonagemForm --fields="nome:text, classe:text, alinhamento_moral:text, hp:number, armor:number, iniciativa:number, raca:number, forca:number, agilidade:number, inteligencia:number, constituicao:number, sabedoria:number, carisma:number"
     */
    public function up()
    {
        Schema::create('personagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nome")->unique();
            $table->string("classe");
            $table->string("alinhamento_moral");

            $table->tinyInteger("hp");
            $table->tinyInteger("armor");
            $table->tinyInteger("iniciativa");
            $table->tinyInteger("raca");

            $table->tinyInteger("forca");
            $table->tinyInteger("agilidade");
            $table->tinyInteger("inteligencia");
            $table->tinyInteger("constituicao");
            $table->tinyInteger("sabedoria");
            $table->tinyInteger("carisma");

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
        Schema::dropIfExists('personagems');
    }
}
