<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEstandar extends Model
{
    public function solicitud(){
        return $this->hasMany(Solicitud::class, 'user_id');
    }
}
