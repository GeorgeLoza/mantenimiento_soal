<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'codigo' => 'required',
            'password' => 'required',
        ]);
        if (!auth()->attempt($request->only('codigo', 'password'), $request->remember)) {
            return back()->with('mensaje', 'credenciales incorrectas');
        }

        // Obtener el rol del usuario autenticado
        $rol = auth()->user()->rol;

        // Redireccionar según el rol
        switch ($rol) {
            case 'tecnico':
                return redirect()->route('misots.index');
                break;
            case 'almacen':
                return redirect()->route('misots.index');
                break;
            case 'solicitante':
                return redirect()->route('solicitud.index');
                break;
            case 'Admi':
                return redirect()->route('index');
                break;
                // Agrega más casos según los roles disponibles en tu aplicación
            default:
                dd('error');
                break;
        }
    }
}
