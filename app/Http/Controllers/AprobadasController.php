<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class AprobadasController extends Controller
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

        if (\Auth::user()->tipo == 'administrativo'){

            $aprobadas = DB::table('solicituds')
            ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
            ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
            ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
            ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')
            ->where('estado', 1)
            ->where('finalizada', 0 )
            ->get();

                        return view('aprobadas',['aprobadas' => $aprobadas]);

        }

        if (\Auth::user()->tipo == 'empleado'){

            $aprobadas = DB::table('solicituds')
            ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
            ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
            ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
            ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')
            ->where('estado', '1')
            ->where('sede',\Auth::user()->sede)
            ->orderBy('fecha', 'asc')
            ->get();

            // $aprobadas = DB::table('solicituds')->where('estado', '0')->where('sede',\Auth::user()->sede)
            // ->get();

           
             return view('aprobadas',['aprobadas' => $aprobadas]);

        }
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

     $f1= $request->fecha1;
     $f2= $request->fecha2;


        if (\Auth::user()->tipo == 'administrativo'){

            $informe = DB::table('solicituds')
            ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
            ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
            ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
            ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')
            ->where('estado', '1')
            ->whereBetween('fecha', [$f1, $f2])
            ->orderBy('fecha', 'asc')
            ->get();


            $pdf = PDF::loadView('pdf', compact('informe', 'f1','f2'));

            return $pdf->stream('informe.pdf');
      }


        // $var = $this->show();
        
        // $pdf = PDF::loadView($var);
        
        // return $pdf->stream($var);
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
    public function show($id, Request $request)
    {


        //     $f1= $request->fecha1;
        //     $f2= $request->fecha2;


        // if (\Auth::user()->tipo == 'administrativo'){

        //     $informe = DB::table('solicituds')
        //     ->join('user_estandars', 'solicituds.user_id', '=', 'user_estandars.id')
        //     ->join('horarios as h1', 'solicituds.hora_inicio', '=', 'h1.id')
        //     ->join('horarios as h2', 'solicituds.hora_fin', '=', 'h2.id')
        //     ->select('solicituds.*','user_estandars.*', 'h1.hora_inicio', 'h2.hora_fin')
        //     ->where('estado', '1')
        //     ->whereBetween('fecha', [$f1, $f2])
        //     ->orderBy('fecha', 'asc')
        //     ->get();

          return view('informes');
        // // $pdf = PDF::loadView('informes',['informe' => $informe]);
        // // return $pdf->download('informe.pdf');
        // $pdf = PDF::loadView('informes', compact('informe'))->stream();

        // return $pdf;
        // }
     
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
