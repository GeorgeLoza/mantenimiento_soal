<div class="md:flex gap-5">

    <div class="md:w-4/6">

           
    <div class="flex justify-end mb-2">
        <!--Boton Crear -->
        <button class="p-2 bg-green-500 rounded-lg" onclick="Livewire.dispatch('openModal', { component: 'ordenes-trabajo.solicitud.crear'})">
            <svg
                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg></button>
    </div>
    

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-1">
                            Descripcion
                        </th>
                        <th scope="col" class="px-3 py-1">
                            Maquina
                        </th>
                        <th scope="col" class="px-3 py-1">
                            Area
                        </th>
                        <th scope="col" class="px-3 py-1">
                            Solicitante
                        </th>
                        <th scope="col" class="px-3 py-1">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-3 py-1 font-medium text-gray-900 dark:text-white w-32">

                                {{ $solicitud->descripcion }}

                            </th>

                            <td class="px-3 py-1">
                                {{ $solicitud->maquina->codigo }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $solicitud->ubicacion->nombre }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $solicitud->user->codigo }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>

</div>
