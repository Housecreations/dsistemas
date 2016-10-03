@extends('admin.templates.principal')


@section('title', 'Lista de usuarios')


@section('content')

 <div class="">    

<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">
        

<a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
<a href="{{ route('admin.users.create')}}" class="button button-md">Registrar nuevo usuario</a>
<hr>



<!-- Buscador de usuarios -->
<div>
{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
    
    <div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar usuario...', 'aria-describedby' => 'searchUsers']) !!}
    
    <span class="input-group-addon" id="searchUsers"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
    </div>
</div>
{!! Form::close() !!}
<!-- Fin buscador de usuarios -->

<div>
<table class='table table-hover'>
    
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
       
        <th>Acción</th>
    </thead>
    <tbody>
       @foreach($users as $user)
           <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               
               
               
                 <td>
                <a href="{{ route('admin.users.edit', $user->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
               
           </tr>
       @endforeach 
    </tbody>
    
</table>
<div class="text-center">
    {!! $users->render() !!}
</div>
     </div>

     </div>
</div>
@endsection