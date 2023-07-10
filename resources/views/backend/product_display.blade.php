@extends('backend.layout.main')
@section('content')

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @foreach($products as $product)
          <div class="col-md-3 col-lg-3 mb-3">
            <div class="card h-100">
              <img class="card-img-top" width="100" height="200" src="{{ $product['product_image'] }}" alt="Product image">
              <div class="card-body">
                <h5 class="card-title">Title: {{$product['product_title']}}</h5>
                <p class="card-text">
                    Product Quantity: {{$product['product_quantity']}}<br>
                    Item code: {{$product['product_code']}}<br>
                    Price: Rs. {{$product['product_price']}}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

</div>

  </body>

@endsection
