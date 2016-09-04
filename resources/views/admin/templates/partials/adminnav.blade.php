
<div class="col-md-12 col-xs-12">
<div class="container-fluid text-center">

<a href=" {{ route('admin.users.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Usuarios</h2>
</div>
</a>

<a href="{{ route('admin.articles.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Artículos</h2>
</div>
</a>

<a href=" {{ route('admin.clients.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Clientes</h2>
</div>
    </a>
    
<a href=" {{ route('admin.files.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Archivos</h2>
</div>
    </a>

<a href=" {{ route('admin.categories.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Áreas</h2>
</div>
    </a>
    
    <a href="{{ route('admin.messages.index')}}">
<div class="col-md-2 col-xs-3">
<h2>Mensajes <span class="badge">{{$unread}}</span></h2>
</div>
    </a>
    
  

 

</div>
</div>