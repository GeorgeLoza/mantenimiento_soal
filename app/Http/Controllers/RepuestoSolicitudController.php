<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepuestoSolicitudController extends Controller
{
    public function index(){
        return view('repuestosSolicitud.index');
    }
}
