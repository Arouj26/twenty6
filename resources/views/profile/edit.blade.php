@extends('backend.layout.main')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Profile Settings</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Update Profile</h5>
          <!-- Account -->
          <div class="card-body">
            @include('profile.partials.update-profile-information-form')

          </div>
          <div class="card-body">@include('profile.partials.update-password-form')</div>
          <!-- /Account -->
        </div>

      </div>
    </div>
  </div>
  <!-- / Content -->

@endsection




{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
