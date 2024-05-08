<?php

namespace App\Livewire\Alert;

use Livewire\Component;
use Livewire\Attributes\On; 

class Toast extends Component
{
    public $message = ' ';
    public $show_success = false;
    public $show_error = false;
    public $show_warning = false;

    

    public function render()
    {
        return view('livewire.alert.toast');
    }
    public function cerrar_success(){
        $this->show_success = false;
    }
    public function cerrar_error(){
        $this->show_error = false;
    }
    public function cerrar_warning(){
        $this->show_warning = false;
    }

    #[On('success')] 
    public function success($mensaje){
        $this->show_success = true;
        $this->message = $mensaje;
    }

    #[On('warning')] 
    public function warning($mensaje){
        $this->show_warning = true;
        $this->message = $mensaje;
    }

    #[On('error_toast')] 
    public function error($mensaje){
        $this->show_error = true;
        $this->message = $mensaje;
    }
}
