
<div class="col-md-12 col-xs-12 nav-admin text-center">



<div class="col-md-1 col-xs-3 admin-nav">
<a href=" {{ route('admin.users.index')}}">
<h2>Usuarios</h2>
</a>
</div>



<div class="col-md-1 col-xs-3 admin-nav">
<a href="{{ route('admin.articles.index')}}">
<h2>Artículos</h2>
</a>
</div>

<div class="col-md-1 col-xs-3 admin-nav">
<a href=" {{ route('admin.categories.index')}}">
<h2>Áreas</h2>
</a>
</div>

<div class="col-md-1 col-xs-3 admin-nav">
<a href=" {{ route('admin.clients.index')}}">
<h2>Clientes</h2>
   </a>
</div>
 
    

<div class="col-md-1 col-xs-3 admin-nav">
<a href=" {{ route('admin.files.index')}}">
<h2>Archivos</h2>
</a>
</div>
    
    

<div class="col-md-1 col-xs-3 admin-nav">
<a href=" {{ route('admin.outlet.index')}}">
<h2>Descuentos</h2>
</a>
</div>
    



    
    

<div class="col-md-1 col-xs-3 admin-nav">
    <a href="{{ route('admin.messages.index')}}">
<h2>Mensajes <span class="badge">{{$unread}}</span></h2>
 </a>
</div>
   
    
  

 


</div>