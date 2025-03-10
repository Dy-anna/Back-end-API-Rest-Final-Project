<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white flex justify-between">
        <a href="{{ route('home') }}" class="text-lg font-bold">Sport Events</a>
        <div>
            @guest
                <a href="{{ route('login') }}" class="px-3">Connexion</a>
                <a href="{{ route('register') }}" class="px-3">Inscription</a>
            @else
                <a href="{{ route('events.index') }}" class="px-3">Événements</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            @endguest
        </div>
    </nav>
    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
</body>
</html>