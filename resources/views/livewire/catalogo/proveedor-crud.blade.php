<div class="bg-gray-50 dark:bg-gray-800 sm:rounded-lg w-full h-full">
    <div class="flex justify-between px-2 py-2">

        <h1>Proveedores</h1>

        <div class="justify-end">
            <button data-modal-target="reg-proveedores" data-modal-toggle="reg-proveedores" type="button"
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
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 sticky top-0 z-10">
                <tr>

                    <th scope="col" class="px-6 py-2 bg-gray-100  dark:bg-gray-800">
                        Nombre
                    </th>

                    <th scope="col" class="px-6 py-2 bg-gray-100 dark:bg-gray-700">
                        Direccion
                    </th>

                </tr>
            </thead>
            <tbody>

                @foreach ($proveedors as $proveedor)
                    <tr class="border-b border-gray-200 dark:border-gray-700">

                        <td class="px-6 py-2">
                            {{ $proveedor->nombre }}
                        </td>
                        <td class="px-6 py-2 bg-gray-100 dark:bg-gray-700">
                            {{ $proveedor->direccion }}
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Main modal -->
    <div wire:ignore.self id="reg-proveedores" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Registro de Proveedores
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="reg-proveedores">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">

                    <form class="space-y-4" wire:submit.prevent="save" novalidate>
                        <div>
                            <label for="codigo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>

                            <input type="nombre" wire:model='nombre' name="nombre" id="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Ingrese el codigo asignado" required>

                            @error('nombre')
                                <p class="text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div>
                            <label for="direccion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                            <input type="direccion" name="direccion" id="direccion" wire:model='direccion'
                                placeholder="Nombre del lugar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>

                            @error('direccion')
                                <p class="text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="telefono"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contacto</label>

                            <input type="phone" wire:model='telefono' name="telefono" id="telefono"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Ingrese el codigo asignado" required>

                            @error('telefono')
                                <p class="text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div>
                            <label for="encargado"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Contacto</label>

                            <input type="text" wire:model='encargado' name="encargado" id="encargado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Ingrese el codigo asignado" required>

                            @error('encargado')
                                <p class="text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        


                        @if ($mensajeExito)
                            <div id="toast-success"
                                class=" fixed top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>


                                <div class="ms-3 text-sm font-normal"> {{ $mensajeExito }} </div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                    data-dismiss-target="#toast-success" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if ($mensajeError)
                            <div class="alert alert-danger">
                                {{ $mensajeError }}
                            </div>
                        @endif

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>