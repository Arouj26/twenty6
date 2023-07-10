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
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Clothing</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <ul>
                                                        <li><a href="{{ route('frontend.category', ['product_category' => 'coats']) }}">Coats</a></li>
                                                        <li><a href="{{ route('frontend.category', ['product_category' => 'dresses']) }}">Dresses</a></li>
                                                        <li><a href="{{ route('frontend.category', ['product_category' => 'shirts']) }}">Shirts</a></li>
                                                        <li><a href="{{ route('frontend.category', ['product_category' => 't-shirts']) }}">T-shirts</a></li>
                                                        <li><a href="{{ route('frontend.category', ['product_category' => 'jeans']) }}">Jeans</a></li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Accessories</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ route('frontend.category', ['product_category' => 'bags']) }}">Bags</a></li>
                                                    <li><a href="{{ route('frontend.category', ['product_category' => 'jewellry']) }}">Jewellry</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Shoes</a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ route('frontend.category', ['product_category' => 'flatshoes']) }}">Flat Shoes</a></li>
                                                    <li><a href="{{ route('frontend.category', ['product_category' => 'boots']) }}">Boots</a></li>
                                                    <li><a href="{{ route('frontend.category', ['product_category' => 'highheels']) }}">High heels</a></li>
                                                </ul>
                                            </div>
                                        </div>
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
                        @if ( $product['product_category']  == $product['product_category'])
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item product__details__button1">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product['product_image'] }}"  style="background-image: url('{{ $product['product_image'] }}');">
                                </div>
                                <div class="product__item__text">
                                    <h5 style="color:black;"><a href="{{ route('frontend.show', ['id' => $product['id']]) }}">{{$product['product_title']}}</a></h5>
                                    <div class="product__price">Rs. {{ number_format($product['product_price'] , 2, '.', ',') }}</div>
                                        </div>
                                        <div style="display: flex; justify-content: center; margin-top:10px;">
                                            <form action="{{ route('cart.addonpage') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                              <button type="submit" class="cart-btn">
                                                <span class="icon_bag_alt"></span> Add to cart
                                              </button>
                                            </form>

                                          </div>
                            </div>
                       </div>
                       @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

</body>
@endsection
