
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">System Settings</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-body">
              <form action="{{url('/admin/systemsettings/')}}" enctype="multipart/form-data" method="post" id="addBlogForm">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="brand_title">Title of Brand</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="brand_title" name="brand_title" />
                    <div class="mt-2">@error('brand_title')
                    <div class="alert alert-danger">{{"Title is required" }}</div>
                    @enderror</div>
                </div>
                </div>
                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="brand_favicon" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload brand icon</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="brand_favicon" name="brand_favicon" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('brand_favicon')
                            <div class="alert alert-danger">{{"Please upload cover picture" }}</div>
                            @enderror

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                </div>
                <div class="row justify-content-start mt-2">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary save-changes-btn">Add</button>
                    </div>

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
