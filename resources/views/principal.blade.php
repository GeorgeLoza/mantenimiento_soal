
@extends('layout.app')

@section('titulo')
    DASHBOARD
@endsection

@section('contenido')
<div class="md:flex gap-4">
    <div class="md:w-1/3 mb-3">
        @livewire('dashboard.estadoTecnico')
    </div>
    <div class="md:w-1/3 mb-3">
        @livewire('dashboard.solicitudesRepuestos')
    </div>
    <div class="md:w-1/3 mb-3">
        @livewire('dashboard.solicitudesOrp')
    </div>
</div>
@endsection

@section('scripts')

@endsection
