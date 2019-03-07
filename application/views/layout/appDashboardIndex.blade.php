@extends('dashboard.dashboard')



@section('head')
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="all,follow">
	<title xmlns="">{{$title}}</title>
	<!-- Favicon -->
	<link href="{{$favicon}}" rel="shortcut icon" />
	<!-- Descripcion -->
	<meta name="description" content="{{$description}}"/>
	<!-- Canonical-->
	<link rel="canonical" href="{{base_url()}}" />
	<!-- OG -->
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{$title}}" />
	<meta property="og:description" content="{{$description}}" />
	<meta property="og:url" content="{{base_url()}}" />
	<meta property="og:site_name" content="{{$title}}" />
	<link href="https://fonts.googleapis.com/css?family=Alegreya+SC:400i,500|Alegreya|Alegreya+Sans+SC:300,300i,400,500,700|Lato:300,400,700|Open+Sans:400,700|Quicksand|Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

	<style>
		@media screen {
			#printSection {
				display: none;
			}
		}

		@media print {
			body * {
				visibility:hidden;
			}
			#printSection, #printSection * {
				visibility:visible;
			}
			#printSection {
				position:absolute;
				left:0;
				top:0;
			}
		}printSection
	</style>
@endsection <!--caebza -->
@section('css')
	<link rel="stylesheet" href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="assets/dashboard/css/fontastic.css">
	<!-- Google fonts - Poppins -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="assets/dashboard/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="assets/dashboard/css/custom.css">

@endsection <!--Css -->

@section('header')
	<header class="header">
		<nav class="navbar">
			<!-- Search Box-->
			<div class="search-box">
				<button class="dismiss"><i class="icon-close"></i></button>
				<form id="searchForm" action="#" role="search">
					<input type="search" placeholder="What are you looking for..." class="form-control">
				</form>
			</div>
			<div class="container-fluid">
				<div class="navbar-holder d-flex align-items-center justify-content-between">
					<!-- Navbar Header-->
					<div class="navbar-header">
						<!-- Navbar Brand --><a href="{{base_url(Dashboard::class)}}" class="navbar-brand d-none d-sm-inline-block">
							<div class="brand-text d-none d-lg-inline-block"><span></span><strong>{{$title}}</strong></div>
							<div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>{{$title}}</strong></div></a>
						<!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
					</div>
					<!-- Navbar MenuSections -->
					<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
						<!-- Search-->
						<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
						<!-- Notifications-->
						<li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
							<ul aria-labelledby="notifications" class="dropdown-menu">
								<li><a rel="nofollow" href="#" class="dropdown-item">
										<div class="notification">
											<div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
											<div class="notification-time"><small>4 minutes ago</small></div>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item">
										<div class="notification">
											<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
											<div class="notification-time"><small>4 minutes ago</small></div>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item">
										<div class="notification">
											<div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
											<div class="notification-time"><small>4 minutes ago</small></div>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item">
										<div class="notification">
											<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
											<div class="notification-time"><small>10 minutes ago</small></div>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
							</ul>
						</li>
						<!-- Messages                        -->
						<li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
							<ul aria-labelledby="notifications" class="dropdown-menu">
								<li><a rel="nofollow" href="#" class="dropdown-item d-flex">
										<div class="msg-profile"> <img src="/assets/dashboard/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
										<div class="msg-body">
											<h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item d-flex">
										<div class="msg-profile"> <img src="/assets/dashboard/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
										<div class="msg-body">
											<h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item d-flex">
										<div class="msg-profile"> <img src="/assets/dashboard/img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
										<div class="msg-body">
											<h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
										</div></a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
							</ul>
						</li>
						<!-- Languages dropdown    -->
						<li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="/assets/dashboard/img/flags/16/CO.png" alt="Español"><span class="d-none d-sm-inline-block">Español</span></a>
							<ul aria-labelledby="languages" class="dropdown-menu">
								<!--
								<li><a rel="nofollow" href="#" class="dropdown-item"> <img src="/assets/dashboard/img/flags/16/DE.png" alt="English" class="mr-2">German</a></li>
								<li><a rel="nofollow" href="#" class="dropdown-item"> <img src="/assets/dashboard/img/flags/16/FR.png" alt="English" class="mr-2">French</a></li>
								-->
							</ul>
						</li>
						<!-- Logout    -->
						<li class="nav-item"><a href="/{{Dashboard::class}}/destroy_session" class="nav-link logout"> <span class="d-none d-sm-inline">Cerrar Sesíon</span><i class="fa fa-sign-out"></i></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
@endsection  <!-- Cabecera -->
<!-- nav y footer -->
@section('nav')
	<nav class="side-navbar">
		<!-- Sidebar Header-->
		<div class="sidebar-header d-flex align-items-center">
			<div class="avatar"><img src="{{$img}}" alt="..." id="perfilImg" class="img-fluid rounded-circle"></div>
			<div class="title">
				<h1 class="h4">{{$emailName}}</h1>
				<p>{{$role_name}}</p>
			</div>
		</div>
		<!-- Sidebar Navidation Menus-->
		<span class="heading">Menu</span>
		<ul class="list-unstyled">

			@if (isset($menu))
				@foreach($menu as $row)
					@if($row->type == "2")
						<li>
							@if(isset($row->father))
								@php  $uri = ($row->url[0] == "#" || $row->url == "javascript:void(0);") ? $row->url : base_url($row->url) @endphp

								@if($row->father == "panel")
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif
								@if($row->father == "panel-1" and $role_id == 1)
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif
								@if($row->father == "panel-2" and $role_id == 2)
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif
								@if($row->father == "panel-3" and $role_id == 3)
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif
								@if($row->father == "panel-4" and $role_id == 4)
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif
								@if($row->father == "panel-5" and $role_id == 5)
									<a href="{{$uri}}" onclick="{{$row->function}}" id="menu-panel-{{$row->menu_id}}"> <i class="{{$row->class}}"></i>{{$row->name}}</a>
								@endif

							@endif
						</li>
					@endif
				@endforeach
			@endif
		</ul>
	</nav>
@endsection <!-- Menus -->
@section('footer')

	<footer class="main-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<p>Dev Zeros &copy; 2018</p>
				</div>
				<div class="col-sm-6 text-right">
					<p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Dev Zeros</a></p>
					<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
				</div>
			</div>
		</div>
	</footer>
@endsection  <!-- pie de pagina -->
@section('js')
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<!-- JavaScript files-->
	<script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
	<script src="assets/dashboard/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/dashboard/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="assets/dashboard/vendor/chart.js/Chart.min.js"></script>
	<script src="assets/dashboard/vendor/jquery-validation/jquery.validate.min.js"></script>
	<!--<script src="/assets/dashboard/js/charts-home.js"></script> -->
	<!-- Main File-->
	<script src="assets/dashboard/js/front.js"></script>
	<script src="assets/dashboard/js/charts-custom.js"></script>
	<script src="assets//js/main.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jsPlumb/1.4.1/jquery.jsPlumb-1.4.1-all-min.js'></script>
	<script src="assets/dashboard/js/custom.js"></script>
	<script src="assets/js/notify.js"></script>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


	<script>

		var post = new Post('{{base_url(Dashboard::class)}}');
		var url =  '{{base_url(Dashboard::class)}}';
		var name = '{{$name}}';
		var jefeDpto = '{{$jefeDpto}}';
		var career = '{{$career}}';
		var documents = '{{$persons->document}}';
		var imgData = '{{$favicon}}';

		$(document).ready(function () {
			$(".bg_load").fadeOut("slow");
			$(".wrapper").fadeOut("slow");
		});

		function loadingAjax() {
			$(".page").css("display","none");
			$(".loaders").css("display","block");
			$(".bg_load").fadeIn("slow");
			$(".wrapper").fadeIn("slow");
		}

		function stopLoadingAjax() {
			$(".bg_load").fadeOut("slow");
			$(".wrapper").fadeOut("slow");
			$(".loaders").css("display","none");
			$(".page").css("display","block");
		}

		function cargarMateria(){
			if(confirm("Las materias existenten seran reseteadas con los nuevos datos")){
				confirmar("","Si aceptas los datos seran reseteados","/apiMatters",{},"error");
				post.$data = undefined;
				loadingAjax();
				var refreshIntervalId = setInterval(function () {
					if(post.$sendPost.getPost() != undefined){
						stopLoadingAjax();
						clearInterval(refreshIntervalId)
						Swal.fire('Informacion!', post.$sendPost.getPost().data+' Materias Cargadas con exitos!', 'success')
					}
				},1000)
			}
		}
		function cargarEstudiantes() {
			if(confirm("Las Estudiantes existenten seran reseteadas con los nuevos datos")){
				confirmar("","Si aceptas los datos de los estudiantes seran reseteados, esto puede tardar unos segundos","/apiUsers",{},"error");
				post.$data = undefined;
				var refreshIntervalId = setInterval(function () {
					loadingAjax();
					if(post.$sendPost.getPost() != undefined){
						stopLoadingAjax();
						clearInterval(refreshIntervalId);
						clearInterval(c);
						var data = post.$sendPost.getPost().data;
						Swal.fire('Informacion!',data["users"]+" Estudiantes agregados y"+" "+data["notes"]+' Notas de estudiantes insertadas !', 'success')
					}
				},2000)
			}
		}

	</script>
@endsection <!--js -->
