<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\Planta;
use App\Models\TipoOficio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
        public function index()
        {
            $tipoOficios =TipoOficio::all();
            $departamentos =Departamentos::all();
            $plantas =Planta::all();

            return view('auth.registrar', compact(['tipoOficios','departamentos','plantas'])); 
        }
        public function store(Request $request)
        { 
           $this->validate($request,[

            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'rol' => 'required',
            'codigo' => 'required|min:4| |max:6| unique:users',
            'password' => 'required|confirmed',
            'departamentos_id' => 'required',
            'tipo_oficios_id' => 'required',
            'plantas_id' => 'required',

           ]);
          

           try { 
            User::create([
           
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'rol' => $request->rol,
            'codigo' => $request->codigo,
            'password' => Hash::make($request->password) ,
            'tipo_oficios_id' => $request->tipo_oficios_id,
            'departamentos_id' => $request->departamentos_id,
            'plantas_id' => $request->plantas_id,
            
        ]);

           }
           catch (\Throwable $th){
                dd($th);
           }
           auth()->attempt($request->only('codigo','password'));
           return redirect('/');

        }
}
