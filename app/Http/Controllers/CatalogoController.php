<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
   public function index(){
   return view('catalogos.index');
   }

}

