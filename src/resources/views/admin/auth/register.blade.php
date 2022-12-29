<x-guest-layout>
    <x-auth-card>
        <h1 class="py-4" style="font-size: 1.4rem;">AWARAEATS運営管理者ログイン</h1>
        <x-slot name="logo">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </x-slot>
        @if (Route::has('admin.login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth('admin')
            <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ホーム</a>
            @else
            <a href="{{ route('admin.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>
            @endauth
        </div>
        @endif

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('ユーザーネーム')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('パスワード確認')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.login') }}">
                    {{ __('すでにアカウントをお持ちですか?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('新規登録する') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>