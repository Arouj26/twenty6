@extends('frontend.layout.main')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div> --}}
            <form action="/checkout" method="post" class="checkout__form">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Shipping details</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" id="first_name" name="first_name"/>
                                    <div class="mt-2">@error('first_name')
                                    <div class="alert alert-danger">{{"First name is required" }}</div>
                                    @enderror</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" id="last_name" name="last_name"/>
                                    <div class="mt-2">@error('last_name')
                                        <div class="alert alert-danger">{{"Last name is required" }}</div>
                                        @enderror</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" id="country" name="country"/>
                                    <div class="mt-2">@error('country')
                                        <div class="alert alert-danger">{{"Country is required" }}</div>
                                        @enderror</div>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" id="address" name="address"/>
                                    <div class="mt-2">@error('address')
                                        <div class="alert alert-danger">{{"Address is required" }}</div>
                                        @enderror</div>
                                    <input type="text" placeholder="Apartment. suite, unit etc. ( optional )">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" id="city" name="city"/>
                                    <div class="mt-2">@error('city')
                                        <div class="alert alert-danger">{{"City is required" }}</div>
                                        @enderror</div>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" id="zip" name="zip"/>
                                    <div class="mt-2">@error('zip')
                                        <div class="alert alert-danger">{{"Zip is required" }}</div>
                                        @enderror</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" id="phone" name="phone"/>
                                    <div class="mt-2">@error('phone')
                                        <div class="alert alert-danger">{{"Phone is required" }}</div>
                                        @enderror</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" id="email" name="email"/>
                                    <div class="mt-2">@error('email')
                                        <div class="alert alert-danger">{{"Email is required" }}</div>
                                        @enderror</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                        <p>Additional notes <span></span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special note for delivery" name="notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        @php
                                            $Sum = 0; // Initialize the total sum variable
                                            $price =0;
                                            $total = 0;
                                        @endphp
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        @foreach($products as $product)
                                        <li> <img src="{{ $product["product_image"] }}" width="100" height="90" alt=""><b style="font-size:20px;"> x {{ $product->customerQuantity }}</b><span>@php
                                            $price= $product["product_price"] * $product->customerQuantity
                                        @endphp
                                        Rs. {{ number_format($price , 2, '.', ',') }}</span>
                                        {{-- <span>{{ $product["product_quantity"] }}</span> --}}
                                    </li>
                                    @php
                                    $Sum += $product["product_price"] * $product->customerQuantity; // Add the current product price to the total sum
                                    $total = $Sum + 200;
                                    @endphp
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>

                                    <li>Subtotal <span>Rs. {{ number_format($Sum, 2, '.', ',') }}</span></li>
                                    <li>Shipping <span>Rs. 200.00</span></li>
                                        <li>Total <span>Rs. {{ number_format($total, 2, '.', ',') }}</span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="cod">
                                        Cash on Delivery
                                        <input type="checkbox" id="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="online">
                                        Debit/Credit Card
                                        <input type="checkbox" id="online">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

@endsection
