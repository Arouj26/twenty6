<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>
<form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')
    <div class="row">
      <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Current Password</label>
        <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
      </div>
      <div class="mb-3 col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('password')" />
      </div>

    </div>
    <div class="mt-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
      @if (session('status') === 'profile-updated')
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




{{--
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
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
</section> --}}
