@extends('admin.templates.productos')


@section('title', 'Carrito de compra')


@section('content')

<div class="col-md-10 items">
<div class="text-center blue-grey white-text">
    <h1>Carrito de compras</h1>
    <hr>
</div>


<div class="">
    
    <table class="table table-bordered">
        <thead>
          <tr>
              <td>Producto</td>
              <td>Precio</td>
              <td>Acciones</td>
          </tr>  
        </thead>
        
        <tbody>
            
            @foreach($articles as $article)
            <tr>
                <td>{{$article->name}}</td>
                <td>{{$article->price}}</td>
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
            <tr>
                <td>Total</td>
                <td>{{$total}}</td>
                <td> <a href="{{ url('carrito/vaciar') }}" onclick="return confirm('Seguro que deseas vaciar el carrito?')" class=''>Vaciar carrito</a></td>
            </tr>
            
        </tbody>
        
    </table>
    
</div>

@if(Auth::user())
    
    @if(Auth::user()->type == 'member')
    
    <a href="{{url('payments/pay')}}" class="cart-button">Pagar carrito</a>
    @endif
    
@else


<a href="{{route('admin.auth.login')}}" class="cart-button">Inicia sesión para pagar</a>

@endif

</div>

@endsection