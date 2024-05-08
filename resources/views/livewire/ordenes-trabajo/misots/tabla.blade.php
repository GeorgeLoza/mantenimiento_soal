<div>
    <div class="md:grid md:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach ($ots as $ot)
        <div
            class="w- p-2  border border-gray-200 @if($ot->solicitud->estado == 'Ejecutando') bg-green-200 dark:bg-green-900 @endif rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">

                <div class="flex items-center space-x-3 rtl:space-x-reverse ">

                    <div class="flex-1 w-38 h-14 mb-2">

                        <div class="flex justify-between py-1">
                            <p class="text-lg font-semibold text-gray-900 truncate dark:text-white">Orden:
                                <?php
                                    // Obtén el valor de la ID como string
                                    $idStr = (string) $ot->numero_orden;
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

                            </p>

                            <div class="flex gap-1">
                                @if ($ot->prioridad->prioridad == 'Emergencia')
                                <span
                                    class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                    {{ $ot->prioridad->prioridad }}
                                </span>
                                @endif

                                @if ($ot->prioridad->prioridad == 'Urgente')
                                <span
                                    class="inline-flex items-center bg-amber-100 text-amber-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-amber-900 dark:text-amber-300">
                                    <span class="w-2 h-2 me-1 bg-amber-500 rounded-full"></span>
                                    {{ $ot->prioridad->prioridad }}
                                </span>
                                @endif

                                @if ($ot->prioridad->prioridad == 'Normal')
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    {{ $ot->prioridad->prioridad }}
                                </span>
                                @endif


                                @if ($ot->notasTec)
                                <p class="flex items-center text-sm text-gray-500 dark:text-gray-400"> <button
                                        data-popover-target="popover-description" data-popover-placement="bottom-end"
                                        type="button">
                                        <svg class="w-6 h-6 ms-2 text-yellow-400 hover:text-yellow-500"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd"></path>
                                        </svg><span class="sr-only">Show information</span></button></p>

                                <div data-popover id="popover-description" role="tooltip"
                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Nota para el tecnico
                                        </h3>
                                        <p>{{ $ot->notasTec }}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                                @endif


                            </div>
                        </div>


                        <p class="text-xs text-gray-500 truncate dark:text-gray-400 max-w-xs whitespace-normal">
                            {{ $ot->solicitud->ubicacion->nombre }} <br>
                            @if ($ot->solicitud->maquina)
                            <b class="">{{ $ot->solicitud->maquina->nombre }}</b>
                            @endif

                        </p>


                    </div>

                    </td>
                </div>

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                </h5>
            </a>

            <div class="w-64 h-24">
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $ot->solicitud->descripcion }}</p>
            </div>
            <div class="flex justify-between">
                <div>
                    <a onclick="Livewire.dispatch('openModal', { component: 'ordenes-trabajo.misots.editar', arguments: { id: {{ $ot->id }} } })"
                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        LLENAR OT
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2 xmlns=" http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="white"
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg>
                    </a>

                </div>

                <div class="">

                    @if($ot->solicitud->estado == 'Detenido' || $ot->solicitud->estado == 'Asignado')
                    <a wire:click="ejecutando('{{$ot->id}}')"
                        class="text-green-700 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center dark:border-gren-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800 dark:hover:bg-green-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 384 512">
                            <path
                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" />
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </a>
                    @endif
                    @if($ot->solicitud->estado == 'Ejecutando' || $ot->solicitud->estado == 'Asignado')
                    <a wire:click="pause('{{$ot->id}}')"
                        class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 384 512">
                            <path
                                d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>