@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span>Add products</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add products</h5>
            </div>
            <div class="card-body">
              <form action="{{url('/')}}/admin/add_products" method="post">
                @csrf
                <div class="mb-3">
                    <label for="products-category" class="form-label">Select a category</label>
                    <select class="form-select" id="products-category" name="products-category">
                      <option selected="" value="">Select one</option>
                      <option value="Coats">Coats</option>
                      <option value="Dresses">Dresses</option>
                      <option value="Shirts">Shirts</option>
                      <option value="T-Shirts">T-Shirts</option>
                      <option value="Jeans">Jeans</option>
                    </select>
                  </div>
                  <div class="mt-2">@error('products-category')
                    <div class="alert alert-danger">{{"Category is required" }}</div>
                    @enderror</div>
                  <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="products-pic" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload product picture</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="products-pic" name="products-pic" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('products-pic')
                            <div class="alert alert-danger">{{"Please upload product picture" }}</div>
                            @enderror

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="products-title">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="products-title" name="products-title" />
                    <div class="mt-2">@error('products-title')
                    <div class="alert alert-danger">{{"Title is required" }}</div>
                    @enderror</div>
                </div>
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="products-price">Price in Rs.</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="products-price" name="products-price"/>
                    <div class="mt-2">@error('products-price')
                        <div class="alert alert-danger">{{"Price is required" }}</div>
                        @enderror</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="products-color">Color</label>
                  <div class="col-sm-10">
                      <input type="text" id="products-color" class="form-control" name="products-color"/>
                      <div class="mt-2">@error('products-color')
                        <div class="alert alert-danger">{{"Color is required" }}</div>
                        @enderror</div>
                    </div>
                  </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="products-size">Size</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <select class="form-select" id="products-size" name="products-size">
                          <option selected="" value="">Select one</option>
                          <option value="XS">XS</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                        </select>
                        </div>
                        <div class="mt-2">@error('products-size')
                            <div class="alert alert-danger">{{"Size is required" }}</div>
                            @enderror</div>
                      </div>
                    </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="products-qty">Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" id="products-qty" class="form-control" name="products-qty"/>
                        <div class="mt-2">@error('products-qty')
                          <div class="alert alert-danger">{{"Qty is required" }}</div>
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
