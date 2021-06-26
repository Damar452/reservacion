<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent;
use App\User;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


// use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
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
        $users = User::where('name', 'LIKE', '%'. $query . '%')
        ->orWhere('identificacion','LIKE','%'. $query . '%')
        ->orWhere('tipo','LIKE','%'. $query . '%')
       ->orderBy('id', 'asc')
       ->get();

 
      return view('gestion_usuarios', ['users' => $users, 'search' => $query]);

  

    // $query = trim($request->get('search'));
    // $users = User::where('name', 'LIKE', '%'. $query . '%')
    //          ->orWhere('email','LIKE','%'. $query . '%')
    //          ->paginate(5);
          
            
    // return view('home', ['users' => $users, 'search' => $query]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    return "create";
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
        'old_password' => 'required|password',
        'new_password' => 'required|min:8',
        'password_confirm' => 'required|same:new_password'
 
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status','Se cambio su contraseña correctamente!!!');

      
        // $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.passwords.cambiar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user = auth()->user()->password;
        // return "usuario".$user;

       

      $request->validate([
                'uidentificacion' => 'required','string', 'min:7' ,'max:20', 'unique:users',
                'uname' => 'required','string', 'min:8' ,'max:50',
                'uemail' => 'required', 'string', 'email', 'max:50','unique:users',
                'uutelefono' => 'required', 'string', 'min:7', 'max:10',
                'mmtipo' => 'required',
                'mmsede' => 'required',

        ]);

     

       

        $usuario = User::findOrFail($request->id);
        $usuario-> identificacion = $request->uidentificacion;
        $usuario-> name = $request->uname;
        $usuario-> email = $request->uemail;
        $usuario-> telefono = $request->uutelefono;
        $usuario-> tipo = $request->mmtipo;
        $usuario-> sede = $request->mmsede;

      
        $usuario->save();

        return redirect()->route('usuario.index')->with('status', 'Usuario Actualizado Correctamente!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = User::find($id);

        $e -> delete();
        // flash("Se ha eliminado ".$user->name." de forma exitosa!", 'danger')->important();
        // return redirect()->route('home.index');
        return back();
    }


    










}
