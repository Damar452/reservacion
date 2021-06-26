<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
     public function solicitud()
   {
      return $this->belongsToMany(Solicitud::class, 'reservaciones','horarios_id','solicitud_id');
   }
}
