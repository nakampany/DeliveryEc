<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('ユーザーネーム・メール情報編集') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("アカウントのプロフィール情報、メールアドレスを更新できます。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('user.verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('user.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('ユーザーネーム')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('あなたのメールアドレスは未確認です。') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('認証メールを再送信する場合はこちらをクリックしてください。') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('新しい認証リンクがあなたのEメールアドレスに送信されました。') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div>
            <x-input-label for="zip_code" :value="__('郵便番号')" />
            <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code', $user->zip_code)" required autofocus autocomplete="zip_code" />
            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('住所')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="address_detail" :value="__('配達住所詳細')" />
            <x-text-input id="address_detail" name="address_detail" type="text" class="mt-1 block w-full" :value="old('address_detail', $user->address_detail)" required autofocus autocomplete="address_detail" />
            <x-input-error class="mt-2" :messages="$errors->get('address_detail')" />
        </div>

        <div>
            <x-input-label for="tel" :value="__('電話番号')" />
            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $user->tel)" required autofocus autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('保存する') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('保存が完了しました') }}</p>
            @endif
        </div>
    </form>
</section>