<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto h-[28rem] overflow-hidden">

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Almacen
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        #-Orden
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Estado
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Repuesto
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Cantidad
                    </th>
                    <th scope="col" class="flex gap-2 px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
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
                            <input type="date" wire:model.live='f_fecha' placeholder="Filtrar por fecha"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_almacen' placeholder="Filtrar por almacen"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_orden' placeholder="Filtrar por proveedor"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_estado' placeholder="Filtrar por factura"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_repuesto' placeholder="Filtrar por repuesto"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            
                                
                        </th>
                        
                        <th class="p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" wire:click="limpiarFiltros"
                                    viewBox="0 0 576 512" class="h-5 w-5 fill-green-600 dark:fill-green-500">
                                    <path
                                        d="M290.7 57.4L57.4 290.7c-25 25-25 65.5 0 90.5l80 80c12 12 28.3 18.7 45.3 18.7H288h9.4H512c17.7 0 32-14.3 32-32s-14.3-32-32-32H387.9L518.6 285.3c25-25 25-65.5 0-90.5L381.3 57.4c-25-25-65.5-25-90.5 0zM297.4 416H288l-105.4 0-80-80L227.3 211.3 364.7 348.7 297.4 416z" />
                                </svg>
                        </th>
                        {{-- fin de la visualizacion     --}}
                    </tr>
                @endif
                @foreach ($movimientos as $movimiento)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $movimiento->fecha }}
                        </th>
                        <td class="px-1 py-1" nowrap>
                            @if ($movimiento->almacen)
                            {{ $movimiento->almacen->nombre }}
                            @endif
                        </td>
                        <td class="px-1 py-1 max-w-xs whitespace-normal text-justify">
                            {{ $movimiento->orden->numero_orden}}    
                        </td>
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white " nowrap>

                            @if ($movimiento->estado == 'Pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $movimiento->estado }}</span>
                            @endif
                            @if ($movimiento->estado == 'Aprobado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $movimiento->estado }}</span>
                            @endif
                            @if ($movimiento->estado == 'Entregado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $movimiento->estado }}</span>
                            @endif
                            @if ($movimiento->estado == 'Rechazado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $movimiento->estado }}</span>
                            @endif
                            @if ($movimiento->estado == 'Repuesto pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $movimiento->estado }}</span>
                            @endif
                        </th>
                        <td class="px-4 py-2">
                            {{ $movimiento->repuestos->nombre }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $movimiento->cantidad }}
                        </td>
                        <th class="flex gap-4 items-center px-4 py-2">
                            <div wire:click="almacen1({{$movimiento->id}})" class="py-1 px-4 rounded-xl bg-green-600 text-white">
                                Almacen
                            </div>
                            <div wire:click="almacen2({{$movimiento->id}})" class="py-1 px-4 rounded-xl bg-blue-600 text-white">
                                Gerencia
                            </div>
                            <div  wire:click="esperar({{$movimiento->id}})" class="rounded-full text-center bg-gray-600 p-1">
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
            {{ $movimientos->links('pagination::tailwind') }}
        </div>
    @endif
</div>