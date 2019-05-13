<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->bigInteger('encargado')->unsigned()->nullable();
            $table->foreign('encargado')->references('id')->on('users');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Personal Academico'],
            ['name' => 'Estudiantes'],
            ['name' => 'Plan de Estudios'],
            ['name' => 'Evaluacion del Aprendizaje'],
            ['name' => 'Formacion Integral'],
            ['name' => 'Servicion de Apoyo para el Aprendizaje'],
            ['name' => 'Vinculacion_Extension'],
            ['name' => 'Investigacion'],
            ['name' => 'Infraestrutura y Equipamiento'],
            ['name' => 'Gestion Administrativa y Financiacion']
        ]);

    }//End method up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
