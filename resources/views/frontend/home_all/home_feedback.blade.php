@php

$feed = \App\Models\Feedback::all();
$feed_image = \App\Models\FeedImages::all();

@endphp

<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    @foreach($feed_image as $img)
                    <li><img src="{{ $img->feed_image }}" alt="XD" width="35%"></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">
                        @foreach($feed as $item)
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            
                            <div class="testimonial__content">
                                <p>{!! $item->feedback_text !!}</p>
                                <div class="testimonial__avatar">
                                    <span>{{ $item->feedback_name }}</span>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>