<?php

namespace App\Livewire\OrdenesTrabajo;

use Carbon\Carbon;
use App\Models\Maquina;
use App\Models\Solicitud;
use Livewire\Component;
use App\Models\Ubicacion;
use App\Models\User;

class SolicitudCrud extends Component
{
    public $search = '';

    public $horaActual;

    public $user_id, $fecha_sol, $maquina_id, $ubicacion_id, $descripcion, $estado, $status, $siguienteId, $fechaHoraActual;

    public $nombreMaquina;

    public $opcionSeleccionada = '';

    public function mount()
    {
        // Obtener el siguiente ID de la base de datos
        $ultimoRegistro = Solicitud::latest()->first();
        $this->siguienteId = $ultimoRegistro ? $ultimoRegistro->id + 1 : 1;

         // Obtener la fecha y hora actual del sistema
         $this->fechaHoraActual = Carbon::now()->toDateTimeString();

    }

    public function render()
    {
        $horaActual = Carbon::now()->toTimeString();
        $maquinas = Maquina::where('codigo', 'like', '%' . $this->opcionSeleccionada . '%')->get();
        $ubicaciones = Ubicacion::all();
        $solicitudes = Solicitud::all();

       
        return view('livewire.ordenes-trabajo.solicitud-crud', compact(['maquinas', 'ubicaciones', 'solicitudes']));
    }

    // public function updatedMaquinaId()
    // {
    //     $maquina = Maquina::find($this->Maquina_id);
    //    $this->nombreMaquina =  $maquina->nombre;
    //  }


    public function save()
    { 
        $this->validate([
            
        
            'maquina_id'=> 'required',
            'ubicacion_id'=> 'required',
            'descripcion'=> 'required',

        ]);

        try{

            Solicitud::create([

            'user_id'=> auth()->user()->id,
            'fecha_sol'=> now(),
            'maquina_id'=> $this-> maquina_id,
            'ubicacion_id'=> $this-> ubicacion_id,
            'descripcion'=> $this-> descripcion,
            'estado'=> 'En revision',
            ]);

$this->vaciaInput();
        }catch (\Throwable $th) {
            dd($th);
        }
    }

    public function vaciaInput(){

            $this-> user_id = "";
            $this-> fecha_sol = "";
            $this-> maquina_id = "";
            $this-> ubicacion_id = "";
            $this-> descripcion = "";
            $this-> estado = "";
            $this-> status = "";

    }


}
