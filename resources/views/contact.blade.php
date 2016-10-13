@extends('admin.templates.productos')


@section('title', 'Contáctanos')
@section('js-top')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<div class="items col-md-10 col-sm-10 col-xs-10 card">    
<div class="text-center contact">
<span class="title">Contáctenos</span>
<hr>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">



{!! Form::open(['route' => 'messages.store', 'id' => 'message_form', 'method' => 'POST']) !!}

<div class="form-group col-md-12 col-sm-12 col-xs-12">

{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre y apellido', 'id' => 'form-name']) !!}
</div>

<div class="form-group col-md-12 col-sm-12 col-xs-12">

{!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electrónico']) !!}
</div>




<div class="form-group col-md-12 col-sm-12 col-xs-12">

{!! Form::text('subject', null, ['class' => 'form-control', 'required', 'placeholder' => 'Asunto']) !!}
</div>



<div class="form-group col-md-12 col-sm-12 col-xs-12">

{!! Form::textarea('body', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Escriba su mensaje']) !!}
</div>



<div class="col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
   
   <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
    
    {{--{!! Form::submit('Enviar mensaje', ['class' => 'button button-lg top-margin'])!!}--}}
    <button type="submit" class="button button-lg top-margin">Enviar mensaje</button>
</div>
</div>
{!! Form::close() !!}

    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 address">
        
    
      
      
           <h4>D'Sistemas y PC, CA.</h4>
           <span class="fa fa-phone"> 0424-765-43-21</span>
           <span class="fa fa-envelope"> Contacto@Dsistemasypc.com</span>
           <span class="fa fa-map-marker"> Calle 1 cruce con calle 3 local 4 
           </span>
       
       
   
    
    </div>
</div>

@endsection