<x-guest-layout>
    <x-auth-card>
        <h1 class="py-4" style="font-size: 1.4rem;">店舗オーナーログイン</h1>
        <x-slot name="logo">
            <h1 class="py-4 text-center" style="font-size: 1.7rem; font-weight: 800;">あわら市初のデリバリーサービス</h1>
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <h1 class="py-4 text-center" style="font-size: 1.3rem; font-weight: 700;">AWARAEATSに加盟して</br>
                あわら市の食を多くの人に！</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('owner.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('owner.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('owner.password.request') }}">
                    {{ __('パスワードをお忘れですか?') }}
                </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('ログイン') }}
                </x-primary-button>
            </div>
        </form>
        @if (Route::has('user.login'))
        <div class="px-2 py-4 sm:block">
            @auth('users')
            <a href="{{ url('/') }}" class="text-sm text-black-700 dark:text-gray-500 underline">ホーム</a>
            @else
            @if (Route::has('user.register'))
            <h1 class="text-sm text-gray-700 ">AWARAEATS の利用者ログインはこちら</h1>
            <a href="{{ route('user.login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">→ ユーザーアカウントでログインする</a>
            @endif
            @endauth
        </div>
        @endif
    </x-auth-card>
</x-guest-layout>
