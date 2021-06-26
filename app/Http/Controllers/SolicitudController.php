<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\UserEstandar;
use App\Horarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
      

        $horas = Horarios::ALL();

  
        return view('reservas', ['horas' => $horas]);
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


         $user = userEstandar::where('identificacion',$request->identificacion)->get();

       

        if (!$user->isEmpty()) { 

            
        $request->validate([
           
            'correo' => ['required', 'string', 'email', 'max:50',],
            'telefono' => ['required', 'string', 'min:7', 'max:11'],
            recaptchaFieldName() => recaptchaRuleName(),
     
            ]);

            foreach ($user as $u){

        $solicitud = new Solicitud;
        $solicitud -> sede = $request->sede;
        $solicitud -> espacio= $request->espacio;
        $solicitud -> fecha = $request->fecha;
        $solicitud -> hora_inicio = $request->hora_inicio;
        $solicitud -> hora_fin = $request->hora_fin;
        $solicitud -> motivo = $request->motivo;
        $solicitud -> user_id = $u->id;
        $solicitud -> save();

        if ($u->correo != $request->correo || $u->telefono != $request->telefono){
            $u -> correo = $request->correo;
            $u -> telefono = $request->telefono;
            $u -> save();
        }
    
    
    
    
    }

        }

        if ($user->isEmpty()) { 

            $request->validate([
                'identificacion' => ['required', 'string', 'min:7' ,'max:20', 'unique:user_estandars'],
                'nombres' => ['required', 'string', 'min:3' ,'max:40'],
                'apellidos' => ['required', 'string', 'min:4' ,'max:40'],
                'correo' => ['required', 'string', 'email', 'max:50', 'unique:user_estandars'],
                'telefono' => ['required', 'string', 'min:7', 'max:11'],
                'tipo' => ['required', 'string', 'max:20'],
                'facultad' => ['required'],
                'tipo' => ['required'],
    
                recaptchaFieldName() => recaptchaRuleName(),
         
                ]);
           
        $user = new userEstandar;
        $user -> identificacion = $request->identificacion;
        $user -> nombres = $request->nombres;
        $user -> apellidos = $request->apellidos;
        $user -> telefono = $request->telefono;
        $user -> correo = $request->correo;
        $user -> facultad = $request->facultad;
        $user -> tipo = $request->tipo;
        $user -> save();

        $solicitud = new Solicitud;
        $solicitud -> sede = $request->sede;
        $solicitud -> espacio= $request->espacio;
        $solicitud -> fecha = $request->fecha;
        $solicitud -> hora_inicio = $request->hora_inicio;
        $solicitud -> hora_fin = $request->hora_fin;
        $solicitud -> motivo = $request->motivo;
        $solicitud -> user_id = $user->id;
        $solicitud -> save();

        }

        return redirect()->route('reservas.index')->with('status', 'Se guardo la solicitud Exitosamente!!!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
 
        $query = trim($request->search);
        $e = $users = UserEstandar::where('identificacion', '=', $query)
        ->get();

        // $e = DB::table('user_estandars')->where('identificacion', $request->search)->get();

        return $e;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }

}
