<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedeA extends Model
{

    protected $fillable = [
        'id_dia','id_horario','1','2', '3', '4', '5', '6', '7', '8', '9', '10',
        '11', '12', '13','14','15','16','17','18','19','20','21',
        'AUD','MC1','ME1','S01','S02','S03',
      ];


    protected $table = "sede_a";
}
