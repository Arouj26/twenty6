
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
                      <input class="form-control" type="email" name="email" id="email" value='{{$admin['email']}}' />
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
