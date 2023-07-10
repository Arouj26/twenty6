@extends('frontend.layout.main')
@section('content')
<body>

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ $blog['blog_picture'] }}"></div>
                            <div class="blog__item__text">
                                <h6><a href="{{ route('frontend.blog', ['id' => $blog['id']]) }}">{{$blog['blog_title']}}</a></h6>
                                <ul>
                                    <li>by <span>{{$blog['blog_author']}}</span></li>
                                    <li>{{$formattedDate = \Carbon\Carbon::parse($blog['blog_date'])->format('M d, Y')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
