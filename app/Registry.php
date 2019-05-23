<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    //Un Registro pertenece a una categoria
    public function categoria()
    {
        return $this->belongsTo('App\Category');
    }

    //Un Registro puede tener muchas evidencias
    public function evidencias()
    {
        return $this->hasMany('App\Evidency', 'registro');
    }
}
