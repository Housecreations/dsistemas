@extends('admin.templates.principal')


@section('title', 'Lista de categorias')


@section('content')

 <div class="">
   <div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">

<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
  
       <a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
        <a href="{{ route('admin.categories.create') }}" class='button button-md'>Nueva área</a>
   
    <hr>
     



<!-- Buscador de usuarios -->

{!! Form::open(['route' => 'admin.categories.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar área...', 'aria-describedby' => 'searchCategories']) !!}

   
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