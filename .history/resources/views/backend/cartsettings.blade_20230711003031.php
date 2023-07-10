
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Cart Settings</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">

            </div>
            <div class="card-body">
              <form action="{{url('/admin/cartsettings')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="shipping">Add shipping price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="shipping" name="shipping" />
                    <div class="mt-2">@error('shipping')
                    <div class="alert alert-danger">{{"Shipping cost is required" }}</div>
                    @enderror</div>
                </div>
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nosizes">Number of sizes</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="nosizes" name="nosizes"/>
                    <div class="mt-2">@error('nosizes')
                        <div class="alert alert-danger">{{"Sizes is required" }}</div>
                        @enderror</div>
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
