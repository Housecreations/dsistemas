@extends('admin.templates.principal')


@section('title', 'Lista de tags')


@section('content')

 <div class="">
   <div class="container-fluid users">
<div class="col-md-3"></div>
<div class="col-md-6 card">

    <a href="{{ route('admin.index')}}" class="button">Atrás</a>
     <a href="{{ route('admin.tags.create') }}" class='button'>Nuevo tag</a>



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
                <a href="{{ route('admin.tags.edit', $tag->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
                    
                    
          {{-- <a href="{{ route('admin.tags.destroy', $category->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>--}}
                    
                    
                    <a href="{{ url('/admin/tags/'.$tag->id) }}"
                                        onclick="event.preventDefault();
                                                 
                                                 return confirm('Seguro que deseas eliminarlo?');
                                                 document.getElementById('tag_form_{{$tag->id}}').submit();">
                                        <span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span>
                                    </a>
                                   
                                   {!! Form::open(['url'=> '/admin/tags/'.$tag->id, 'method' => 'DELETE', 'style' => 'display:none;', 'id' => 'tag_form_'.$tag->id]) !!}
                                       <input type="hidden" name="tag_id" value="{{$tag->id}}">
                                       <input type="submit">
      
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