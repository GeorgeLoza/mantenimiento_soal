<div>
    <div
        class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Solicitud Repuestos</h5>

        </div>
        <div class="flow-root">

            <div
                class=" max-w-lg  shadow-md sm:rounded-lg   overflow-hidden">
                <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                Repuesto
                            </th>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                #
                            </th>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                Estado
                            </th>

                            <th scope="col" class=" flex gap-2 px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                opciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="">

                        @foreach ($solicitudes as $solicitud)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-popover-target="popover-{{$solicitud->id}}" data-popover-placement="bottom">

                            <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                                {{ $solicitud->repuestos->nombre }}
                            </th>
                            <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                                {{ $solicitud->cantidad }}
                            </th>
                            <th scope="row" class="px-4 py-2 text-xs text-gray-900  dark:text-white ">

                                @if ($solicitud->estado == 'Pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                                    $solicitud->estado }}</span>
                                @endif
                                @if ($solicitud->estado == 'Aprobado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                                    $solicitud->estado }}</span>
                                @endif
                                @if ($solicitud->estado == 'Entregado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                                    $solicitud->estado }}</span>
                                @endif
                                @if ($solicitud->estado == 'Rechazado')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                                    $solicitud->estado }}</span>
                                @endif
                                @if ($solicitud->estado == 'Repuesto pendiente')
                                <span class="flex items-center text-sm font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full me-1.5 flex-shrink-0"></span>{{
                                    $solicitud->estado }}</span>
                                @endif
                            </th>
                            <th class="flex gap-2 items-center px-4 py-2">
                                <svg wire:click="aprobar({{$solicitud->id}})" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" class="h-6 w-6 fill-green-600">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                                <svg wire:click="rechazar({{$solicitud->id}})" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" class="h-6 w-6 fill-red-600">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                                <div wire:click="esperar({{$solicitud->id}})"
                                    class="rounded-full text-center bg-gray-600 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                        class="h-4 w-4 fill-white">
                                        <path
                                            d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V75c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437v11c-17.7 0-32 14.3-32 32s14.3 32 32 32H64 320h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V437c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320 64 32zM96 75V64H288V75c0 19-5.6 37.4-16 53H112c-10.3-15.6-16-34-16-53zm16 309c3.5-5.3 7.6-10.3 12.1-14.9L192 301.3l67.9 67.9c4.6 4.6 8.6 9.6 12.1 14.9H112z" />
                                    </svg>
                                </div>

                            </th>
                        </tr>

                        <div data-popover id="popover-{{$solicitud->id}}" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">OT: {{
                                    $solicitud->orden->numero_orden
                                    }}
                                    {{ $solicitud->orden->solicitud->descripcion }}</h3>
                            </div>
                            <div class="px-3 py-2 text-xs">
                                <div>@if ($solicitud->orden->solicitud->maquina)
                                    <b class="text-sky-400"> {{ $solicitud->orden->solicitud->maquina->codigo }} </b>:
                                    {{ $solicitud->orden->solicitud->maquina->nombre }}
                                    @endif
                                </div>
                                <div> <b class="text-sky-400">
                                        {{$solicitud->orden->solicitud->ubicacion->codigo }}</b>:

                                    {{ $solicitud->orden->solicitud->ubicacion->nombre }}
                                </div>
                                <div>
                                    {{$solicitud->orden->solicitud->user->nombre}}
                                    {{ $solicitud->orden->solicitud->user->apellido}}
                                </div>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>