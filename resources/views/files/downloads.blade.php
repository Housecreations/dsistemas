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
    <hr>
    <h2>{{$category->name}}</h2>
    <hr>
    
     @foreach($files as $file)
     
    @if($file->category->name == $category->name ) 
    
    <div class="">
    
    <span>{{$file->name}} - <a href="{{route('files.downloads.get', $file->file_url)}}"> Descargar</a></span>
   
    </div>
     
    @endif
    
    @endforeach
    
    @endforeach
  
  @endif
  
   </div>
   
@endsection