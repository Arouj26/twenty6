
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Edit product</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-body">
              <form action="{{url('/admin/edit_product/'.$products['id'])}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="mb-3">
                    <label for="product_category" class="form-label">Select a category</label>
                    <select class="form-select" id="product_category" name="product_category">
                      <option selected="" value="{{strtolower($category->category_name)}}">{{ $products['product_category'] }}</option>
                      {{-- @foreach ($category as $category) --}}
                      <option value="{{strtolower($category->category_name)}}">{{$category['category_name']}}</option>
                      {{-- @endforeach --}}
                    </select>
                </div>
                  <div class="mt-2">@error('product_category')
                    <div class="alert alert-danger">{{"Category is required" }}</div>
                    @enderror</div>
                <div class="mb-3">
                        <label for="product_feature" class="form-label">Feature on Home page</label>
                        <select class="form-select" id="product_feature" name="product_feature">
                          <option selected="" value="no">{{ $products['product_feature'] }}</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                </div>
                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="product_image" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload product picture</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="product_image" name="product_image" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('product_image')
                            <div class="alert alert-danger">{{"Please upload product picture" }}</div>
                            @enderror

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_title">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_title" name="product_title" value="{{ $products['product_title'] }}"/>
                    <div class="mt-2">@error('product_title')
                    <div class="alert alert-danger">{{"Title is required" }}</div>
                    @enderror</div>
                </div>
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_price">Price in Rs.</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $products['product_price'] }}"/>
                    <div class="mt-2">@error('product_price')
                        <div class="alert alert-danger">{{"Price is required" }}</div>
                        @enderror</div>
                  </div>
                </div>
                @php
                // dd($variants_no);
                    $var = $products['total_colors'] * $products['total_sizes'];
                @endphp
                    @for ($i = 0; $i < $var; $i++)
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_color">Color</label>
                        <div class="col-sm-2">
                            <input type="text" id="product_color" class="form-control" name="product_color[]" value="{{ $variants[$i]['product_color'] ?? '' }}" />
                            <div class="mt-2">@error('product_color')
                                <div class="alert alert-danger">{{ "Color is required" }}</div>
                            @enderror</div>
                        </div>
                        <label class="col-sm-2 col-form-label" for="product_size">Size</label>
                        <div class="col-sm-2">
                            <input type="text" id="product_size" class="form-control" name="product_size[]" value="{{ $variants[$i]['product_size'] ?? '' }}" />
                            <div class="mt-2">@error('product_size')
                                <div class="alert alert-danger">{{ "Size is required" }}</div>
                            @enderror</div>
                        </div>
                        <label class="col-sm-2 col-form-label" for="product_quantity[]">Quantity</label>
                        <div class="col-sm-2">
                            <input type="number" id="product_quantity" class="form-control" name="product_quantity[]" value="{{ $variants[$i]['product_quantity'] ?? '' }}" />
                            <div class="mt-2">@error('product_quantity')
                                <div class="alert alert-danger">{{ "Qty is required" }}</div>
                            @enderror</div>
                        </div>
                    </div>
                @endfor


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_code">Item Code</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="product_code" name="product_code" placeholder="T6-Category-Title-Size for eg: T6-J-SMFD-XS" value="{{ $products['product_code'] }}"/>
                          <div class="mt-2">@error('product_code')
                              <div class="alert alert-danger">{{"Code is required" }}</div>
                              @enderror</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="products_description">Description</label>
                        <div class="col-sm-10">
                            {{-- <input type="text" id="product_description" class="form-control" name="product_description"/> --}}
                            <textarea id="product_description" class="form-control" name="product_description" value="{{ $products['product_description'] }}">{{ $products['product_description'] }}</textarea>
                            <div class="mt-2">@error('product_description')
                              <div class="alert alert-danger">{{"Description is required" }}</div>
                              @enderror</div>
                          </div>
                    </div>
                    {{-- @php
                        $product_unicode = mt_rand(100, 999999);
                    @endphp --}}

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
