@php
    use App\Models\Brand;
    use App\Models\Header;
    use App\Models\Logo;


    $headerData = Brand::orderBy('id', 'desc')->first();
    $brand_name = $headerData->brand_name ?? '';
    $brand_logo = $headerData->brand_logo ?? '';
    // dd($headerData);
    $headersection = Header::all();
    $sections=[];
    foreach ($headersection as $header) {
        // var_dump($header->is_checked);
        if ($header->is_checked === 1) {
            $sections[]=$header->header_name;
        }
    }
    $logos = Logo::first();
    $logo = $logos ? $logos->logo : '';
    $cart = Session::get('cart');
    // dd($cart);
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$brand_name}}</title>
    <link rel="icon" type="image/png" href="{{ $brand_logo }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}" type="text/css">
</head>
    {{-- <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="{{url('/cart')}}"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img style="width:98; height:40;" src="{{$logo}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">

                        <ul>
                            @foreach ($sections as $section)
                            @if ($section == 'Home')
                            <li class="{{ request()->url() === url('/') ? 'active' : '' }}"><a href="{{url('/')}}">{{$section}}</a></li>
                            @elseif ($section == 'Blog' || $section == 'Contact')
                            <li class="{{ request()->path() === strtolower($section) ? 'active' : '' }}">
                                <a href="{{ url(strtolower($section))  }}">{{ $section }}</a>
                            </li>
                            @else
                            <li class="{{ request()->path() === 'categories/' . strtolower($section) ? 'active' : '' }}">
                                <a href="{{ url('category/'.strtolower($section)) }}">{{ $section }}</a>
                            </li>
                            @endif

                            @endforeach
                        </ul>


                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">

                        <ul class="header__right__widget">
                            <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart fa-lg" style="color: #ca1515;"></i>
                                @php
                                    $items=0;
                                @endphp
                                @if (isset($cart))
                                @foreach ($cart as $cart)
                                @php
                                    $items +=$cart['quantity'];
                                @endphp
                                @endforeach
                                @endif
                                @if (isset($cart))
                                <div class="tip">{{$items}}</div>@endif
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
