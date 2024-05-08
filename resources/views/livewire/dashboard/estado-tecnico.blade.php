<div>
        <div
            class="w-full  p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Tecnicos</h5>

            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700 grid  grid-cols-1 sm:grid-cols-2">
                    @foreach($tecnicosUusarios as $tecnico)
                    @php
                    $resaltado = false;
                    foreach ($tecnico->orden as $orden) {
                    if ($orden->solicitud && $orden->solicitud->estado == 'Ejecutando') {
                    $resaltado = true;
                    break;
                    }
                    }
                    @endphp
                    <li class="py-3 sm:py-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-sm"
                        data-popover-target="popover-{{$tecnico->id}}" data-popover-placement="right">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-xs font-medium text-gray-900 truncate dark:text-white">
                                    {{ Str::limit($tecnico->nombre . ' ' . $tecnico->apellido, 11) }}

                                </p>
                                
                            </div>

                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                @if(count($tecnico->orden)>0)
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                    No disponible
                                </span>
                                @else
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    Disponible
                                </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <!--popover de detalle-->
                    @if(count($tecnico->orden)>0)
                    <div data-popover id="popover-{{$tecnico->id}}" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-1 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">OT:  {{$tecnico->orden[0]->numero_orden}}
                            </h3>
                        </div>
                        <div class="px-3 py-2 text-sm">
                            <p class="font-semibold">{{$tecnico->orden[0]->solicitud->descripcion}}</p>
                            <p class="text-xs text-blue-500 font-bold">
                                {{$tecnico->orden[0]->solicitud->maquina->codigo}} -
                                {{$tecnico->orden[0]->solicitud->maquina->nombre}}</p>
                            <p class="text-xs text-blue-500 font-bold">
                                {{$tecnico->orden[0]->solicitud->ubicacion->codigo}}
                                - {{$tecnico->orden[0]->solicitud->ubicacion->nombre}}</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
</div>