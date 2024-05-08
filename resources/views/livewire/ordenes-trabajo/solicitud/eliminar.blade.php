<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Eliminar</h2>

    <p class="mb-5 text-xl">Esta seguro que desea eliminar la solicitud?</p>

    <div class="flex gap-5">
        <button class="bg-blue-600 py-2 px-4 text-center rounded-md " wire:click="cerrar">Cancelar</button>
        
        <button  class="bg-red-600 py-2 px-4 text-center rounded-md " wire:click="delete">Confirmar</button>
    </div>
</div>
