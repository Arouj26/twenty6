@extends('frontend.layout.main')
@section('content')
<body>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>{{$contact['Address']?? 'Johar Town, Lahore, Pakistan'}}</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>+{{$contact['Phone']?? '921223334444'}}</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>{{$contact['Email']?? 'twenty6@demo.com'}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>
                            <form action="{{url('/contact')}}" method="post">
                                @csrf
                                <input type="text" placeholder="Name" name="name">
                                <input type="text" placeholder="Email"  name="email">
                                <input type="text" placeholder="Phone"  name="phone">
                                <textarea placeholder="Message"  name="message"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3406.762836272382!2d74.27754151502016!3d31.499120354358642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39191e95b15e6879%3A0x6db8438f46ae5d96!2sJohar%20Town%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
    height="780" style="border:0" allowfullscreen=""></iframe>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
</body>
@endsection
