@extends('frontend.layout.main')
@section('content')
<body>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    @foreach ($categories as $category)
                        @if ($category['is_first'] === "yes")
                            <div class="categories__item categories__large__item set-bg"
                            data-setbg="{{$category['category_image']}}">
                            <div class="categories__text">
                                    <h1>{{$category['category_display_title']}}</h1>
                                    @php
                                        $categoryurl=strtolower($category['category_name']);
                                    @endphp
                                    <a href="{{ route('frontend.women', $categoryurl) }}">Shop now</a>
                            </div>
                            </div>
                        @endif
                    @endforeach
            </div>
            <div class="col-lg-6">
                <div class="row">
                    @foreach ($categories as $category)
                    @if ($category['is_first'] === "no")
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{$category['category_image']}}">
                            <div class="categories__text">
                                <h4>{{$category['category_display_title']}}</h4>
                                <p></p>
                                    @php
                                        $categoryurl=strtolower($category['category_name']);
                                    @endphp
                                    <a href="{{ route('frontend.women', $categoryurl) }}">Shop now</a>
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
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Featured products</h4>
                </div>
            </div>
            {{-- <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                        <li class="{{ request()->url() === url('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{ request()->url() === url('/women') ? 'active' : '' }}"><a href="{{url('/women')}}">Clothes</a></li>
                        <li class="{{ request()->url() === url('/accessories') ? 'active' : '' }}"><a href="{{url('/accessories')}}">Accessories</a></li>
                        <li class="{{ request()->url() === url('/shoes') ? 'active' : '' }}"><a href="{{url('/shoes')}}">Shoes</a></li>
                        <li class="{{ request()->url() === url('/blog') ? 'active' : '' }}"><a href="{{url('/blog')}}">Blog</a></li>
                        <li class="{{ request()->url() === url('/contact') ? 'active' : '' }}"><a href="{{url('/contact')}}">Contact</a></li>
                </ul>
            </div> --}}
        </div>
        <div class="row property__gallery">
            @foreach ($products as $product)
            @if ($product['product_feature']=="yes")
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg={{$product['product_image']}}>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('frontend.show', ['id' => $product['id']]) }}">{{$product['product_title']}}</a></h6>
                        <div class="product__price">Rs. {{ number_format($product['product_price'] , 2, '.', ',') }}</div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->

@php
    $latestBanner = end($banners);
@endphp
{{-- @foreach ($banners as $banner) --}}
@if (!empty($latestBanner))
<section class="banner set-bg" data-setbg="{{ asset($latestBanner['banner']) }}">
{{-- @endforeach --}}

    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    @foreach ($carousals as $carousal)
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>{{$carousal['carousal_tag']}}</span>
                            <h1>{{$carousal['carousal_text']}}</h1>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</section>
@endif
<!-- Banner Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    @if ($service['service_image'] === '0')
                            <i class="{{$service['service_icon']}}"></i>
                            @else
                            @if ($service['service_image'])
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($service['service_image']) }}" alt="service Image" width="150" height="150" class="mr-2"></div>
                            @else
                                <td><img src='{{ $service["service_image"] }}' width="100" height="100">
                            @endif
                            @endif
                    <h6>{{$service['service_name']}}</h6>
                    <p>{{$service['service_description']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Services Section End -->


</body>
@endsection
