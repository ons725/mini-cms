
<header class="bg-white border-b border-gray-200">
    <nav class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center gap-2" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="font-bold text-lg text-indigo-600 mr-4">Mini-CMS</a>

        <x-nav-link to="home">Accueil</x-nav-link>
        <x-nav-link to="posts.index" match="posts.*">Articles</x-nav-link>
@auth
    <x-nav-link to="posts.create">Créer un article</x-nav-link>
@endauth

        <x-nav-link to="time">Heure</x-nav-link>
        <x-nav-link to="about">À propos</x-nav-link>

        
@guest
    <a href="{{ route('login') }}">Connexion</a>
    <a href="{{ route('register') }}">Inscription</a>
@endguest

@auth
    <a href="{{ route('dashboard') }}">Dashboard</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
@endauth

    </nav>
</header>
