<div>
    <div>
        <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Crear Nueva Solicitud</h2>
        <div>
            <form wire:submit="save" novalidate>
                @csrf
                <div class="grid items-center divide-y divide-blue-200 gap-1 ">

                    <div class="flex gap-2 mb-1">
                       
                        <div class="w-1/2">
                            <label for="countries"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                            <select id="countries" wire:model.live="ubicacion_id"
                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccione una ubicacion</option>

                                @foreach ($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->codigo }} - {{ $ubicacion->nombre }}</option>
                            @endforeach

                            </select>

                        </div>
                       
                       
                       
                        <div class="w-1/2">
                            <label for="maquina"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Máquina</label>

                            <select id="maquina" wire:model.live="maquina_id"
                                class="js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg exefocus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option></option>

                                @foreach ($maquinas as $maquina)
                                <option value="{{ $maquina->id }}"> {{ $maquina->codigo }} - {{ $maquina->nombre }}</option>
                            @endforeach

                            </select>

                            {{-- <h1>{{ $maquina->nombre }}</h1> --}}
                        </div>


                      

                    </div>


                    <div>
                        <label for="descripcion" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                            Descripcion
                            del problema </label>
                        <textarea type="text" id="descripcion" wire:model="descripcion" name="descripcion" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2"
                            placeholder="Escrible tu problema" style="resize: none;"></textarea>
                    </div>

                </div>

                <div class="flex">
                    <div class="w-full px-3 mb-5">
                        <button type="submit"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
