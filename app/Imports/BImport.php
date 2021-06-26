<?php

namespace App\Imports;

use App\SedeB;
use Maatwebsite\Excel\Concerns\ToModel;

class BImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SedeB([
            'id_dia' => $row[1],
            'id_horario' => $row[2],
            '1' => $row[3],
            '2' => $row[4],
            '3' => $row[5],
            '4' => $row[6],
            '5' => $row[7],
            '6' => $row[8],
            '7' => $row[9],
            

        ]);
    }
}

//php artisan make:import EImport --model=SedeE
