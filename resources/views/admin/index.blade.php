@extends('admin.templates.principal')

@section('title', 'Panel administracion') 


@section('content') 

<div class='admin-index'>
 @include('admin.templates.partials.adminnav')


<div class="col-md-2 col-xs-1"></div>
<div class="col-md-8 col-xs-10">
    
    <div class="container-fluid text-center">
        
        <a href="{{ route('admin.front.edit')}}"><div class="templatemo-gallery-item collection col-md-12 front">
        
        @if($carousel)
        <img src="images/slider/{{$carousel->image_url}}" alt="">
        @else
        <img src="images/slider/" alt="">
        @endif
        <div class="templatemo-gallery-image-overlay"></div>
        
       
        </div></a>
        
        
    </div>
    
</div>
</div>

@endsection