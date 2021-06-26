<?php

namespace App\Imports;

use App\SedeA;
use Maatwebsite\Excel\Concerns\ToModel;

class AImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SedeA([
            'id_dia' => $row[1],
            'id_horario' => $row[2],
            '1' => $row[3],
            '2' => $row[4],
            '3' => $row[5],
            '4' => $row[6],
            '5' => $row[7],
            '6' => $row[8],
            '7' => $row[9],
            '8' => $row[10],
            '9' => $row[11],
            '10' => $row[12],

            '11' => $row[13],
            '12' => $row[14],
            '13' => $row[15],
            '14' => $row[16],
            '15' => $row[17],
            '16' => $row[18],
            '17' => $row[19],
            '18' => $row[20],
            '19' => $row[21],
            '20' => $row[22],
            '21' => $row[23],

            'AUD' => $row[24],
            'MC1' => $row[25],
            'ME1' => $row[26],
            'S01' => $row[27],
            'S02' => $row[28],
            'S03' => $row[29],
        ]);
    }
}
