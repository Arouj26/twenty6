
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Services</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add services</h5>
            </div>
            <div class="card-body">
              <form action="{{url('/admin/homesettings/services/')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="service_name">Service Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="service_name" name="service_name" />
                      <div class="mt-2">@error('service_name')
                      <div class="alert alert-danger">{{"Name is required" }}</div>
                      @enderror</div>
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="service_description">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="service_description" name="service_description" />
                      <div class="mt-2">@error('service_description')
                      <div class="alert alert-danger">{{"Description is required" }}</div>
                      @enderror</div>
                  </div>
                </div>
                <div class="mb-3">
                    <label for="service_icon" class="form-label">Select Icon</label>
                    <select class="form-select fa" id="service_icon" name="service_icon">
                      <option selected="" value=""></option>
                      <option value="fa fa-address-book">&#xf2b9;</option>
                      <option value="fa fa-envelope-open">&#xf2b6;</option>
                      <option value="fa fa-usd">&#xf155;</option>
                      <option value="fa fa-credit-card">&#xf09d;</option>
                      <option value="fa fa-hourglass">&#xf254;</option>
                      <option value="fa fa-life-ring">&#xf1cd;</option>
                      <option value="fa fa-headphones">&#xf118;</option>
                      <option value="fa fa-smile-o">&#xf004;</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="service_image" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Or Upload icon</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="service_image" name="service_image" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                        </div>
                      </div>
                </div>
                <div class="row justify-content-end">
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
