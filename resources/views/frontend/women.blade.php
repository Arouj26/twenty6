@extends('frontend.layout.main')
@section('content')
<body>

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        {{-- <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Clothing</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample"> --}}
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($categories as $category)
                                                    <li><a href="{{ url('category/'.strtolower($category['category_name'])) }}">{{$category['category_name']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    @if (session('success'))
    <div class="alert alert-success" style="text-align: center; margin-top: 10px;">
        {{ session('success') }}
    </div>
@endif
                    <div class="row">
                        @foreach($products as $product)
                        {{-- @foreach($categories as $category) --}}
                        @if (strcasecmp($category_name, $product['product_category']) === 0)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item product__details__button1">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product['product_image'] }}"  style="background-image: url('{{ $product['product_image'] }}');">
                                </div>
                                <div class="product__item__text">
                                    <h5 style="color:black;"><a href="{{ route('frontend.show', ['id' => $product['id']]) }}">{{$product['product_title']}}</a></h5>
                                    <div class="product__price">Rs. {{ number_format($product['product_price'] , 2, '.', ',') }}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- @endforeach --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

</body>

@endsection
