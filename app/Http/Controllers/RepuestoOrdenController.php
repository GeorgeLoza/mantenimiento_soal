<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepuestoOrdenController extends Controller
{
    public function index(){
        return view('repuestosOrden.index');
    }
}
