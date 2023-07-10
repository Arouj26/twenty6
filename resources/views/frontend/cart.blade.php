@extends('frontend.layout.main')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th style="text-align:center">Remove Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $Sum = 0; // Initialize the total sum variable
                                    $price = 0;
                                    $total = 0;
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                      <td class="cart__product__item">
                                        <img src="{{ $product["product_image"] }}" width="90" height="90" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{ $product["product_title"] }}</h6>
                                        </div>
                                    </td>
                                    <td>Rs. {{ number_format($product["product_price"] , 2, '.', ',') }}</td>
                                    <td>{{ $product->customerQuantity }}</td>
                                    <td>
                                        @php
                                            $price= $product["product_price"] * $product->customerQuantity
                                        @endphp
                                        Rs. {{ number_format($price , 2, '.', ',') }}
                                    </td>
                                    @php
                                    $Sum += $product["product_price"] * $product->customerQuantity; // Add the current product price to the total sum
                                    $total = $Sum + 200;
                                    @endphp
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <td style="text-align:center">
                                        <td style="text-align:center">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                @if ($product)
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                @endif
                                                <button type="submit" class="remove-btn"><span class="icon_close"></span></button>
                                            </form>
                                        </td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{url('/')}}">Continue Shopping</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul><li>Subtotal <span>Rs. {{ number_format($Sum, 2, '.', ',') }}
                        </span></li>
                        <li>Shipping <span>Rs. {{ number_format($shipping, 2, '.', ',') }}
                        </span></li>
                            <li>Total <span>Rs. {{ number_format($total, 2, '.', ',') }}
                            </span></li>
                        </ul>
                        <a href="{{'/checkout'}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

@endsection
