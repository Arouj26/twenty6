@extends('frontend.layout.main')
@section('content')
<body>
<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="{{ $blog['blog_picture'] }}" alt="">
                        <div class="blog__details__item__title">
                            <span class="tip">{{$blog['blog_tag']}}</span>
                            <h4>{{$blog['blog_title']}}</h4>
                            <ul>
                                <li>by <span>{{$blog['blog_author']}}</span></li>
                                <li>{{$formattedDate = \Carbon\Carbon::parse($blog['blog_date'])->format('M d, Y')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__desc">
                        <p>{!! $blog['blog_p1'] !!}
                        </p>
                        <p>{{$blog['blog_p2']}}</p>
                    </div>
                    <div class="blog__details__desc">
                        <p>{{$blog['blog_p3']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

@endsection
