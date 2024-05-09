<div>
    <div>
        <div class="flex justify-between">

            <div class="">
                <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Generar OT</h2>
            </div>
            <div class="">
                @if ($generar->numero_orden)
                    <p class="text-2xl"><span class="font-bold">Solicitud #
                        </span>
                        {{ $generar->numero_orden }}
                    </p>
                    @else
                    <p class="text-2xl"><span class="font-bold"> Rechazado
                    </span>
                    
                </p>
                @endif

            </div>


        </div>

        <div class="">
            <form wire:submit="update" novalidate>
                @csrf
                <div class="md:flex md:gap-4 ">

                    <div class="md:w-1/2 ">
                        {{-- encabezado --}}
                        <div class="flex mb-4">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                    <tbody>
                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                Fecha
                                            </th>
                                            <td class="px-4 py-2">
                                                {{ $solicitud->created_at }}
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                Solicitante
                                            </th>
                                            <td class="px-4 py-2">
                                                {{ $solicitud->user->nombre }} {{ $solicitud->user->apellido }}
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                Estado
                                            </th>
                                            <td class="px-4 py-2">
                                                {{ $solicitud->estado }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        {{-- cuerpo 1 --}}
                        <div class="flex flex-col gap-2 mb-1">

                            <div class="">
                                <label for="areaSelect"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Área</label>

                                <select wire:model="ubicacion_id" id="areaSelect"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    @foreach ($ubicaciones as $ubicacion)
                                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="">
                                <label for="maquinaaSelect"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Maquina</label>
                                <select wire:model="maquina_id" id="maquinaaSelect"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($maquinas as $maquina)
                                        <option value="{{ $maquina->id }}">{{ $maquina->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="">
                                <label for="descripcion"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Descripción del
                                    problema</label>
                                <textarea wire:model="descripcion" id="descripcion" rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2"
                                    placeholder="Escribe tu problema" style="resize: none;"></textarea>
                            </div>

                        </div>

                    </div>

                    {{-- cuerpo 2 --}}
                    <div class="md:w-1/2">

                        

                        <div class="flex flex-row gap-2">

                            <div class="md:w-1/2">
                                <label for="asignado"
                                    class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Asignado</label>
                                <select id="asignado" wire:model="user_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Seleccione un tecnico</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                                    @endforeach

                                </select>
                            </div>
{{-- 
                            <div class="md:w-1/2 mb-2">
                                <label for="tipoOrden"
                                    class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Tipo de
                                    Orden</label>
                                <select id="tipoOrden" wire:model="tipo_ordens_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Seleccione un Tipo</option>
                                    @foreach ($tipoOrdenes as $tipoOrden)
                                        <option value="{{ $tipoOrden->id }}">{{ $tipoOrden->tipo_orden }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                        </div>

                        <div class="flex flex-row gap-2">

                            <div class="md:w-1/2">
                                <label for="prioridad"
                                    class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Prioridad</label>
                                <select id="prioridad" wire:model="prioridad_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Seleccione una prioridad</option>
                                    @foreach ($prioridades as $prioridad)
                                        <option value="{{ $prioridad->id }}">{{ $prioridad->prioridad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="flex">
                                <input type="datetime-local" wire:model="fecha"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div> --}}
                        </div>



                        <div class="flex flex-row gap-2">
                            <div class="md:w-full mt-2">
                                <label for="notasTec"
                                    class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Nota
                                    adicional</label>
                                <textarea type="text" id="notasTec" wire:model="notasTec" name="notasTec" rows="2"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2"
                                    placeholder="Escribe las notas para el tecnico " style="resize: none;"></textarea>
                            </div>
                        </div>

                        <div class="flex flex-row mt-4 gap-2">
                            <div class="w-1/2">
                                <button type="submit"
                                    class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-3 text-center inline-flex items-center justify-center dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 -ml-1 w-5 h-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M2.93 17.07a10 10 0 1114.14-14.14A10 10 0 012.93 17.07zm12.73-1.41A8 8 0 104.34 4.34a8 8 0 0011.32 11.32zM10 11a2 2 0 100-4 2 2 0 000 4zm-3-2a3 3 0 116 0 3 3 0 01-6 0z" />
                                    </svg>
                                    Aceptado
                                </button>
                            </div>

                            <div class="w-1/2">
                                <button wire:click="rechazar" type="button"
                                    class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-3 text-center inline-flex items-center justify-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 -ml-1 w-5 h-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Rechazar
                                </button>
                            </div>
                        </div>


                    </div>
                </div>


            </form>
        </div>
    </div>



</div>
