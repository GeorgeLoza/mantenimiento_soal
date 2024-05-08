@extends('layout.app')
@section('titulo')
   Solicitudes de repuestos OT's
@endsection

@section('contenido')

<div class="md:flex gap-4">
    <div class=" md:w-1/3">
        @livewire('repOrdenes.crear')
        
    </div>

    <div class=" md:w-2/3">
        @livewire('repOrdenes.tabla')
    </div>
</div>
    

@endsection

@section('scripts')
@endsection
