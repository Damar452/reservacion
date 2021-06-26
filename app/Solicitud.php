<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    public function horarios()
   {
      return $this->belongsToMany(Horarios::class, 'reservaciones','solicitud_id','horarios_id');
   }


}
