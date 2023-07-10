
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
