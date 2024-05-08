<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index (){

        $ubicaciones = Ubicacion::all();
        return view('ubicaciones.index', compact('ubicaciones'));

    }

    public function store (Request $request){

        $this->validate($request,[
            
            'nombre' => 'required',
            'codigo' => 'required',
            'planta' => 'required',
            
           ]);
           try {
            Ubicacion::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'planta' => $request->planta,
          
            ]);

           }
           catch (\Throwable $th){
                dd($th);
           }
           return back();
    }

    public function edit($id){
        $ubicacion= Ubicacion::find($id);
        return view ('ubicaciones.edit', compact('ubicacion'));
    } 

    public function update(Request $request,$id){
        $this->validate($request,[
           
            'nombre' => 'required',
            'codigo' => 'required',
            'planta' => 'required',
          
        ]);
        
        if($request->password){
           $this->validate($request,[
               'password' => 'confirmed',
           ]);      
        }
        
        $ubicacion = Ubicacion::find($id);
        $ubicacion->nombre = $request->nombre;
        $ubicacion->codigo = $request->codigo;
        $ubicacion->planta = $request->planta;
       
        $ubicacion->save();
        return redirect()->route('ubicacion.index');
   
       } 

       public function destroy(Ubicacion $id){
        $id->delete();
        return redirect()->route('ubicacion.index');
     } 


}
