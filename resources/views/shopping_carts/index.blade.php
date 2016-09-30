@extends('admin.templates.productos')


@section('title', 'Carrito de compras')


@section('content')

<div class="col-md-10 items">

<ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    
  
   
   
  
   
    <li class="active">Carrito de compras</li>
  <hr>
</ol>




<div class="">
    
   
    <table class="table table-condesed">
    
        <thead>
            <tr>
                <td class="cart-header">Producto</td>
                <td class="cart-header"></td>
                <td class="cart-header">Precio</td>
                <td class="cart-header">Acciones</td>
            </tr>
        </thead>
        
        <tbody class="cart-tbody">
            
            @foreach($articles as $article)
            <tr class="text-center">
                <td class="cart-image"><img src="/images/articles/{{$article->images[0]->image_url}}" alt=""></td>
                <td class="cart-name"><a class="a-no-style" href="/articulos/{{$article->category->slug}}/{{$article->slug}}">{{$article->name}}</a></td>
                <td class="cart-price">{{$article->price}} Bs</td>
                <td> <a href="{{ url('/in_shopping_carts/'.$article->pivot->id) }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('in_shopping_cart_form_{{$article->pivot->id}}').submit();">
                                        Eliminar
                                    </a>
                                   
                                   {!! Form::open(['url'=> '/in_shopping_carts/'.$article->pivot->id, 'method' => 'DELETE', 'style' => 'display:none;', 'id' => 'in_shopping_cart_form_'.$article->pivot->id]) !!}
                                       <input type="hidden" name="article_id" value="{{$article->id}}">
                                       <input type="submit">
      
                                    {!! Form::close() !!}</td>
                                    
            </tr>
            
            @endforeach
            <tr class="text-center">
                <td class="cart-total">Total</td>
                <td></td>
                <td class="cart-price">{{$total}} Bs</td>
                <td class="cart-empty-cart"> <a href="{{ url('carrito/vaciar') }}" onclick="return confirm('Seguro que deseas vaciar el carrito?')" class=''>Vaciar carrito</a></td>
            </tr>
            
        </tbody>
        
    </table>
    
</div>

@if(Auth::user())
    
    @if(Auth::user()->type == 'member')
    
    <a href="{{url('/checkout')}}" class="cart-button">Ir al checkout</a>
    @endif
    
@else


<a href="{{route('admin.auth.login')}}" class="cart-button">Inicia sesión para pagar</a>

@endif

</div>

@endsection