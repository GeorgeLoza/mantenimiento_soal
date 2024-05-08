<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto h-[28rem] overflow-hidden">

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_sol')">
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_sol')">
                        # OT
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user_id')">
                        Solicitante
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('descripcion')">
                        Descripcion
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('maquina_id')">
                        Maquina
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('ubicacion_id')">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('estado')">
                        Estado
                    </th>

                    {{-- por generar generar --}}

                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user_id')">
                        Asignado
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tipo_ordens_id')">
                        Tipo OT
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('prioridad_id')">
                        Prioridad
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('estado_ots_id')">
                        Estado OT
                    </th>

                    {{-- FIN DE VISUALIZACION DE LO GENERADO --}}

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
                        <input type="text" wire:model.live='f_fecha_sol' placeholder="Filtrar por fecha"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_numeroOt' placeholder="Filtrar por ot"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_user_sol' placeholder="Filtrar por Solicitante"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_descripcion' placeholder="Filtrar por Descripcion"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_maquina' placeholder="Filtrar por Maquina"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_ubicacion' placeholder="Filtrar por Ubicacion"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    {{-- visualizacion de la generacion de ot --}}
                    <th class="p-1">
                        <input type="text" wire:model.live='f_user_asi' placeholder="Filtrar por Asignado"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_tipo' placeholder="Filtrar por Tipo OT"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_prioridad' placeholder="Filtrar por Prioridad"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">

                    </th>
                    <th class="p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" wire:click="limpiarFiltros" viewBox="0 0 576 512"
                            class="h-5 w-5 fill-green-600 dark:fill-green-500">
                            <path
                                d="M290.7 57.4L57.4 290.7c-25 25-25 65.5 0 90.5l80 80c12 12 28.3 18.7 45.3 18.7H288h9.4H512c17.7 0 32-14.3 32-32s-14.3-32-32-32H387.9L518.6 285.3c25-25 25-65.5 0-90.5L381.3 57.4c-25-25-65.5-25-90.5 0zM297.4 416H288l-105.4 0-80-80L227.3 211.3 364.7 348.7 297.4 416z" />
                        </svg>
                    </th>
                    {{-- fin de la visualizacion --}}
                </tr>
                @endif

                @foreach ($ordenes as $orden)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $orden->solicitud->fecha_sol }}
                    </th>
                    <td class="px-1 py-1" nowrap>
                        <?php
                                    // Obtén el valor de la ID como string
                                    $idStr = (string) $orden->numero_orden;
                                    // Calcula la longitud original del número
                                    $originalLength = strlen($idStr);
                                    // Define la longitud deseada (incluyendo los ceros adicionales)
                                    $desiredLength = 9; // Ajusta este valor según la cantidad de ceros que desees agregar
                                    // Calcula la cantidad de ceros a agregar
                                    $zerosToAdd = $desiredLength - $originalLength;
                                    // Asegúrate de que la cantidad de ceros a agregar no sea negativa
                                    $zerosToAdd = max(0, $zerosToAdd);
                                    // Genera una cadena con los ceros necesarios
                                    $zerosStr = str_repeat('0', $zerosToAdd);
                                    // Concatena los ceros al principio del número
                                    $formattedId = $zerosStr . $idStr;
                                    // Muestra el ID formateado
                                    echo $formattedId;
                                    ?>
                    </td>
                    <td class="px-1 py-1" nowrap>
                        {{ $orden->solicitud->user->nombre }} {{ $orden->solicitud->user->apellido }}
                    </td>
                    <td class="px-1 py-1 max-w-xs whitespace-normal text-justify">
                        {{ $orden->solicitud->descripcion }}
                    </td>
                    <td class="px-4 py-2">
                        @if ($orden->solicitud->maquina)
                        <b class="text-sky-400"> {{ $orden->solicitud->maquina->codigo }} </b> <br>
                        {{ $orden->solicitud->maquina->nombre }}
                        @endif

                    </td>
                    <td class="px-4 py-2">

                        <b class="text-sky-400">{{ $orden->solicitud->ubicacion->codigo }}</b> <br>

                        {{ $orden->solicitud->ubicacion->nombre }}
                    </td>

                    <td class="px-4 py-2">
                        @if ($orden->solicitud->estado == 'Pendiente')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Asignado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-cyan-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Ejecutando')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif



                        @if ($orden->solicitud->estado == 'Repuesto pendiente')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-gray-600 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Por revisar')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-transparent border-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Revisado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Completado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Rechazado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif

                        @if ($orden->solicitud->estado == 'Cancelado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif
                        @if ($orden->solicitud->estado == 'Detenido')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-yellow-600 rounded-full me-1.5 flex-shrink-0"></span>{{
                            $orden->solicitud->estado }}</span>
                        @endif
                    </td>

                    {{-- Asignado --}}
                    <td class="px-6 py-2">
                        @if ($orden->user)
                        {{ $orden->user->nombre }}
                        @endif

                    </td>

                    {{-- TIPO OT --}}
                    <td class="px-4 py-2">
                        @if ($orden->tipo_ordens)
                        {{ $orden->tipo_ordens->tipo_orden }}
                        @endif
                    </td>

                    {{-- Prioridad --}}
                    <td class="px-4 py-2">
                        @if ($orden->prioridad)
                        {{ $orden->prioridad->prioridad }}
                        @endif
                    </td>

                    {{-- Estado OT --}}
                    <td class="px-4 py-2">
                        @if ($orden->estado_ots)
                        {{ $orden->estado_ots->estado_ot }}
                        @endif
                    </td>

                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center gap-2">

                            <svg onclick="Livewire.dispatch('openModal', { component: 'ordenes-trabajo.generar.editar', arguments: { id: {{ $orden->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>

                            <svg onclick="Livewire.dispatch('openModal', { component: 'ordenes-trabajo.generar.eliminar', arguments: { id: {{ $orden->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                                viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-4 w-4 fill-green-600 dark:fill-green-500" wire:click="imprimir({{ $orden->id }})">
                                <path
                                    d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                            </svg>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>






        </table>

    </div>


    @if (!$aplicandoFiltros)
    <div>
        {{ $ordenes->links('pagination::tailwind') }}
    </div>
    @endif
</div>