<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Fecha
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Ot
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Maquina
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Problema
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Repuesto
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Cantidad
                    </th>
                    <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Estado
                    </th>

                    <th scope="col" class=" flex gap-2 px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>

                    </th>

                </tr>
            </thead>
            <tbody class="">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th class="p-1">
                            <input type="text" wire:model.live='f_fecha' placeholder="Filtrar por fecha"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_ot' placeholder="Filtrar por ot"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_ubicacacion' placeholder="Filtrar por ubicacion"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_maquina' placeholder="Filtrar por maquina"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_problema' placeholder="Filtrar por problema"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_rep' placeholder="Filtrar por repuesto"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th>

                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                    </tr>
                @endif
                @foreach ($solicitudes as $solicitud)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $solicitud->fecha }}
                        </th>
                        <td class="px-4 py-2" nowrap>
                            {{ $solicitud->orden->numero_orden }}
                        </td>
                        <td class="px-4 py-2">
                            @if ($solicitud->orden->solicitud->maquina)
                                <b class="text-sky-400"> {{ $solicitud->orden->solicitud->maquina->codigo }} </b> <br>
                                {{ $solicitud->orden->solicitud->maquina->nombre }}
                            @endif

                        </td>
                        <td class="px-4 py-2">

                            <b class="text-sky-400">{{ $solicitud->orden->solicitud->ubicacion->codigo }}</b> <br>

                            {{ $solicitud->orden->solicitud->ubicacion->nombre }}
                        </td>
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white max-w-2xl">
                            {{ $solicitud->orden->solicitud->descripcion }}
                        </th>
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                            {{ $solicitud->repuestos->nombre }}
                        </th>
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                            {{ $solicitud->cantidad }}
                        </th>


                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white " nowrap>

                            @if ($solicitud->estado == 'Pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $solicitud->estado }}</span>
                            @endif
                            @if ($solicitud->estado == 'Aprobado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $solicitud->estado }}</span>
                            @endif
                            @if ($solicitud->estado == 'Entregado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $solicitud->estado }}</span>
                            @endif
                            @if ($solicitud->estado == 'Rechazado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $solicitud->estado }}</span>
                            @endif
                            @if ($solicitud->estado == 'Repuesto pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $solicitud->estado }}</span>
                            @endif
                        </th>

                        <th class="flex gap-4 items-center px-4 py-2">
                            <svg  wire:click="aprobar({{$solicitud->id}})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6 fill-green-600">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                            <svg  wire:click="rechazar({{$solicitud->id}})"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6 fill-red-600">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                            <div  wire:click="esperar({{$solicitud->id}})" class="rounded-full text-center bg-gray-600 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-4 w-4 fill-white"><path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V75c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437v11c-17.7 0-32 14.3-32 32s14.3 32 32 32H64 320h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V437c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320 64 32zM96 75V64H288V75c0 19-5.6 37.4-16 53H112c-10.3-15.6-16-34-16-53zm16 309c3.5-5.3 7.6-10.3 12.1-14.9L192 301.3l67.9 67.9c4.6 4.6 8.6 9.6 12.1 14.9H112z"/></svg>
                            </div>

                        </th>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
    @if (!$aplicandoFiltros)
    <div>
        {{ $solicitudes->links('pagination::tailwind') }}
    </div>
    @endif

</div>
