
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Footer</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add section</h5>
            </div>
            <div class="card-body">
              <form action="{{url('/admin/homesettings/edit-footer/' . $footer['id'])}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="input-group col-sm-10">
                        <label class="col-sm-2 col-form-label" for="footer_insta">Instagram handle</label>
                        <span class="input-group-text" id="basic-addon11">@</span>
                        <input type="text" class="form-control" id="footer_insta" name="footer_insta">
                      </div>
                      <div class="mt-2">@error('footer_insta')
                      <div class="alert alert-danger">{{"Handle is required" }}</div>
                      @enderror</div>
                  </div>
                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="footer_image" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload footer picture</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="footer_image" name="footer_image" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('footer_image')
                            <div class="alert alert-danger">{{"Please upload footer image" }}</div>
                            @enderror
                        </div>
                      </div>
                </div>
                <div class="row justify-content-start">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add</button>
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
