<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-indigo-600 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <span class="text-white font-bold text-xl">Biblioteca</span>
                    <div class="hidden md:flex ml-10 space-x-4">
                        <a href="{{ route('libros.index') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Libros</a>
                        <a href="#" class="text-indigo-200 hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Prestamos</a>
                        <a href="#" class="text-indigo-200 hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Autores</a>
                        <a href="#" class="text-indigo-200 hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Reseñas</a>
                    </div>
                </div>
                <div>
                    <span class="text-indigo-200 text-sm">Panel de control</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @yield('content')
    </main>

</body>
</html>