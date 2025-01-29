<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Agregar Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-50">

    <!-- Barra de navegación o encabezado -->
    <header>
        <nav class="bg-indigo-600 p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="text-white text-xl font-semibold">
                    <a href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-300">Dashboard</a>
                        <a href="{{ route('logout') }}" class="text-white hover:text-gray-300"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Regístrate</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal -->
    <main>
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
