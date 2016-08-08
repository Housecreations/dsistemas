<!--<div class='barra'> 
<div class="partnerWrap">
        <div class="slideshow" 
            data-cycle-fx=carousel
            data-cycle-timeout=3000
            data-cycle-carousel-visible=4
            data-cycle-next="#next"
            data-cycle-prev="#prev"
            data-cycle-carousel-fluid=true
            >
            <img alt="partner 1" src="{{ asset('images/partners/partner1.jpg') }}" >
            <img alt="partner 2" src="{{ asset('images/partners/partner2.jpg') }}" >
            <img alt="partner 3" src="{{ asset('images/partners/partner3.jpg') }}" >
            <img alt="partner 4" src="{{ asset('images/partners/partner4.jpg') }}" >
            <img alt="partner 5" src="{{ asset('images/partners/partner5.jpg') }}" >
            <img alt="partner 6" src="{{ asset('images/partners/partner6.jpg') }}" >
          
        </div>
       
      </div> -->
       

       
       
       <div class="responsive_menu">
        <ul class="main_menu">
            <li><a href="/">Inicio</a></li>
					            <li><a href="/QuienesSomos">Quiénes somos</a>
                                    <li><a href="#">Productos</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		<li><a href="/articulos/{{$category->name}}">{{$category->name}}</a></li>
					            		
                                        @endforeach
					            	</ul>
					            </li>
					            
					            <li><a href="#">Descargas</a>
					            <li><a href="{{ route('contact')}}">Contacto</a></li>
                                
                                
                                
                                
                                
                                 @if(Auth::user())
                                 <li><a href="#">{{Auth::user()->name}}</a>
					            	<ul>
					            		<li><a href="{{ route('admin.index')}}">Panel de control</a></li>
					            		<li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
					            		
					            	</ul>
					            </li>
                                
                                @else
                                 <li><a href="{{route('admin.auth.login')}}">Iniciar sesión</a></li>
                                @endif
                                
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->

	<header class="site-header clearfix">
		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="pull-left logo">
						<a href="index.html">
							<img src="{{asset('images/logo.png')}}" alt="Medigo by templatemo">
						</a>
					</div>	<!-- /.logo -->

					<div class="main-navigation pull-right">

						<nav class="main-nav visible-md visible-lg">
							<ul class="sf-menu">
								<li><a href="/">Inicio</a></li>
					            <li><a href="/QuienesSomos">Quiénes somos</a>
                                    <li><a href="#">Productos</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		<li><a href="/articulos/{{$category->name}}">{{$category->name}}</a></li>
					            		
                                        @endforeach
					            	</ul>
					            </li>
					            
					            <li><a href="#">Descargas</a>
					            <li><a href="{{ route('contact')}}">Contacto</a></li>
                                
                                
                                
                                
                                
                                 @if(Auth::user())
                                 <li><a href="#">{{Auth::user()->name}}</a>
					            	<ul>
					            		<li><a href="{{ route('admin.index')}}">Panel de control</a></li>
					            		<li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
					            		
					            	</ul>
					            </li>
                                
                                @else
                                 <li><a href="{{route('admin.auth.login')}}">Iniciar sesión</a></li>
                                @endif
                                
                                
                                
                                
							</ul> <!-- /.sf-menu -->
						</nav> <!-- /.main-nav -->

						<!-- This one in here is responsive menu for tablet and mobiles -->
					    <div class="responsive-navigation visible-sm visible-xs">
					        <a href="#nogo" class="menu-toggle-btn">
					            <i class="fa fa-bars"></i>
					        </a>
					    </div> <!-- /responsive_navigation -->

					</div> <!-- /.main-navigation -->

				</div> <!-- /.col-md-12 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->
	</header> <!-- /.site-header -->



   <!-- <div class="col-md-6 left-nav">
<form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term">           
          </div>
        </form>
     
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="#" >Redes</a></li>
            <li><a href="data-visualization.html">Páginas webs</a></li>
            <li><a href="data-visualization.html">Máquinas fiscales</a></li>
            <li><a href="maps.html">Social Media</a></li>
            <li><a href="manage-users.html">Software administrativo</a></li>
            
          </ul>  
        </nav>
</div>

-->

            