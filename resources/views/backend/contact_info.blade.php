@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Edit Contact Information</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-body">
                <form action="{{ url('/admin/contact-info')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="contact_address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contact_address" name="contact_address" value=""/>
                            <div class="mt-2">@error('contact_address')
                            <div class="alert alert-danger">{{"Address is required" }}</div>
                            @enderror
                            </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="contact_number">Contact Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contact_number" name="contact_number"/>
                        <div class="mt-2">
                            @error('contact_number')
                            <div class="alert alert-danger">{{ "Number is required" }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="contact_email">Email</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="contact_email" name="contact_email" value=""/>
                              <div class="mt-2">@error('contact_email')
                              <div class="alert alert-danger">{{"Email is required" }}</div>
                              @enderror
                              </div>
                      </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
              </form>
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
