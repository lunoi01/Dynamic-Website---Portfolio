
@php

$serv = \App\Models\WPTitle::all();
$serviceN = App\Models\ServiceTitle::all();

@endphp



<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
 
                    <span class="sub-title">Work Process</span>
          
                    <h2 class="title"></h2>
                </div>
            </div>
        </div>
        

        <div class="row work__process__wrap">
        @foreach($serv as $item)
            <div class="col">
            
                <div class="work__process__item">
                
                    <span class="work__process_step">Step - {{ $item->id }}</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ $item->logo  }}" alt="">
                        <img class="dark" src="{{  $item->logo }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">{{ $item->wp_title }}</h4>
                        <p>{!! $item->wp_desc !!}</p>
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        </div>

        

    </div>
    
</section>