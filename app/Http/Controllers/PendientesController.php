<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SedeA;
use App\SedeB;
use App\SedeC;
use App\SedeD;
use App\SedeE;
use App\Solicitud;
use App\UserEstandar;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $query = trim($request->get('search'));
        $pendientes = DB::table('solicituds')
                        ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
                        ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
                        ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
                        ->select('solicituds.*','user_estandars.identificacion', 'user_estandars.nombres', 'user_estandars.apellidos',
                        'user_estandars.telefono', 'user_estandars.correo', 'user_estandars.facultad' ,
                        'user_estandars.tipo' , 'h1.hora_inicio', 'h2.hora_fin')

                        ->where('estado', '0')
                        // ->orwhere('sede', 'LIKE', '%'. $query . '%')
                        // ->orWhere('espacio', 'LIKE', '%'. $query . '%')
                        // ->orWhere('nombres', 'LIKE', '%'. $query . '%')
                        ->get();
        return view('pendientes', ['pendientes' => $pendientes]);
    }

    /**
     * Show the form for creating a new resource.
     *SS
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datoFecha = DB::table('solicituds')
        ->select('fecha','sede')
        ->where('id', $id)->get();
        $diaDeLaSemana = date("w", strtotime($datoFecha[0]->fecha));
        $idHoras = DB::select('SELECT
    horarios.id
FROM
    `horarios`
JOIN solicituds WHERE horarios.id >= solicituds.hora_inicio AND horarios.id <= solicituds.hora_fin
and solicituds.id ='.$id.'' );

$salones = array();
$columnas = array();
$disponible = array();
$idsalones = array();
      foreach ($idHoras as  $datos) {
            
        $salon =DB::table($datoFecha[0]->sede)
       
        ->where($datoFecha[0]->sede.'.id_dia', $diaDeLaSemana)
        ->where($datoFecha[0]->sede.'.id_horario', $datos->id)
        ->get();
        foreach ($salon as $key => $value1) {
        $idsalones[] = $value1->id;
        }

       
        $salones[] = $salon;
        }

        foreach ($salon as $key => $value) {
            foreach ($value as $key2 => $value2) {
              $columnas[]= $key2;
            }
             
        } 

        
$tem=0;

foreach ($columnas as $value) {
   foreach ($salones as $key => $valuer) { 
        if ($salones[$key][0]->$value == '0') {
           $tem++;
        }
    }
        if ($tem == count($salones)) {
               $disponible[] = $value;
            }
            $tem=0;
}
//los procesos de pasan arriba no afectan en nada, no los toques 

 return view('salones', ['salones' => $disponible, 
                        'ides' => $idsalones,
                        'salon' => $datoFecha[0]->sede,
                        'idsolicitud'=> $id]);
//ides es el array que tienes los id de los datos  que se van a actualizar

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $columna)
    {

        $json = Json_decode($request["ides"], true);
        
        foreach ($json as  $value) {
           $affected = DB::table($request->salon) ->where('id', $value) ->update([$columna => 2]); 
       }
       $solicitud = Solicitud::findOrFail($request->idsolicitud);
       $solicitud-> estado = "1";
       $solicitud-> salon = $columna;
       $solicitud -> save();
    
    $union = DB::table('solicituds')
    ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
    ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
    ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
    ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')

    ->where('solicituds.id', $request->idsolicitud)->first();

// //   $union= $union[0];

// dd($union);

    \Mail::send('emails.aprobada', compact("union"), function($msg) use ($union)
    {
    $msg->subject('Notificacion de Solicitud');
    $msg->to($union->correo);

   });


 return redirect()->route('pendientes.index')->with('status', 'Se aprobó la solicitud y se le hizo la notificacion correspondiente al '.$union->tipo." ".$union->nombres);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
