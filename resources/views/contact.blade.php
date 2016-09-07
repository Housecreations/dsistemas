@extends('admin.templates.productos')


@section('title', 'Contáctanos')


@section('content')

<div class="items col-md-10">    
<div class="text-center contact">
<span class="title">Contáctenos</span>
</div>

<div class="col-md-6">



{!! Form::open(['route' => 'messages.store', 'method' => 'POST']) !!}

<div class="form-group col-md-12">

{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre y apellido']) !!}
</div>

<div class="form-group col-md-12">

{!! Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electrónico']) !!}
</div>




<div class="form-group col-md-12">

{!! Form::text('subject', null, ['class' => 'form-control', 'required', 'placeholder' => 'Asunto']) !!}
</div>

<div class="form-group col-md-12">

{!! Form::textarea('message', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Escriba su mensaje']) !!}
</div>



<div class="col-md-4">
<div class="form-group text-center">
    
    {!! Form::submit('Enviar mensaje', ['class' => 'button'])!!}
    
</div>
</div>
{!! Form::close() !!}

    </div>
    <div class="col-md-4">
        <address>
       <div class="justificado">
      
       <ul>
           <h4>D'Sistemas y PC, CA.</h4>
           <li class="fa fa-phone"> 0424-765-43-21</li>
           <li class="fa fa-envelope"> Contacto@Dsistemasypc.com</li>
           <li class="fa fa-map-marker"> Calle 1 cruce con calle 3 local 4 
           </li>
       </ul>
        </div>
    </address>
    
    </div>
</div>

@endsection