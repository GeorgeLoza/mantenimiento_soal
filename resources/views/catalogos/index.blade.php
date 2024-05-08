@extends('layout.app')

@section('titulo')
    Registro base
@endsection

@section('contenido')
    <div class="p-1 sm:ml-50">
        <div class="sm:grid sm-gap-10 lg:grid-cols-3 xl:grid-cols-4 md:grid-cols-2 grid-flow-row gap-4">

            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA PLANTAS --}}
                @livewire('catalogo.planta-crud')
            </div>


            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA PRIORIDADES --}}
                @livewire('catalogo.prioridad')
            </div>


            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE MAQUINAS --}}
                @livewire('catalogo.tipo-maq')

            </div>

            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.tipo-oficio')

            </div>

            <div class="flex box-content  h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.estado-equipo')

            </div>

            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.tipo-orden')

            </div>

            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.estado-ot')

            </div>


            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.departamento-crud')
            </div>

            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.almacen-crud')
            </div>
            <div class="flex box-content h-60">
                {{-- AQUI VA EL CODIGO DE LIVEWIRE PARA TIPO DE OFICIOS --}}
                @livewire('catalogo.proveedor-crud')
            </div>

            
        </div>
    </div>
    
@endsection




