@extends('layout.app')

@section('titulo')
    Editar localizacion
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-2/4 p-6 rounded-lg shadow-xl">
        <form action="{{route('ubicacion.update',$ubicacion->id)}}" method="POST" novalidate>
            @method('PUT')
            @csrf
            <div class="grid md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="codigo" id="codigo" value="{{ $ubicacion->codigo }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />

                    <label for="codigo"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CODIGO AREA</label>
                    @error('codigo')
                        <p class="text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="nombre" id="nombre" value="{{ $ubicacion->nombre }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="nombre"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NOMBRE DEL AREA</label>

                    @error('nombre')
                        <p class="text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="planta"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 ">Planta</label>

                    <select name="planta" id="planta"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                        <option class="dark:bg-gray-800" value="{{ $ubicacion->planta }}" selected >{{ $ubicacion->planta}}</option>
                        <option class="dark:bg-gray-800" value="SOALPRO">SOALPRO</option>
                        <option class="dark:bg-gray-800" value="SOYA">SOYA</option>
                        <option class="dark:bg-gray-800" value="LACTEOS">LACTEOS</option>
                        <option class="dark:bg-gray-800" value="GALLETERIA">GALLETERIA</option>
                        <option class="dark:bg-gray-800" value="PANADERIA">PANADERIA</option>
                        <option class="dark:bg-gray-800" value="ALAMO">ALAMO</option>
                        <option class="dark:bg-gray-800" value="CARSA">CARSA</option>
                        <option class="dark:bg-gray-800" value="TECALIM">TECALIM</option>
                    </select>

                    @error('planta')
                        <p class="text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

          

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
        </form>

    </div>
</div>
@endsection