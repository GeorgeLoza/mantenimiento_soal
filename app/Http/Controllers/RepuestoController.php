<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepuestoController extends Controller
{
    public function index(){
        return view('repuestos.index');
    }
}
