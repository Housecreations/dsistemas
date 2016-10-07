@extends('admin.templates.principal')


@section('title', 'Lista de tags')


@section('content')

 <div class="">
   <div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">

<div class="col-md-10 col-md-offset-1">
  <a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
   <a href="{{ route('admin.tags.create') }}" class='button button-md'>Nuevo tag</a>
     
<hr>


<!-- Buscador de usuarios -->

{!! Form::open(['route' => 'admin.tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag...', 'aria-describedby' => 'searchTags']) !!}

   
    <span class="input-group-addon" id="searchTags"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
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
       @foreach($tags as $tag)
           <tr>
               <td>{{$tag->id}}</td>
               <td>{{$tag->name}}</td>
               
           
           
               <td>
                <a href="{{ route('admin.tags.edit', $tag->id)}}" class='button button-md'>
                    <i class="fa fa-wrench"></i></a>
                    
                    
          {{-- <a href="{{ route('admin.tags.destroy', $category->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>--}}
                    
                    
                    
                                   
                                   {!! Form::open(['url'=> '/admin/tags/'.$tag->id, 'method' => 'DELETE', 'style' => 'display:block;', 'id' => 'tag_form_'.$tag->id]) !!}
                                       <input type="hidden" name="tag_id" value="{{$tag->id}}">
                   <button class="button button-md" onclick='return confirm("¿Estas seguro?")' type="submit"><i class="fa fa-remove"></i></button>
      
                                    {!! Form::close() !!}
                    
                    
                    
                    </td>
           </tr>
       @endforeach 
    </tbody>
    
</table>
<div class="text-center">
  {!! $tags->render() !!} 
</div>

     </div>
</div>
     </div>
@endsection