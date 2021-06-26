<?php

namespace App\Imports;

use App\SedeC;
use Maatwebsite\Excel\Concerns\ToModel;

class CImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SedeC([
        'id_dia'=> $row[1],
        'id_horario'=> $row[2],

        'A01'=> $row[3],
        'A02'=> $row[4],
        'A03'=> $row[5],
        'A04'=> $row[6],
        'A05'=> $row[7],
        'A06'=> $row[8],

        'B07'=> $row[9],
        'B08'=> $row[10],
        'B09'=> $row[11],
        'B10'=> $row[12],
        'B11'=> $row[13],
        'B12'=> $row[14],

        'C13'=> $row[15],
        'C14'=> $row[16],
        'C15'=> $row[17],
        'C16'=> $row[18],
        '17'=> $row[19],

        'D18'=> $row[20],
        'D19'=> $row[21],
        'D20'=> $row[22],
        'D21'=> $row[23],
        'D22'=> $row[24],
        'D23'=> $row[25],
        'D24'=> $row[26],
        'D25'=> $row[27],
        'D26'=> $row[28],

        'EP1'=> $row[29],
        'EP2'=> $row[30],
        'LAR'=> $row[31],
        'RDI'=> $row[32],
        'S04'=> $row[33],
        'S05'=> $row[34],
        'SJU'=> $row[35],
            
        ]);
    }
}
