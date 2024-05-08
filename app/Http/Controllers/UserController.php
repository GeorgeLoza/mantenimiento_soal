<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\Planta;
use App\Models\TipoOficio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index(){

       $usuarios= User::all();
       $tipoOficios =TipoOficio::all();
       $departamentos =Departamentos::all();
       $plantas =Planta::all();

       return view('users.index',compact('usuarios','tipoOficios','departamentos','plantas'));
        
    }

    public function edit($id){

         $usuario= User::find($id);
         $tipoOficios =TipoOficio::all();
         $departamentos =Departamentos::all();
         $plantas =Planta::all();

        return view ('users.edit', compact('usuario','tipoOficios','departamentos','plantas'));
    } 

    public function update(Request $request,$id){
     $this->validate($request,[
        
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required',
        'email' => 'required',
        'rol' => 'required',
        'codigo' => 'required|min:4| |max:6',
        'departamentos_id' => 'required',
        'tipo_oficios_id' => 'required',
        'plantas_id' => 'required',
     ]);
     
     if($request->password){
        $this->validate($request,[
            'password' => 'confirmed',
        ]);      
     }
     
     $registro = User::find($id);
     $registro->nombre = $request->nombre;
     $registro->apellido = $request->apellido;
     $registro->telefono = $request->telefono;
     $registro->email = $request->email;
     $registro->rol = $request->rol;
     $registro->codigo = $request->codigo;
     $registro->departamentos_id = $request->departamentos_id;
     $registro->tipo_oficios_id = $request->tipo_oficios_id;
     $registro->plantas_id = $request->plantas_id;
    
     if($request->password){
        $registro->password = Hash::make($request->password);
     }
     
     $registro->save();
     return redirect()->route('user.index');

    }     
    public function destroy(User $id){
       $id->delete();
       return redirect()->route('user.index');
    } 
}
