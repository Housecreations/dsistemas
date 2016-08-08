@extends('admin.templates.principal')


@section('title', 'Login')

@section('content')



 <div class="container-fluid login page-alternate">    
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
     </div>
</div>
@endsection
