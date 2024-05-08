<div class="bg-gray-50 dark:bg-gray-800 sm:rounded-lg  w-full h-full">

    <div class="flex justify-between px-2 py-2">

        <h1>Estado de OT</h1>

        <div class="justify-end">
            <button data-modal-target="reg-EstadoOrden" data-modal-toggle="reg-EstadoOrden" type="button"
                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                <span class="sr-only">Agregar</span>
            </button>
        </div>

    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-44 overflow-y-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-2">
                        Codigo
                    </th>
                    <th scope="col" class="px-6 py-2 bg-gray-100 dark:bg-gray-700">
                        Estado
                    </th>

                </tr>
            </thead>
            <tbody>
                   @foreach ($estado_ots as $estado_ot )
                   <tr class="border-b border-gray-200 dark:border-gray-700">

                    <td class="px-6 py-2">
                       {{$estado_ot->codigo}}
                    </td>
                    <td class="px-6 py-2 bg-gray-100 dark:bg-gray-700">
                        {{$estado_ot->estado_ot}}
                    </td>
                </tr>
                   @endforeach
            </tbody>
        </table>

        <!-- Main modal -->
        <div wire:ignore.self id="reg-EstadoOrden" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Estado de ordenes
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="reg-EstadoOrden">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" wire:submit.prevent="save" novalidate>
                            <div>
                                <label for="codigo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo</label>
                                <input type="codigo" wire:model='codigo' name="codigo" id="codigo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Ingrese el codigo asignado" required>
                            </div>
                            <div>
                                <label for="estado"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                <input type="estado_ot" name="estado_ot" id="estado_ot" wire:model='estado_ot' 
                                    placeholder="Estado de Orden"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="descripcion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                                <input type="descripcion" name="descripcion" id="descripcion" wire:model='descripcion'
                                    placeholder="Descripcion del estado"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>