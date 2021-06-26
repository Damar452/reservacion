<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AImport;
use App\Imports\BImport;
use App\Imports\CImport;
use App\Imports\DImport;
use App\Imports\EImport;
use App\SedeA;
use App\SedeB;
use App\SedeC;
use App\SedeD;
use App\SedeE;
// use  Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('password.confirm', ['only' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
       $datoFecha = DB::table('solicituds')->where('id', '1')->value('fecha');
         $var = explode('/',str_replace('-','/',$datoFecha));
         $diaDeLaSemana = date("w", strtotime("$var[2]/$var[1]/$var[0]"));

         $idHoras = DB::select('SELECT
    horarios.id
FROM
    `horarios`
JOIN solicituds WHERE horarios.id >= solicituds.hora_inicio AND horarios.id <= solicituds.hora_fin
and solicituds.id =1');

$salones = array();
$columnas = array();
$disponible = array();
      foreach ($idHoras as  $datos) {
            
        $salon =DB::table('cede_a_s')
       
        ->where('cede_a_s.id_dia', $diaDeLaSemana)
        ->where('cede_a_s.id_horario', $datos->id)
        ->get();

     $salones[] = $salon;
        }
        foreach ($salon as $key => $value) {
            foreach ($value as $key2 => $value2) {
              $columnas[]= $key2;
            }
             
        } 

$tem=0;

foreach ($columnas as $key => $value) {
    for ($i=0; $i < count($salones) ; $i++) { 
        if ($salones[$i][0]->$value == '0') {
           $tem++;
        }
    }
        if ($tem == count($salones)) {
               $disponible[] = $value;
            }
            $tem=0;
}

return $disponible;

		 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            
            'archivo' => 'required|mimes:xls,xlsx'
            
            ]);

            $file = $request->file('archivo');

        if ($request->sede == 'A'){
            SedeA::truncate();

            Excel::import(new AImport, $file);
            return back()->with('status', 'Se Guardó El Horario de la sede A Exitosamente');

        }

        if ($request->sede == 'B'){
            SedeB::truncate();

            Excel::import(new BImport, $file);
            return back()->with('status', 'Se Guardó El Horario de la sede B Exitosamente');

        }
      
    
        if ($request->sede == 'C'){
            SedeC::truncate();

            Excel::import(new CImport, $file);
            return back()->with('status', 'Se Guardó El Horario de la sede C Exitosamente');

        }

        if ($request->sede == 'D'){
            SedeD::truncate();

            Excel::import(new DImport, $file);
            return back()->with('status', 'Se Guardó El Horario de la sede D Exitosamente');

        }
  
        if ($request->sede == 'E'){
            SedeE::truncate();

            Excel::import(new EImport, $file);
            return back()->with('status', 'Se Guardó El Horario de la sede E Exitosamente');

        }


    
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('configuraciones');
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
        //
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
