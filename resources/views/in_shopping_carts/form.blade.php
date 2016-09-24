{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'id' => 'shopping_cart_form']) !!}

<input type="hidden" name="article_id" value="{{$article->id}}">
<input type="submit" class="cart-button" value="Agregar al carrito">

{!! Form::close() !!}