<div>
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Nueva compra
    </h3>
    <div class="p-2">
        <form wire:submit="save" novalidate>
            @csrf
            <div class="md:flex gap-2">
                <div class="md:w-1/2">
                    <label for="orden_id"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Numero OT</label>
                    <input type="text" id="orden_id" wire:model="orden_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingrese el numero de OT">
                </div>
                <div class="md:w-1/2">
                    <label for="almacen"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Almacen</label>
                    <select id="almacen" wire:model="almacen_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione un almacen</option>
                        @foreach ($almacenes as $almacen)
                            <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                        @endforeach

                    </select>
                </div>
                
            </div>

            <div class="md:flex gap-2 mt-2">
                <div class="w-full">
                    <label for="almacen"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Buscar Repuesto</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <input wire:model.live="repuestos_search" type="search" id="default-search"
                                class="block w-full p-1 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Selecciona un item" required />

                        </div>
                    </div>
                </div>

                
            </div>
            <div class="flex gap-2 mt-2">

                <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-1 sticky top-0 bg-white dark:bg-gray-700">
                                Repuesto
                            </th>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">
                                Cantidad
                            </th>
                            <th scope="col" class="px-4 py-2 sticky top-0 bg-white dark:bg-gray-700">

                            </th>

                        </tr>
                    </thead>
                    <tbody class="">

                        <!-- fila de filtros -->
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th class="p-1">
                                <select id="repuesto" wire:model.live="repuesto_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Seleccione un repuesto</option>
                                    @foreach ($repuestos as $repuesto)
                                        <option value="{{ $repuesto->id }}">{{ $repuesto->nombre }}</option>
                                    @endforeach

                                </select>
                            </th>
                            <th class="p-1">
                                <input type="number" wire:model.live='cantidad' placeholder=""
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </th>
                            
                            <th class="px-4 py-2">
                                <svg wire:click="agregar_item" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 fill-blue-600 dark:fill-blue-500" viewBox="0 0 412 512">
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </th>
                        </tr>

                        @foreach ($posibles as $posible)
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $posible->repuestos->nombre }}
                                </th>
                                <td class="px-4 py-2" nowrap>
                                    {{ $posible->cantidad }}
                                </td>

                                <td class="px-4 py-2">
                                    <div class="flex items-center justify-center gap-2">
                                        <svg wire:click="eliminarRepuesto({{ $posible->id }})"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>

            <div class="mt-3">

            </div>
            <div class="text-center mt-6">
                <button type="submit"
                    class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">Registrar</button>
            </div>


        </form>
    </div>

</div>
