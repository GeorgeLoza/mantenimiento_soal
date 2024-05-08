    @extends('layout.app')


@section('titulo')
    Maquinas
@endsection


@section('contenido')
    <div class="flex justify-end mb-1">
        <button data-modal-target="crear-modal" data-modal-toggle="crear-modal"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            CREAR
        </button>
    </div>

    {{-- HEADER DE LA TABLA  --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-1">
                        Codigo
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Nombre
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Tipo
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Serie
                    </th>
                    <th scope="col" class="px-3 py-1" nowrap>
                        Fecha compra
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Modelo
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Costo
                    </th>
                    <th scope="col" class="px-3 py-1">
                        fabricante
                    </th>
                    <th scope="col" class="px-3 py-1">
                        estado
                    </th>
                    <th scope="col" class="px-3 py-1">
                        criticidad
                    </th>
                    <th scope="col" class="px-3 py-1">
                        ubicacion
                    </th>
                    <th scope="col" class="px-3 py-1">
                        acciones
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- CONTENIDO DE TABLA  --}}

                @foreach ($maquinas as $maquina)
                    {{-- FOR EACH PARA LLENAR TABLAS  --}}

                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">

                        <td class="px-3 py-1 text-xs" nowrap>
                            {{ $maquina->codigo }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->nombre }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->tipo }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->serie }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->fechacom }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->modelo }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->costo }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->fabricante }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->estado }}
                        </td>
                        <td class="px-3 py-1 text-xs">
                            {{ $maquina->criticidad }}
                        </td>
                        <td class="px-3 py-1 text-xs" nowrap>
                            {{ $maquina->ubicacion->nombre }}
                        </td>


                        <td class="px-3 py-1 flex mt-1 gap-1">
                            <a href="{{ route('maquina.edit', $maquina->id) }}">
                                <button
                                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"
                                        class="fill-white dark:fill-white">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg></button>
                            </a>

                            {{-- AUTENTICACION --}}

                            @if (auth()->user()->rol == 'Admin') 
                                <form action="{{route('maquina.destroy', $maquina->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5 dark:bg-red-500 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"
                                            class="fill-white dark:fill-white">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <!-- Main modal -->
        <div id="crear-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="crear-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Registro de Maquinas</h3>
                        <form class="space-y-6" action="{{ route('maquina.store') }}" method="POST">

                            @csrf

                            <div class="grid md:grid-cols-3 md:gap-2">

                                {{-- espacio de codigo para insertar codigo del equipos --}}

                                <div class="relative z-0 w-full mb-6 group">

                                    <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}"
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

                                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
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
                                    <select name="tipo_maqs_id" id="tipo_maqs_id"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        <option class="dark:bg-gray-800" value="" enabled selected hidden>Seleccione un tipo
                                        </option>

                                        @foreach ($tipoMaqs as $tipoMaq)

                                        <option class="dark:bg-gray-800" value="{{$tipoMaq->id}}">{{$tipoMaq->nombre}}</option>

                                        @endforeach
                                        
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

                                    <input type="text" name="serie" id="serie" value="{{ old('serie') }}"
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

                                    <input type="date" name="fechacom" id="fechacom"
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

                                    <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}"
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

                                    <input type="text" name="costo" id="costo" value="{{ old('costo') }}"
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
                                        value="{{ old('fabricante') }}"
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
                                    <select name="estado_equipos_id" id="estado_equipos_id"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        
                                        <option class="dark:bg-gray-800" value="" enable selected hidden>Seleccione un estado
                                        </option>

                                        @foreach ($estadoMaqs as $estadoMaq)
                                        <option class="dark:bg-gray-800" value="{{$estadoMaq->id}}">{{$estadoMaq->estado}}</option>
                                        
                                        @endforeach
                                        

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

                                        <option class="dark:bg-gray-800" value="" enabled selected hidden>Criticidad
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

                            <div class="grid md:grid-cols-2 md:gap-2">

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="ubicacion_id" id="ubicacion_id"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                                        <option class="dark:bg-gray-800" value="" enabled selected hidden>Seleccione
                                            una
                                            ubicacion</option>

                                        
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option class="dark:bg-gray-800" value="{{ $ubicacion->id }}">
                                                {{ $ubicacion->codigo }} - {{ $ubicacion->nombre }}</option>
                                                
                                        @endforeach
                                    </select>

                                    @error('ubicacions_id')
                                        <p class="text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
