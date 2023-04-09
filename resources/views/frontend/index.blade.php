@extends('frontend.main_master')
@section('main')

@section('title')
Home | ABC Tuition
@endsection

<!-- banner-area -->
@include('frontend.home_all.home_slide')
   
</section>
<!-- banner-area-end -->
@include('frontend.home_all.home_about')
<!-- about-area -->

<!-- about-area-end -->

<!-- services-area -->
@include('frontend.home_all.home_services')
<!-- services-area-end -->

<!-- work-process-area -->
@include('frontend.home_all.home_workprocess')
<!-- work-process-area-end -->

<!-- portfolio-area -->
@include('frontend.home_all.portfolio')
<!-- portfolio-area-end -->

<!-- partner-area -->
<!-- @include('frontend.home_all.home_partner') -->
<!-- partner-area-end -->

<!-- testimonial-area -->
@include('frontend.home_all.home_feedback')
<!-- testimonial-area-end -->

<!-- blog-area -->
@include('frontend.home_all.home_blog')
<!-- blog-area-end -->

<!-- contact-area -->
<!-- <section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}">
                        @csrf
                            <input type="text" name ="name" placeholder="Enter name*">
                            <input type="email" name="email" placeholder="Enter email*">
                            <input type="number" name="phone" placeholder="Enter number*">
                            <input type="text"name= "subject" placeholder="Enter subject*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- contact-area-end -->

@endsection