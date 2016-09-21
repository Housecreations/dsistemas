@extends('admin.templates.principal')


@section('title', 'Login')

@section('content')



 <div class="items-no-nav col-md-10">    
<div class="col-md-4"></div>
<div class="col-md-4">
{!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
<div class="form-group">

 {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) !!}
</div>

<div class="form-group">

 {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
</div>

<div class="form-group text-center">
 {!! Form::submit('Ingresar', ['class' => 'button']) !!}
 
</div>

{!! Form::close() !!}
    <hr>
    <a href="{{route('admin.auth.register')}}">Registrarse</a>
    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
     </div>
</div>
@endsection
