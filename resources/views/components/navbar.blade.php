
<header class="bg-white border-b border-gray-200">
    <nav class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center gap-2" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="font-bold text-lg text-indigo-600 mr-4">Mini-CMS</a>

        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Accueil</x-nav-link>
        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')">Articles</x-nav-link>
        @auth
            @if (Auth::user()->isAdmin())
                <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">Créer un article</x-nav-link>
            @endif
        @endauth

        <x-nav-link :href="route('time')" :active="request()->routeIs('time')">Heure</x-nav-link>
        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">À propos</x-nav-link>

        <span class="flex-1"></span>

        @guest
            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Connexion</a>
            <a href="{{ route('register') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Inscription</a>
        @endguest

        @auth
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm font-medium text-gray-600 hover:text-gray-900">Déconnexion</button>
            </form>
        @endauth
    </nav>
</header>
