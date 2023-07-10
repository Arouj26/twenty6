
@extends('backend.layout.main')
@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-10">
              <h4 class="fw-bold py-3 mb-4">Products</h4></div>
                <div class="col-md-2">
                <a href="{{url('/admin/add-products-variants/')}}" class="btn btn-primary">Add Products</a></div>
                </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Price</th>
                        {{-- <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th> --}}
                        <th>Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product["product_code"]}}</td>
                            <td>@if ($product['product_image'])
                                <img src="{{ asset($product['product_image']) }}" alt="Product Image" width="100" height="100">
                            @else
                                <td><img src='{{ $product["product_image"] }}' width="100" height="100"></td>
                            @endif
                            </td>
                            <td>{{$product["product_category"]}}</td>
                            <td>{{$product["product_title"]}}</td>
                            <td>Rs. {{ number_format($product['product_price'] , 2, '.', ',') }}</td>
                            {{-- <td>
                                @foreach($variants as $variant)
                                @if($product["product_unicode"]==$variant["product_unicode"])
                                {{$variant["product_color"]}}-
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($variants as $variant)
                                @if($product["product_unicode"]==$variant["product_unicode"])
                                {{$variant["product_size"]}}-
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($variants as $variant)
                                @if($product["product_unicode"]==$variant["product_unicode"])
                                {{$variant["product_quantity"]}}-
                                @endif
                                @endforeach
                            </td> --}}

                            <td><a href="{{url('/admin/products/view-products/' . $product['id'])}}" class="btn rounded-pill btn-icon btn-secondary">
                                <i class="fa fa-eye"></i></a><a href="{{url('/admin/edit_product/' . $product['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                                <span class="tf-icons bx bx-edit-alt"></span></a>
                                <a href="{{url('/admin/delete_product/' . $product['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash-alt"></span></a>
                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
@endsection
