@php
    use App\Models\Footer;

    $footers = Footer::all();
    // dd($footer);

@endphp
       <!-- Instagram Begin -->
       <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                @foreach ($footers as $footer)
                <div class="col-lg-2 col-md-4 col-sm-4 col-md-6 col-sm-6 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{$footer['footer_image']}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/{{ $footer['footer_insta'] }}">@ {{$footer['footer_insta']}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Instagram End -->
   <!-- Footer Section Begin -->
   <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/blog')}}">Blogs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>About us</h6>
                    <ul>
                        {{-- <li><a href="#">About us</a></li> --}}
                        {{-- <li><a href="#">Orders Tracking</a></li> --}}
                        <li><a href="{{url('/contact')}}">Customer Service</a></li>
                        <li><a href="{{url('/contact')}}">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{url('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{url('frontend/js/mixitup.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
