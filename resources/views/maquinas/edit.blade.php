@extends('layout.app')

@section('titulo')
    Editar Maquina
@endsection

@section('contenido')
<div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Registro de Maquinas</h3>
                        <form class="space-y-6" action="{{route('maquina.update', $maquina->id)}}" method='POST' novalidate>
                            @method('PUT')

                            @csrf

                            <div class="grid md:grid-cols-3 md:gap-2">

                                {{-- espacio de codigo para insertar codigo del equipos --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="codigo" id="codigo" value="{{ $maquina->codigo }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="codigo"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Codigo</label>
                                    @error('codigo')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar los nombres de los equipos --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="nombre" id="nombre" value="{{ $maquina->nombre }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="nombre"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>

                                    @error('nombre')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar el tipo de maquina --}}

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="tipo" id="tipo"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        <option class="dark:bg-gray-800" value="{{ $maquina->tipo_maqs_id}}" selected >{{ $maquina->codigo}}
                                        </option>

                                        <option class="dark:bg-gray-800" value="Envasadora">Envasadora</option>

                                        <option class="dark:bg-gray-800" value="Homogeneizadora">Homogeneizadora</option>
                                    </select>

                                    @error('tipo_maqs_id')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                            {{-- espacio de codigo para insertar el numero de serie --}}

                            <div class="grid md:grid-cols-4 md:gap-2">

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="serie" id="serie" value="{{ $maquina->serie }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="serie"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie</label>

                                    @error('serie')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar fechas de compra --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="date" name="fechacom" id="fechacom" value="{{ $maquina->fechacom }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="fechacom"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha
                                        de Compra</label>

                                    @error('fechacom')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar el modelo --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="modelo" id="modelo" value="{{ $maquina->modelo }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="modelo"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modelo</label>

                                    @error('modelo')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar el costo del equipo --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="costo" id="costo" value="{{ $maquina->costo }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="costo"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Costo</label>

                                    @error('costo')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                            {{-- espacio de codigo para insertar codigo del equipos --}}

                            <div class="grid md:grid-cols-3 md:gap-2">

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="fabricante" id="fabricante"
                                        value="{{ $maquina->fabricante }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="fabricante"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fabricante</label>

                                    @error('fabricante')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar el estado del equipo --}}

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="estado" id="estado"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        <option class="dark:bg-gray-800" value="{{ $maquina->estado_equipos_id}}"selected>{{ $maquina->estado_equipos_id}}
                                        </option>

                                        <option class="dark:bg-gray-800" value="Disponible">Disponible</option>

                                        <option class="dark:bg-gray-800" value="No Disponible">No Disponible</option>

                                    </select>

                                    @error('estado_equipos_id')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- espacio de codigo para insertar criticidad --}}

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="criticidad" id="criticidad" value="{{ old('criticidad') }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        <option class="dark:bg-gray-800" value="{{ $maquina->criticidad }}"selected >{{ $maquina->criticidad }}
                                        </option>

                                        <option class="dark:bg-gray-800" value="Critico">Critico</option>

                                        <option class="dark:bg-gray-800" value="No Critico">No Critico</option>

                                    </select>

                                    @error('criticidad')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>
                            </div>

                            {{-- espacio de codigo para insertar criticidad --}}

                            <div class="grid md:grid-cols-1 md:gap-2">
                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="ubicacion_id" id="ubicacion_id"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        @foreach ($ubicaciones as $ubicacion)
                                        <option class="dark:bg-gray-800" value="{{ $maquina->ubicacion_id }}" selected>{{ $ubicacion->codigo }}  -  {{ $ubicacion->nombre }}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('ubicacion_id')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>

                        </form>
                    </div>
                
@endsection