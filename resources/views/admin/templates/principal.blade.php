<!DOCTYPE html>
<html lang="es">
<head>
<title>@yield('title', 'Default')</title>




<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <meta name="keywords" content="a2 softway, maquina fiscal">
	<meta name="description" content="Aquí encontrarás el mejor software administrativo y las mejores máquinas fiscales para tu empresa">
    <meta name="author" content="housecreations">
    <meta name="owner" content="D'sistemas y PC, C.A.">
    
    
	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">

<link rel="stylesheet" href="{{ asset('css/blue-scheme.css')}}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css')}}">
	
	
	<!-- JavaScripts -->
	<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
		<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.js') }}"></script> 
   
	

</head>

<body style="">
<div id="preloader">
    <div id="loader"></div>
</div>
<!--==============================
              header
=================================-->


    @include('admin.templates.partials.nav') 
    
 
 
<!--=====================
          Content
======================-->
<section id="" class="">
  
    
     
        @include('flash::message')
        @include('admin.templates.partials.errors')
      
        
  
        @yield('content')
     
    
    
</section>

<!--==============================
              footer
=================================-->
<!-- Socialize -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="social-icon wow fadeIn" data-wow-delay="0.3s">
						<li><a href="#" class="fa fa-facebook"></a></li>
						<li><a href="#" class="fa fa-twitter"></a></li>
						<li><a href="#" class="fa fa-instagram"></a></li>
					</ul>
					<p class="wow bounceIn">Copyright 2016 &copy; <span>D'Sistemas Y PC, CA.</span> 
                    | Desarrollado por: <a rel="nofollow" href="http://www.housecreations.com.ve" target="_blank"><span class="hc">House Creations</span></a></p>
				</div>
			</div>
		</div>
	</footer>


<script src="{{ asset('js/min/plugins.min.js') }}"></script>
<script src="{{ asset('js/medigo-custom.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cycle2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.cycle2.carousel.min.js') }}"></script>
     <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
     
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    
     <script src="js/jquery.nivo.slider.pack.js"></script>
   
    <script>
$('div.alert').not('.alert-important').delay(2000).slideUp(350);
</script>
 
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            pauseTime: 6000,
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>

</body>
</html>