<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidency extends Model
{

    //Una evidencia pertenece a un ragistro
    public function registro()
    {
        return $this->belongsTo('App\Registry', 'registro');
    }

}
