
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Categories</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit categories</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/homesettings/edit-category/' . $categories['id']) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="category_name">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="category_name" name="category_name" value="{{$categories['category_name']}}"/>
                      <div class="mt-2">@error('category_name')
                      <div class="alert alert-danger">{{"Title is required" }}</div>
                      @enderror</div>
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="category_display_title">Category Display Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="category_display_title" name="category_display_title" value="{{$categories['category_display_name']}}"/>
                      <div class="mt-2">@error('category_display_title')
                      <div class="alert alert-danger">{{"Title is required" }}</div>
                      @enderror</div>
                  </div>
                </div>
                <div class="mb-3">
                    <label for="is_first" class="form-label">Is it the First/Main Category</label>
                    <select class="form-select" id="is_first" name="is_first">
                      <option selected="" value="{{$categories['is_first']}}">Select one</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="category_image" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload category picture</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="category_image" name="category_image" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('category_image')
                            <div class="alert alert-danger">{{"Please upload product picture" }}</div>
                            @enderror

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
