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

