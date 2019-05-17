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
            $table->foreign('encargado')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Personal Académico'],
            ['name' => 'Estudiantes'],
            ['name' => 'Plan de Estudios'],
            ['name' => 'Evaluación del Aprendizaje'],
            ['name' => 'Formación Integral'],
            ['name' => 'Servicios de Apoyo para el Aprendizaje'],
            ['name' => 'Vinculación-Extensión'],
            ['name' => 'Investigación'],
            ['name' => 'Infraestrutura y Equipamiento'],
            ['name' => 'Gestión Administrativa y Financiación']
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
