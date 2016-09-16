@extends('admin.templates.principal')


@section('title', 'Lista de categorias')


@section('content')

 <div class="">
   <div class="container-fluid users">
<div class="col-md-3"></div>
<div class="col-md-6">

    <a href="{{ route('admin.index')}}" class="button">Atrás</a>
     <a href="{{ route('admin.categories.create') }}" class='button'>Nueva categoria</a>



<!-- Buscador de usuarios -->

{!! Form::open(['route' => 'admin.categories.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar categoria...', 'aria-describedby' => 'searchCategories']) !!}

   
    <span class="input-group-addon" id="searchCategories"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
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
       @foreach($categoriesrender as $category)
           <tr>
               <td>{{$category->id}}</td>
               <td>{{$category->name}}</td>
               
           
           
               <td>
                <a href="{{ route('admin.categories.edit', $category->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
           </tr>
       @endforeach 
    </tbody>
    
</table>
<div class="text-center">
  {!! $categoriesrender->render() !!} 
</div>

     </div>
</div>
     </div>
@endsection