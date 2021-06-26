<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SedeE extends Model
{

    protected $fillable = [
        'id_dia','id_horario','1','2','3GIM','IFI','LCB','LCC','LMO','LPC','NRH','SMU',
      ];

    protected $table = "sede_e";
}
