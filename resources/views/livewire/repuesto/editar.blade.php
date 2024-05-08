<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
      <h1 class="text-2xl font-bold">EDITAR</h1>
    </div>
  
    <form wire:submit="update" novalidate class="space-y-6" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-1/2 px-4">
          <div class="mb-4">
            <label for="numero" class="block text-sm font-medium text-gray-700 dark:text-white">Código Antiguo</label>
            <input type="text" id="numero" name="numero" wire:model="numero" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el código antiguo" required>
          </div>
  
          <div class="mb-4">
            <label for="codigo" class="block text-sm font-medium text-gray-700 dark:text-white">Código Nuevo</label>
            <input type="text" id="codigo" name="codigo" wire:model="codigo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el código nuevo" required>
          </div>
  
          <div>
            <label for="file_input" class="block text-sm font-medium text-gray-700 dark:text-white">Subir archivo</label>
            <input type="file" id="foto" name="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 cursor-pointer bg-white focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-describedby="foto">
            <p class="mt-1 text-sm text-gray-500" id="foto">SVG, PNG, JPG o GIF (MAX. 800x400px).</p>
          </div>
        </div>
  
        <div class="w-full lg:w-1/2 px-4">
          <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-white">Nombre</label>
            <input type="text" id="nombre" name="nombre" wire:model="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el nombre" required>
          </div>
  
          <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-white">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" wire:model="descripcion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese la descripción" required>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <div class="mb-4">
            <label for="ubicacion" class="block text-sm font-medium text-gray-700 dark:text-white">Ubicacion</label>
            <input type="text" id="ubicacion" name="ubicacion" wire:model="ubicacionActual" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese la ubicacion" required>
          </div>
  
          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
              <label for="stockMinimo" class="block text-sm font-medium text-gray-700 dark:text-white">Stock Mínimo</label>
              <input type="text" id="stockMinimo" name="stockMinimo" wire:model="stockMinimo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el stock mínimo" required>
            </div>
  
            <div class="w-full md:w-1/2 px-2">
              <label for="precioRelativo" class="block text-sm font-medium text-gray-700 dark:text-white">Precio</label>
              <input type="text" id="precioRelativo" name="precioRelativo" wire:model="precioRelativo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el precio" required>
            </div>
          </div>
        </div>
      </div>
  
      <div class="text-center mt-6">
        <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">Registrar</button>
      </div>
    </form>
  </div>
