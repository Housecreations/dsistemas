@extends('admin.templates.productos')


@section('title', 'Carrito de compra')


@section('content')

<div class="col-md-10 items">
<div class="text-center blue-grey white-text">
    <h1>Tu carrito de compras</h1>
</div>


<div class="">
    
    <table class="table table-bordered">
        <thead>
          <tr>
              <td>Producto</td>
              <td>Precio</td>
          </tr>  
        </thead>
        
        <tbody>
            
            @foreach($articles as $article)
            <tr>
                <td>{{$article->name}}</td>
                <td>{{$article->price}}</td>
            </tr>
            
            @endforeach
            <tr>
                <td>Total</td>
                <td>{{$total}}</td>
            </tr>
            
        </tbody>
        
    </table>
    
</div>

@if(Auth::user())
    
    @if(Auth::user()->type == 'member')
    <a href="" class="btn btn-success">Pagar carrito</a>
    @endif
    
@else


<a href="{{route('admin.auth.login')}}" class="btn btn-success">Inicia sesión para pagar</a>

@endif

</div>

@endsection