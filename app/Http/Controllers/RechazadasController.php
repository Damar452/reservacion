<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechazadasController extends Controller
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
    public function index()
    {
        $rechazadas = DB::table('solicituds')
        ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
        ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
        ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
        ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')
        ->where('estado', '2')->get();
         return view('rechazadas',['rechazadas'=>$rechazadas]);
    }

    /**
     * Show the form for creating a new resource.
     *
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
            
        $union = DB::table('solicituds')
    ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
    ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
    ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
    ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')

    ->where('solicituds.id', $request->id)->first();



        
        \Mail::send('emails.notificar', compact("union","request"), function($msg) use ($union)
        {
        $msg->subject('Notificacion de Solicitud');
        $msg->to($union->correo);

       });

    

      $updates = DB::table('solicituds')
	    ->where('id', '=', $request->id )
        ->update(['estado' => '2', 'mensaje' => $request->mensaje]);
        

        
       if ($updates == 1){

        return redirect()->route('pendientes.index')->with('status', 'Se rechazó la solicitud y se le hizo la notificacion correspondiente al '.$union->tipo." ".$union->nombres);

       }


     

     
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        
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
