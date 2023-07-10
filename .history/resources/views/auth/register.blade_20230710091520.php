
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Account Settings</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
              <!-- Account -->
              <div class="card-body">
              <div class="card-body">
                <form id="formAccountSettings" method="POST">
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="admin_name" class="form-label">Name</label>
                      <input
                        class="form-control"
                        type="text"
                        id="admin_name"
                        name="admin_name"
                        {{-- value='{{$admin['name']}}' --}}
                        autofocus
                      />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input class="form-control" type="email" name="email" id="email" />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <input
                        class="form-control"
                        type="text"
                        id="password"
                        name="password"
                      />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="confirm_password' class="form-label">Confirm Password</label>
                        <input
                          class="form-control"
                          type="text"
                          id="confirm_password"
                          name="confirm_password"
                        />
                      </div>

                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                  </div>
                </form>
              </div>
              <!-- /Account -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->

@endsection
{{--
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
