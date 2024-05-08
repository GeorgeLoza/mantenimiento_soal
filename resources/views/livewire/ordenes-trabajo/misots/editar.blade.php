<div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div>
            <h2 class="text-xl md:text-2xl lg:text-3xl mb-4 text-gray-800 dark:text-gray-200 font-bold">LLENAR OT</h2>
            
        </div>

        <p class="text-xl md:text-2xl lg:text-3xl">
            <span class="font-bold">Solicitud #</span>
            <?php
            // Obtén el valor de la ID como string
            $idStr = (string) $solicitud->orden->numero_orden;
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
    </div>
    <hr class="my-4 dark:border-gray-600" />
    <form wire:submit="update" novalidate>
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="diagnostico" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Diagnostico
                </label>
                <textarea id="diagnostico" wire:model="diagnostico" name="diagnostico" rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escrible tu diagnostico" style="resize: none;"></textarea>
            </div>
            <div>
                <label for="accionTomada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Accion tomada
                </label>
                <textarea id="accionTomada" wire:model="accionTomada" name="accionTomada" rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escrible la accion tomada" style="resize: none;"></textarea>
            </div>
        </div>
        <hr class="my-4 dark:border-gray-600" />
        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-4">
            <div class="w-full md:w-1/3">
                <label for="tiempo_inicio" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                    Hora de inicio
                </label>
                <input type="datetime-local" id="tiempo_inicio" wire:model="tiempo_inicio"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label for="tiempo_fin" class="block mt-1 mb-1 text-sm font-medium text-gray-900 dark:text-white">
                    Hora de termino
                </label>
                <input type="datetime-local" id="tiempo_fin" wire:model="tiempo_fin"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <button type="button" wire:click="addhour"
                    class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>

                </button>


            </div>
            <div class="w-full md:w-2/3">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">

                            <tr>
                                <th scope="col" class="px-1 py-2 bg-gray-50 dark:bg-gray-800">
                                    #
                                </th>
                                <th scope="col" class="px-1 py-2">
                                    Inicio
                                </th>
                                <th scope="col" class="px-1 py-2 bg-gray-50 dark:bg-gray-800">
                                    Final
                                </th>
                                <th scope="col" class="px-1 py-2">
                                    Total
                                </th>
                                <th scope="col" class="px-1 py-2">
                                    Del
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiempos as $tiempo)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-1 py-2 text-xs">
                                        {{ $tiempo->tiempo_inicio }}
                                    </td>
                                    <td class="px-1 py-2 text-xs">
                                        {{ $tiempo->tiempo_fin }}
                                    </td>
                                    <td class="px-1 py-2 text-xs">
                                        {{-- mostrar sumatoria --}}
                                        @php
                                            $inicio = Carbon\Carbon::parse($tiempo->tiempo_inicio);
                                            $fin = Carbon\Carbon::parse($tiempo->tiempo_fin);
                                            $diferencia = $inicio->diff($fin); // Obtiene un objeto DateInterval

                                            // Calcula la duración total en horas y minutos
                                            $horas = $diferencia->h;
                                            $minutos = $diferencia->i;
                                            $totalHoras = $horas + $minutos / 60;
                                        @endphp
                                        {{ sprintf('%.2f', $totalHoras) }} horas

                                    </td>
                                    <td class="px-1 py-2 text-xs">
                                        <svg wire:click="deleteHour({{ $tiempo->id }})"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="my-4 dark:border-gray-600" />
        <!-- Otros elementos como botones o entradas de formulario -->
        <h3>REPUESTOS</h3>
        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-4">
            <div class="w-full md:w-1/3">
                <div class="mt-3">
                    <input wire:model.live="repuestos_search" type="search" id="default-search"
                        class="block w-full p-1 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Selecciona un item" required />

                </div>
                <label for="repuestos_id" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                    Repuesto
                </label>
                <select id="repuesto" wire:model.live="repuesto_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione un repuesto</option>
                    @foreach ($repuestos as $repuesto)
                        <option value="{{ $repuesto->id }}">{{ $repuesto->nombre }}</option>
                    @endforeach

                </select>
                <label for="cantidad" class="block mt-1 mb-1 text-sm font-medium text-gray-900 dark:text-white">
                    Cantidad
                </label>
                <input type="number" wire:model.live='cantidad' placeholder=""
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <button type="button" wire:click="addrepuesto"
                    class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>

                </button>


            </div>
            <div class="w-full md:w-2/3 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-1 py-2 bg-gray-50 dark:bg-gray-800">
                                Repuesto
                            </th>
                            <th scope="col" class="px-1 py-2">
                                Cantidad
                            </th>
                            <th scope="col" class="px-1 py-2 bg-gray-50 dark:bg-gray-800">
                                Estado
                            </th>
                            <th scope="col" class="px-1 py-2">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repuestosSolicitud as $repuesto)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $repuesto->repuestos->nombre }}
                                </th>
                                <td class="px-1 py-2 text-xs">
                                    {{ $repuesto->cantidad }}
                                </td>

                                <td scope="row" class="px-1 py-2 text-xs" nowrap>

                                    @if ($repuesto->estado == 'Pendiente')
                                        <span class="flex items-center text-sm font-medium me-3"><span
                                                class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $repuesto->estado }}</span>
                                    @endif
                                    @if ($repuesto->estado == 'Aprobado')
                                        <span class="flex items-center text-sm font-medium me-3"><span
                                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $repuesto->estado }}</span>
                                    @endif
                                    @if ($repuesto->estado == 'Rechazado')
                                        <span class="flex items-center text-sm font-medium me-3"><span
                                                class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $repuesto->estado }}</span>
                                    @endif
                                    @if ($repuesto->estado == 'Repuesto pendiente')
                                        <span class="flex items-center text-sm font-medium me-3"><span
                                                class="flex w-2.5 h-2.5 bg-gray-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $repuesto->estado }}</span>
                                    @endif
                                    </th>


                                <td class="px-1 py-2 text-xs">
                                    <svg wire:click="deleteRepuesto({{ $repuesto->id }})"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-center items-center mt-4">
            <button type="submit"
                class="w-full md:w-auto px-6 py-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-base lg:text-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-colors duration-200">Registrar</button>
        </div>
    </form>
</div>
