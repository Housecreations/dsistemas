@extends('admin.templates.main')


@section('title', 'Outlet')


@section('content')

 @include('admin.templates.partials.adminnav')

<div class="col-md-12">

<div class="col-md-5"></div>
<div class="col-md-2">
<a href="{{route('admin.outlet.show')}}">
<div class="text-center btn button">Ver artículos</div>
</a></div>
<br>
<h4 class="text-center">Seleccione un artículo para agregar a descuentos</h4>
</div>

<div class="col-md-1"></div>
<div class="items col-md-12"> 

    @foreach($articles as $article)
    
    <div class="col-md-2 item-content">
   
    <a class="" href="{{ route('admin.outlet.add', $article->id)}}">
   
    <div class="templatemo-gallery-item">
							<img src="/images/articles/{{$article->articlesDetails[0]->images[0]->image_URL}}" alt="Gallery Item" class="img-responsive">
							<div class="templatemo-gallery-image-overlay"></div>
							<div class="templatemo-gallery-image-description text-right">
								<blockquote class="blockquote-reverse">
									<h4 class="templatemo-white-text">{{$article->name}}</h4>
									<h4 class="templatemo-gold-text">{{$article->articlesDetails[0]->price}} bs</h4>
								</blockquote>
							</div>
						</div>	
    
        </a>
    
    
    
 
   
    </div>
     
    @endforeach

</div>
@endsection