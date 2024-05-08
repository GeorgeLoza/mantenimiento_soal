@extends('layout.app')
@section('titulo')
Repuestos
@endsection

@section('contenido')


{{-- <button class="p-2 bg-green-500 rounded-lg" onclick="Livewire.dispatch('openModal', { component: 'repuesto.crear' })">
    <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >Registrar item</button> --}}


<div class="flex justify-end">
<!--Boton Crear -->
<button class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" onclick="Livewire.dispatch('openModal', { component: 'repuesto.crear' })">
    Registrar Item</button>
</div>

@livewire('repuesto.tabla')

@endsection

@section('scripts')

@endsection