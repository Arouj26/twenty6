
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Carousels</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit carousels</h5>
            </div>
            <div class="card-body">
              <form action="{{url('/admin/homesettings/edit-carousal/' . $carousals['id']) }})}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="carousal_tag">Carousel Tag</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="carousal_tag" name="carousal_tag" value="{{$carousals['carousal_tag']}}"/>
                      <div class="mt-2">@error('carousal_tag')
                      <div class="alert alert-danger">{{"Namee is required" }}</div>
                      @enderror</div>
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="carousal_text">Carousel Text</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="carousal_text" name="carousal_text" value="{{$carousals['carousal_text']}}"/>
                      <div class="mt-2">@error('carousal_text')
                      <div class="alert alert-danger">{{"Title is required" }}</div>
                      @enderror</div>
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
