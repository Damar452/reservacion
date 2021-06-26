<?php

namespace App\Imports;

use App\SedeE;
use Maatwebsite\Excel\Concerns\ToModel;

class EImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SedeE([
            'id_dia' => $row[1],
            'id_horario' => $row[2],
            '1' => $row[3],
            '2' => $row[4],
            '3GIM' => $row[5],
            'IFI' => $row[6],
            'LCB' => $row[7],
            'LCC' => $row[8],
            'LMO' => $row[9],
            'LPC' => $row[10],
            'NRH' => $row[11],
            'SMU' => $row[12],
        ]);
    }
}
