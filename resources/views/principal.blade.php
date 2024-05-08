
@extends('layout.app')

@section('titulo')
    DASHBOARD
@endsection

@section('contenido')
<div class="flex gap-4">
    <div class="w-1/3">
        @livewire('dashboard.estadoTecnico')
    </div>
    <div class="w-1/3">
        @livewire('dashboard.solicitudesRepuestos')
    </div>
    <div class="w-1/3">
        @livewire('dashboard.solicitudesOrp')
    </div>
</div>
@endsection

@section('scripts')

@endsection
