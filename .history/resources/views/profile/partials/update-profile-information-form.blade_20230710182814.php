<form id="formAccountSettings" method="POST" onsubmit="return false">
    <div class="row">
      <div class="mb-3 col-md-6">
        <label for="firstName" class="form-label">First Name</label>
        <input
          class="form-control"
          type="text"
          id="firstName"
          name="firstName"
          value="John"
          autofocus
        />
      </div>
      <div class="mb-3 col-md-6">
        <label for="lastName" class="form-label">Last Name</label>
        <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
      </div>
      <div class="mb-3 col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input
          class="form-control"
          type="text"
          id="email"
          name="email"
          value="john.doe@example.com"
          placeholder="john.doe@example.com"
        />
      </div>
      <div class="mb-3 col-md-6">
        <label for="organization" class="form-label">Organization</label>
        <input
          type="text"
          class="form-control"
          id="organization"
          name="organization"
          value="ThemeSelection"
        />
      </div>
      <div class="mb-3 col-md-6">
        <label class="form-label" for="phoneNumber">Phone Number</label>
        <div class="input-group input-group-merge">
          <span class="input-group-text">US (+1)</span>
          <input
            type="text"
            id="phoneNumber"
            name="phoneNumber"
            class="form-control"
            placeholder="202 555 0111"
          />
        </div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
      </div>
      <div class="mb-3 col-md-6">
        <label for="state" class="form-label">State</label>
        <input class="form-control" type="text" id="state" name="state" placeholder="California" />
      </div>
      <div class="mb-3 col-md-6">
        <label for="zipCode" class="form-label">Zip Code</label>
        <input
          type="text"
          class="form-control"
          id="zipCode"
          name="zipCode"
          placeholder="231465"
          maxlength="6"
        />
      </div>
      <div class="mb-3 col-md-6">
        <label class="form-label" for="country">Country</label>
        <select id="country" class="select2 form-select">
          <option value="">Select</option>
          <option value="Australia">Australia</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Belarus">Belarus</option>
          <option value="Brazil">Brazil</option>
          <option value="Canada">Canada</option>
          <option value="China">China</option>
          <option value="France">France</option>
          <option value="Germany">Germany</option>
          <option value="India">India</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Israel">Israel</option>
          <option value="Italy">Italy</option>
          <option value="Japan">Japan</option>
          <option value="Korea">Korea, Republic of</option>
          <option value="Mexico">Mexico</option>
          <option value="Philippines">Philippines</option>
          <option value="Russia">Russian Federation</option>
          <option value="South Africa">South Africa</option>
          <option value="Thailand">Thailand</option>
          <option value="Turkey">Turkey</option>
          <option value="Ukraine">Ukraine</option>
          <option value="United Arab Emirates">United Arab Emirates</option>
          <option value="United Kingdom">United Kingdom</option>
          <option value="United States">United States</option>
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="language" class="form-label">Language</label>
        <select id="language" class="select2 form-select">
          <option value="">Select Language</option>
          <option value="en">English</option>
          <option value="fr">French</option>
          <option value="de">German</option>
          <option value="pt">Portuguese</option>
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="timeZones" class="form-label">Timezone</label>
        <select id="timeZones" class="select2 form-select">
          <option value="">Select Timezone</option>
          <option value="-12">(GMT-12:00) International Date Line West</option>
          <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
          <option value="-10">(GMT-10:00) Hawaii</option>
          <option value="-9">(GMT-09:00) Alaska</option>
          <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
          <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
          <option value="-7">(GMT-07:00) Arizona</option>
          <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
          <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
          <option value="-6">(GMT-06:00) Central America</option>
          <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
          <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
          <option value="-6">(GMT-06:00) Saskatchewan</option>
          <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
          <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
          <option value="-5">(GMT-05:00) Indiana (East)</option>
          <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
          <option value="-4">(GMT-04:00) Caracas, La Paz</option>
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="currency" class="form-label">Currency</label>
        <select id="currency" class="select2 form-select">
          <option value="">Select Currency</option>
          <option value="usd">USD</option>
          <option value="euro">Euro</option>
          <option value="pound">Pound</option>
          <option value="bitcoin">Bitcoin</option>
        </select>
      </div>
    </div>
    <div class="mt-2">
      <button type="submit" class="btn btn-primary me-2">Save changes</button>
      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
    </div>
  </form>

{{--
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
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
</section> --}}
