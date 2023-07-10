@extends('backend.layout.main')
@section('content')

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (request()->has('search'))
    <h1>Search Results for "{{ $searchTerm }}"</h1>

    @if ($results->isEmpty())
        <p>No results found.</p>
    @else
        <div class="row">
            @foreach($results as $result)
          <div class="col-md-3 col-lg-3 mb-3">
            <div class="card h-100">
              <img class="card-img-top" width="100" height="200" src="{{ $result['product_image'] }}" alt="result image">
              <div class="card-body">
                <h5 class="card-title">Title: {{$result['product_title']}}</h5>
                <p class="card-text">
                    Product Quantity: {{$result['product_quantity']}}<br>
                    Item code: {{$result['product_code']}}<br>
                    Price: Rs. {{$result['product_price']}}
                </p>

              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
@endif

</div>

  </body>

@endsection
