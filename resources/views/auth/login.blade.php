<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mantenimiento - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-94961e60.css') }}">
    <script src="{{ asset('build/assets/app-c0a83405.js') }}" defer></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/flowbite.js')}}"></script>
    

    @vite('resources/css/app.css')

</head>

<body>


    <main>

        <body class="bg-gray-200 bg-gradient-to-r from-blue-950 to-gray-950 text-gray-800 dark:text-white mt-20">

            <h1
                class="text-center mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-200 md:text-5xl lg:text-5xl dark:text-white">
                Login <span class="text-blue-600 dark:text-blue-500">Usuarios</span></h1>


            <div class="md:flex md:justify-center md:gap-10 md:items-center">
                <div class="md:w-1/5">
                    <img src="{{ asset('img/logo-mantenimiento.png') }}" alt="Imagen registro de usuarios">
                </div>

                <div class="md:w-4/12 p-6 rounded-lg shadow-xl">
                    <form action="{{ route('login') }}" method="POST" novalidate>
                        @csrf

                        @if (session('mensaje'))
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ session('mensaje') }}</p>
                        @endif


                        <div class="relative z-0 w-full mb-6 group hidden">
                            <input type="text" name="rol" id="rol"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="Solicitante" />
                            <label for="rol"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rol</label>
                        </div>


                        <div class="relative z-0 w-full mb-6 group">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="codigo"
                                    class="peer-focus:font-medium absolute text-sm text-gray-100 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Codigo</label>

                                @error('codigo')
                                    <p class="text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="password" name="password" id="password"
                                class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="password"
                                class="peer-focus:font-medium absolute text-sm text-gray-100 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contrasena</label>

                            @error('password')
                                <p class="text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ingresar</button>
                    </form>

                </div>
            </div>
    </main>
</body>

</html>
