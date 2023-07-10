
@extends('backend.layout.main')
@section('content')
<body>
<div class="container-xxl flex-grow-1 container-p-y" >

<!-- Contextual Classes -->
<div class="row">
    <div class="card ">

        {{-- <h5 class="card-header">Orders</span></h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary"><span class="text-primary">Product Summary</span></span></h5></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{-- @foreach ($products as $product) --}}
                <tr>
                    <td><b>Code</b></td>
                    <td style="text-align: right">{{ $products->product_code }}</td>
                </tr>
                <tr>
                    <td><b>Category</b></td>
                    <td style="text-align: right">{{ $products->product_category }}</td>
                </tr>
                <tr>
                    <td><b>Image</b></td>
                    <td style="text-align: right">{{ $products->product_image }}</td>
                </tr>
                <tr>
                    <td><b>Title</b></td>
                    <td style="text-align: right">{{ $products->product_title }}</td>
                </tr>
                {{-- @endforeach --}}
                <tr>
                    <td><b>Price</b></td>
                    <td style="text-align: right">{{ $products->product_price }}</td>
                </tr>
                <tr>
                    <td><b>Description</b></td>
                    <td style="text-align: right">{{ $products->product_description }}</td>
                </tr>
            </tbody>
          </table>
          <!-- Bordered Table -->
          <div class="card">
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Size</th>
                      <th>Color</th>
                      <th>Quantity</th>
                      {{-- <th>Delete Variant</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($variants as $variant)
                    <tr>
                        <td>
                            {{ $variant['product_size'] }}
                          </td>
                          <td><div class="color-box" style="width: 25px;
                            height: 25px; background-color: {{ $variant['product_color'] }};"></div> </td>
                          <td> {{ $variant['product_quantity'] }}</td>
                          {{-- <td><a href="{{url('/admin/products/delete-variant/' . $variant['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                            <span class="tf-icons bx bx-trash-alt"></span></a></td> --}}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--/ Bordered Table -->
        </div>
    </div>

<!--/ Contextual Classes -->
</div>
<div class="mt-2">
    <form action="{{ url('/admin/products') }}" >
    <button type="submit" class="btn btn-primary me-2">Go Back</button></form>
  </div>
{{-- </div> --}}
</div>

</div>
</body>
@endsection
