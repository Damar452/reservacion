<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use Carbon\Carbon;


class FinalizarSolicitud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solicitud:finalizar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'finaliza todas las solicitudes que sean menores a la fecha actual';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();
        $idsalon = array();
     
       // prueba para finalizar una solicitud

        $finalizar = DB::table('solicituds')
                            ->where('solicituds.fecha','<', $now)
                            ->where('solicituds.finalizada','0')
                            ->where('solicituds.estado','1')
                            ->get();
        // primer ciclo
                            foreach ($finalizar as  $value) {
                             
                               
        $idHoras = DB::select('SELECT
                            horarios.id
                        FROM
                            `horarios`
                        JOIN solicituds WHERE horarios.id >= solicituds.hora_inicio AND horarios.id <= solicituds.hora_fin
                        and solicituds.id ='.$value->id.'' );

        $diaDeLaSemana = date("w", strtotime($value->fecha));


                        foreach ($idHoras as $datos) {
                            
                         
                            $select = DB::table($value->sede)
                                           ->select('id')
                                            ->where('id_dia',$diaDeLaSemana)
                                            ->where('id_horario',$datos->id)
                                        ->where($value->salon,'2')
                                           ->get();

                                           foreach ($select as $key => $value3) {
                                            $idsalon[] = $value3->id;
                                           }
                                            

                        }

                        foreach ($idsalon as $key => $value2) {


                            $affected = DB::table($value->sede) ->where('id', $value2) ->update([$value->salon => 0]); 
                        }

                        $solicitud = Solicitud::findOrFail($value->id);
                        $solicitud-> finalizada = "1";
                        $solicitud -> save();

                           }// final primero ciclo
       
                         
    }
}
