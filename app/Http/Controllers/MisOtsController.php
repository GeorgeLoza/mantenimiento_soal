<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisOtsController extends Controller
{
    public function index(){

        return view('misots.index');
        
    }
}
    