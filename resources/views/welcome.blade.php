@extends('admin.templates.principal')

@section('title', "D'Sistemas y PC, CA.") 


@section('content') 



<div class="carousel-index">
        <div class="slideshow index" 
            data-cycle-fx=carousel
            data-cycle-timeout=5000
            data-cycle-carousel-visible=1
           data-cycle-slides="> a"
            data-cycle-next="#next1"
            data-cycle-prev="#prev1"
            data-cycle-carousel-fluid=true
            >
            
            @foreach($carousel as $image)
            <a href="{{$image->url_to}}"><img alt="" src="/images/slider/{{$image->image_url}}" >
            </a>
           @endforeach
           
          
        </div>
        <a href="#" id="prev1">&lt;&lt; Prev </a>
        <a href="#" id="next1"> Next &gt;&gt; </a>
      </div>




@endsection

@section('js')
<script src="{{ asset('js/jquery.cycle2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.cycle2.carousel.min.js') }}"></script>
     <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
     
     
<script src="js/jquery.nivo.slider.pack.js"></script>
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            pauseTime: 6000,
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
@endsection

