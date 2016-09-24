@extends('admin.templates.principal')


@section('title', 'Lista de archivos')


@section('content')

 <div class="">
   <div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-6 users">

    <a href="{{ route('admin.index')}}" class="button">Atrás</a>
     <a href="{{ route('admin.files.create') }}" class='button'>Nuevo archivo</a>



<!-- Buscador de usuarios -->

{!! Form::open(['route' => 'admin.files.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar archivo...', 'aria-describedby' => 'searchFiles']) !!}

   
    <span class="input-group-addon" id="searchFiles"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
    </div>
{!! Form::close() !!}
<!-- Fin buscador de usuarios -->


<hr>
<table class='table table-hover'>
    
    <thead>
        <th>Id</th>
        <th>Nombre</th>
       
        <th>Acción</th>
    </thead>
    <tbody>
       @foreach($files as $file)
           <tr>
               <td>{{$file->id}}</td>
               <td>{{$file->name}}</td>
               
           
           
               <td>
                <a href="{{ route('admin.files.edit', $file->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.files.destroy', $file->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
           </tr>
       @endforeach 
    </tbody>
    
</table>
<div class="text-center">
  {!! $files->render() !!} 
</div>

     </div>
</div>
     </div>
@endsection