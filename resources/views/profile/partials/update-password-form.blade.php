<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: #ff4433;">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600" style="color: #ff4433;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" style="color: #ff4433;"/>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" style="border: 2px solid #ff4433;" onfocus="this.style.border='2px solid #ff0000'; this.style.boxShadow='0 0 8px #ff4433';" onblur="this.style.border='2px solid #ff4433'; this.style.boxShadow='none';"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" style="color: #ff4433;"/>
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" style="border: 2px solid #ff4433;" onfocus="this.style.border='2px solid #ff0000'; this.style.boxShadow='0 0 8px #ff4433';" onblur="this.style.border='2px solid #ff4433'; this.style.boxShadow='none';"/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" style="color: #ff4433"/>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" style="border: 2px solid #ff4433;" onfocus="this.style.border='2px solid #ff0000'; this.style.boxShadow='0 0 8px #ff4433';" onblur="this.style.border='2px solid #ff4433'; this.style.boxShadow='none';"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
