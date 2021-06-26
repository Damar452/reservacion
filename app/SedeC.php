<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedeC extends Model

{

    protected $fillable = [

   'id_dia','id_horario',
   'A01','A02','A03','A04','A05','A06',
   'B07','B08','B09','B10','B11','B12',
   'C13','C14','C15','C16','17',
   'D18','D19','D20','D21','D22','D23','D24','D25','D26',
   'EP1','EP2','LAR','RDI','S04','S05','SJU',
        
      ];
   
    protected $table = "sede_c";
}
