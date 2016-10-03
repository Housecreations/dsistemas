@extends('admin.templates.productos')
 @if(sizeof($files)==0)
     @section('title', 'No se encontraron archivos') 
 @else
     @section('title', 'Descargas') 
 @endif


@section('content') 
   <div class="col-md-1"></div>
   <div class="items col-md-10"> 
   
      
    @if(sizeof($files)==0)
        <ol class="breadcrumb bc text-center">
        <li><a href="/">Inicio</a></li>

  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron archivos</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    <li class="active">Descargas</li>
  
</ol>

          
    @foreach($categories as $category)
   
    @if(count($category->files) > 0)
    <hr>
    <h2>{{$category->name}}</h2>
    <hr>
    @endif
     @foreach($category->files as $file)
      
     
  
    
    <div class="">
    
    <div>
    <h4><i class="fa fa-file"></i> {{$file->name}} v{{$file->version}} - <a href="{{route('files.downloads.get', $file->file_url)}}"> <i class="fa fa-download"></i></a> ({{$file->size}} Mb)
   </h4> 
   </div>
    
    </div>
     
   
    
    @endforeach
    
    @endforeach
  
  @endif
  
   </div>
   
@endsection