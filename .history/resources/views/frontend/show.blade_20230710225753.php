@extends('frontend.layout.main')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span><a href="{{ route('frontend.show', ['id' => $product['id']]) }}">{{$product['product_title']}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <a href="{{ route('frontend.show', ['id' => $product['id']]) }}">
                                    <img data-hash="product-1" class="product__big__img" src="{{ $product['product_image'] }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product['product_title']}}</h3>
                        <div class="product__details__price">Rs. {{ number_format($product['product_price'] , 2, '.', ',') }}</div>
                        <p>{{$product['product_description']}}</p>
                        <div class="product__details__button">

                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="customer_quantity">
                                    </div>
                                </div>
                                <button type="submit" class="cart-btn"> Add to cart</button>
                        </div>
                        @if(session('success'))
                                    <div class="alert alert-success" role="alert">

                                            <span>Item added successfully</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                    </div>
                                @endif
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        @foreach ($variants->unique('product_color') as $variant)
                                        <label for="{{ $variant['product_color'] }}">
                                            <input type="radio" name="color__radio" id="{{ $variant['product_color'] }}" value="{{ $variant['product_color'] }}" class="color-radio">
                                            <span class="checkmark" style="background: {{ $variant['product_color'] }}"></span>
                                        </label>
                                    @endforeach


                                    </div>
                                </li>
                                <br>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        @foreach ($variants->unique('product_color') as $variant)
                                        <div class="size-labels" id="size-labels-{{ $variant['product_color'] }}" style="display: none;">
                                            @php
                                            $hasStock = false;
                                            @endphp
                                            @foreach ($variants as $variantItem)
                                            @if ($variantItem['product_color'] === $variant['product_color'] && $variantItem['product_quantity'] > 0)
                                            <label for="{{ $variantItem['product_size'] }}" style="display: inline-block; padding: 5px; border: #CA1515;">
                                                <input type="radio" id="{{ $variantItem['product_size'] }}" name="size__radio" value="{{ $variantItem['product_size'] }}">
                                                {{ $variantItem['product_size'] }}
                                            </label>
                                            @php
                                            $hasStock = true;
                                            @endphp
                                            @endif
                                            @endforeach
                                            @if (!$hasStock)
                                            <div class="out-of-stock">Out of Stock</div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </ul>
                        <div class="tab-content">
                                <p>{{$product['product_description']}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
    <!-- Product Details Section End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
        $('.color-radio').change(function() {
            var selectedColor = $(this).attr('id');
            $('.size-labels').hide();
            $('#size-labels-' + selectedColor).show();
        });
        $('.cart-btn').click(function() {
    var selectedSize = $("input[name='size__radio']:checked").val();
    if (selectedSize === undefined) {
        var alertMessage = 'Please select size'
      alert(alertMessage);
      return false;
    }
  });

    });
</script>
@endsection
