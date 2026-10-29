
<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="text-3xl font-bold text-indigo-600">
            Mini-CMS
        </a>
        <h1 class="mt-4 text-2xl font-semibold text-gray-900">
            Welcome back
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            Sign in to manage your articles.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                Log in
            </x-primary-button>
        </div>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                Register
            </a>
        </p>

        <p class="mt-4 text-center text-sm">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">
                ← Back to home
            </a>
        </p>
    </form>
</x-guest-layout>
