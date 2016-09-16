{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'id' => 'shopping_cart_form', 'style' => 'display:none;']) !!}

<input type="hidden" name="article_id" value="{{$article->id}}">
<input type="submit">

{!! Form::close() !!}