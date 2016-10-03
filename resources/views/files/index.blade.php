@extends('admin.templates.principal')


@section('title', 'Lista de archivos')


@section('content')

 <div class="">
   <div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">

<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
     <a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
   <a href="{{ route('admin.files.create') }}" class='button button-md'>Nuevo archivo</a>
<hr>
    


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
        <th>Área</th>
        <th>Versión</th>
        <th>Tamaño</th>
        <th>S.O.</th>
        <th>Acciónes</th>
    </thead>
    <tbody>
       @foreach($files as $file)
           <tr>
               <td>{{$file->id}}</td>
               <td>{{$file->name}}</td>
               <td>{{$file->category->name}}</td>
               <td>{{$file->version}}</td>
               <td>{{$file->size}}</td>
               <td>{{$file->os}}</td>
           
           
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