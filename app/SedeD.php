<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedeD extends Model
{

    protected $fillable = [
        'id_dia','id_horario', '1', '2', '3', '4','5','6','7','8','9',
      ];
    protected $table = "sede_d";
}
