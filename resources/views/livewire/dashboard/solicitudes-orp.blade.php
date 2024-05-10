<div>
    <div wire:poll.300s class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Solicitud OT's</h5>

        </div>
        <div class="flow-root">
            <div class=" max-w-lg  shadow-md sm:rounded-lg   overflow-hidden">
                <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                Solicitante
                            </th>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                Descripcion
                            </th>


                            <th scope="col" class=" flex gap-2 px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                
                            </th>

                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($ordenes as $orden)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            data-popover-target="popover-{{$orden->id}}" data-popover-placement="bottom">

                            <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                                {{ $orden->solicitud->user->nombre}} {{ $orden->solicitud->user->apellido}}
                            </th>
                            <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white ">
                                {{ $orden->solicitud->descripcion}}
                            </th>
                            <td>
                                <svg onclick="Livewire.dispatch('openModal', { component: 'ordenes-trabajo.generar.editar', arguments: { id: {{ $orden->id }} } })"
                                    xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>

                            </td>
                        </tr>

                        <div data-popover id="popover-{{$orden->id}}" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Detalle:</h3>
                            </div>
                            <div class="px-3 py-2 text-xs">
                                <div>@if ($orden->solicitud->maquina)
                                    <b class="text-sky-400"> {{ $orden->solicitud->maquina->codigo }} </b>:
                                    {{ $orden->solicitud->maquina->nombre }}
                                    @endif
                                </div>
                                <div> <b class="text-sky-400">
                                        {{$orden->solicitud->ubicacion->codigo }}</b>:

                                    {{ $orden->solicitud->ubicacion->nombre }}
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