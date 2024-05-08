<?php

namespace App\Http\Controllers;

use App\Models\EstadoEquipo;
use App\Models\Maquina;
use App\Models\TipoMaq;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class MaquinaController extends Controller
{
    public function index(){

    $maquinas=Maquina::all();
    $ubicaciones=Ubicacion::all();
    $tipoMaqs=TipoMaq::all();
    $estadoMaqs=EstadoEquipo::all();

    return view('maquinas.index', compact(['maquinas','ubicaciones','tipoMaqs', 'estadoMaqs']));
}

public function store (Request $request){
     

    $this->validate($request,[

        'codigo' =>'required',
        'nombre' =>'required',
        'serie' =>'required',
        'fechacom' =>'required',
        'modelo' =>'required',
        'costo' =>'required',
        'fabricante' =>'required',
        'criticidad' =>'required',
        'ubicacion_id' =>'required',
        'tipo_maqs_id' =>'required',
        'estado_equipos_id' =>'required',

        ]);

        try {

            Maquina::create ([
                
        'codigo' => $request->codigo,
        'nombre' => $request->nombre,
        'serie' => $request->serie,
        'fechacom' => $request->fechacom,
        'modelo' => $request->modelo,
        'costo' => $request->costo,
        'fabricante' => $request->fabricante,
        'criticidad' => $request->criticidad,
        'ubicacion_id' => $request->ubicacion_id,
        'tipo_maqs_id' => $request->tipo_maqs_id,
        'estado_equipos_id'=>$request->estado_equipos_id,

        
            ]);
        }

        catch (\Throwable $th){
            dd($th);

        }

        return back();

}

public function edit($id){
    $maquina=Maquina::find($id);
    $ubicaciones=Ubicacion::all();
    $tipoMaq=TipoMaq::all();
    $estadoMaqs=EstadoEquipo::all();
    return view('maquinas.edit', compact('maquina','ubicaciones','tipoMaq','estadoMaqs'));
}


public function update(Request $request,$id){
    $this->validate($request,[
       
        'codigo' =>'required',
        'nombre' =>'required',
        'serie' =>'required',
        'fechacom' =>'required',
        'modelo' =>'required',
        'costo' =>'required',
        'fabricante' =>'required',
        'criticidad' =>'required',
        'ubicacion_id' =>'required',
        'tipo_maqs_id' =>'required',
        'estado_equipos_id' =>'required',
      
    ]);

    if($request->password){
       $this->validate($request,[
           'password' => 'confirmed',
       ]);      
    }
    
    $maquina = Maquina::find($id);
    $maquina->codigo = $request->codigo;
    $maquina->nombre = $request->nombre;
    $maquina->serie = $request->serie;
    $maquina->fechacom = $request->fechacom;
    $maquina->modelo = $request->modelo;
    $maquina->costo = $request->costo;
    $maquina->fabricante = $request->fabricante;
    $maquina->criticidad = $request->criticidad;
    $maquina->ubicacion_id = $request->ubicacion_id;
    $maquina->tipo_maqs_id = $request->tipo_maqs_id;
    $maquina->estado_equipos_id = $request->estado_equipos_id;
    
   
    $maquina->save();
    return redirect()->route('maquina.index');

   } 

   public function destroy(Maquina $id){
    $id->delete();
    return redirect()->route('maquina.index');
   }

   


}
