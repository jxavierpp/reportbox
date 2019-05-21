<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    //Un Reporte pertenece una categoria
    public function categoria()
    {
        return $this->BelongsTo('App\Category','categoria');
    }
}
