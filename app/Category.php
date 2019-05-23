<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['encargado'];
    //Una categoria pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo('App\User', 'encargado');
    }

    //Una categoria puede tener muchos registros
    public function registros()
    {
        return $this->hasMany('App\Registry', 'categoria');
    }
}

