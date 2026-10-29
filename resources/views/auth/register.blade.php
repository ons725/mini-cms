
<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="text-3xl font-bold text-indigo-600">
            Mini-CMS
        </a>
        <h1 class="mt-4 text-2xl font-semibold text-gray-900">
            Create your account
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            Register to start managing your articles.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
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
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                Register
            </x-primary-button>
        </div>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already registered?
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                Log in
            </a>
        </p>

        <p class="mt-4 text-center text-sm">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">
                ← Back to home
            </a>
        </p>
    </form>
</x-guest-layout>
