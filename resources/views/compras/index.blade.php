@extends('layout.app')
@section('titulo')
   Compras
@endsection

@section('contenido')

<div class="md:flex">
    <div class=" md:w-1/3">
        @livewire('compra.crear')
        
    </div>

    <div class=" md:w-2/3">
        @livewire('compra.tabla')
    </div>
</div>
    

@endsection

@section('scripts')
@endsection
