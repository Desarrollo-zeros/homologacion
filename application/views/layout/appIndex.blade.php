
@extends('landing.index')


@section('head')
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="all,follow">
	<!-- Titulo Web-->
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
@endsection


@section('css')
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{$bootstrap}}">
	<!-- CSS -->
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<style id='ez-toc-inline-css' type='text/css'>
		div#ez-toc-container p.ez-toc-title {font-size: 120%;}div#ez-toc-container p.ez-toc-title {font-weight: 500;}div#ez-toc-container ul li {font-size: 100%;}div#ez-toc-container {background: #fff;border: 1px solid #ddd;}div#ez-toc-container p.ez-toc-title {color: #999;}div#ez-toc-container ul.ez-toc-list a {color: #64bbf4;}div#ez-toc-container ul.ez-toc-list a:hover {color: #1585d0;}div#ez-toc-container ul.ez-toc-list a:visited {color: #1585d0;}
	</style>
	<link rel='stylesheet' id='contact-form-7-css'  href='assets/landing/css/styles.css' type='text/css' media='all' />
	<link rel='stylesheet' id='cookie-notice-front-css'  href='assets/landing/css/front.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='wpml-legacy-horizontal-list-0-css'  href='assets/landing/css/style.css' type='text/css' media='all' />
	<link rel="stylesheet" href="assets/landing/css/style1.css">
	<link rel="stylesheet" type="text/css" href="assets/landing/modal-video/css/modal-video.min.css">
	<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

@endsection

@section('js')
	<script type="text/javascript">
		window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"assets/landing/js/wp-emoji-release.min.js?ver=4.9.8"}};
		!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
	</script>
	<script type='text/javascript' src='assets/landing/js/jquery.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery-migrate.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/front.min.js'></script>

	<script type='text/javascript'>
		/* <![CDATA[ */
		var cnArgs = {"ajaxurl":"Proyect/admin_ajax","hideEffect":"fade","onScroll":"no","onScrollOffset":"100","cookieName":"cookie_notice_accepted","cookieValue":"true","cookieTime":"2592000","cookiePath":"\/","cookieDomain":"","redirection":"","cache":"1","refuse":"no","revoke_cookies":"0","revoke_cookies_opt":"automatic","secure":"1"};
		/* ]]> */
	</script>

	<script type='text/javascript' src='assets/landing/js/jquery-ui.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.sticky-kit.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.sticky.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.ui.touch-punch.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.fancybox.pack.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.easing-1.3.pack.js'></script>
	<script type='text/javascript' src='assets/landing/js/jquery.mousewheel-3.0.4.pack.js'></script>
	<script type='text/javascript' src='assets/landing/js/slick.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/wp-embed.min.js'></script>
	<script type='text/javascript' src='assets/landing/js/common.js'></script>
	<script type='text/javascript' src='assets/landing/js/frontpage.js'></script>
	<script src="//static.getclicky.com/js" type="text/javascript"></script>
	<script type="text/javascript">try{ clicky.init(100629274); }catch(e){}</script>
	<script src="assets/landing/modal-video/js/modal-video.js"></script>
	<script src="assets/js/notify.js"></script>
@endsection





@section('header')
	<style>
		.header {
			background: rgba(255, 255, 255, 0) !important;
			color: white!important;
			height: 80px!important;

			width: 100%!important; /* hacemos que la cabecera ocupe el ancho completo de la página */
			left: 0!important; /* Posicionamos la cabecera al lado izquierdo */
			top: 0!important;/* Posicionamos la cabecera pegada arriba */
			position: fixed!important; /* Hacemos que la cabecera tenga una posición fija */
		}
	</style>
	<header>
		<div class="rich-snippet">
			<span itemprop="position">1</span>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a id="top-logo" href="{{base_url()}}">
						<img src="assets/landing/imagen/logo.png" width="130" height="40" />
					</a>

					<a class="loke-menu-icon" id="menu-toggle" href="#">
						<span></span>
						<span></span>
						<span></span>
					</a>

					<div class="menu-expandable">
						<div class="menu-wrapper">
							<ul id="menu-top-menu-es" class="menu">
								@if (isset($menu))
									@foreach ($menu as $row)
										@if($row->type == 1)
											@if($row->space > 0)
												@for ($i = 0; $i <= $row->space; $i++)<li></li>@endfor
											@endif
											@php  $uri = ($row->url[0] == "#") ? $row->url : base_url($row->url) @endphp
											@if($row->father == "index")
												@if(!empty($row->video))
													<li class="menu-item-has-children">
														<a class="videoModal" id="menu-id-{{$row->menu_id}}" data-video-id="{{$row->video}}" onclick="return {{$row->function}}" href="{{$uri}}">{{$row->name}}</a>
													</li>
												@else
													<li class="menu-item-has-children">
														<a class="" id="menu-id-{{$row->menu_id}}" onclick="return {{$row->function}}" href="{{$uri}}">{{$row->name}}</a>
													</li>
												@endif
											@endif
											@if(isset($user_id))
												@if($row->father == "online")
													<li class="menu-item-has-children">
														<a class="" id="menu-id-{{$row->menu_id}}" onclick="return {{$row->function}}" href="{{$uri}}">{{$row->name}}</a>
													</li>
												@endif
											@else
												@if($row->father == "offline" && !isset($user_id))
													<li class="menu-item-has-children">
														<a class="" id="menu-id-{{$row->menu_id}}" onclick="return {{$row->function}}" href="{{$uri}}">{{$row->name}}</a>
													</li>
												@endif
											@endif
										@endif
									@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
@endsection

@section('jumbotron')
	<section class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="wrapper">
						<div class="aligner">
							<h1 class="title">¿Buscamos facilitar la transición de tu plan de estudio?</h1>
							<p>Si usas Nuestro servicio web no te harán falta conocimientos técnicos. Nuestros análisis te ahorrarán tiempo.</p>

							<div class="img-wrapper">
								<img class="img-responsive" id="header-top-picture" src="https://2j9zen46cyp13k47i01s551m-wpengine.netdna-ssl.com/wp-content/themes/tooltester-child/images/front-page/hero/header-top.png" alt="website builder search" />
							</div>
							<div class="btn-wrapper">
								@if(isset($this->session->user_id))
									<a href="#" onclick="window.location.href = 'http://zeros.com/dashboard';" class="btn btn-lg btn-primary">Panel</a>
								@else
									<a href="#" onclick="return modalLogin();" class="btn btn-lg btn-primary">Iniciar Sesíon</a>
								@endif
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="arrow-wrapper">
			<a href="#" id="arrow-down">
				<i class="icon-chevron-down"></i>
			</a>
		</div>
	</section>
@endsection


@section('informacion')
	<section id="help">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 class="title underline">¿Cómo Funciona?</h2>
				</div>
				<div class="col-txt col-sm-4 text-center">
					<a href="#" class="top-links">
						<img src="assets/landing/imagen/book.png" alt="create a website" />
					</a>
					<h3 class="title">
						<a  href="#">Titulo</a>
					</h3>
					<div class="text-wrapper">
						<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem cumque dicta dolores ea impedit laborum molestias mollitia nobis odit omnis rem unde ut, voluptas voluptate. Dicta et libero nemo.</span></p>
					</div>
					<p>
						<a href="#" class=" read-more">Leer el ebook</a>
					</p>
				</div>
			</div>
		</div>
	</section>
@endsection


@section('noticias')

	<section id="who-we-are" >
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 class="title underline">Noticias</h2>
				</div>
				<div class="col-txt col-sm-12 text-center">
					<div class="row one-ov-us">
						<div class="col-sm-3 col-img text-center">
							<img src="assets/landing/imagen/team/author1.png" alt="Robert Brandl" />
						</div>
						<div class="col-sm-8">
							<div class="text-wrapper">
								<h3>Dev Zeros</h3>
								<p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum non numquam odit praesentium, quaerat sunt suscipit? Aspernatur cum distinctio ipsa maxime nemo, quod recusandae? Eos exercitationem mollitia possimus tempora vitae?</p>
								<p>&nbsp;</p>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection


@section('infoUpc')
	<section id="mentioned">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="wrapper">
						<h3 class="title">Universidad Popular Del Cesar</h3>

						<div class="img-wrapper">
							<img src="assets/landing/imagen/logoUPC.png" width="200" >
							<img src="assets/landing/imagen/Escudo_oficial.gif" width="100" >
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section('footer')

	<div id="cookie-notice" role="banner" class="cn-bottom bootstrap" style="color: #fff; background-color: #000;"><div class="cookie-notice-container"><span id="cn-notice-text">Usamos cookies para asegurarnos que te damos la mejor experiencia posible en nuestra página web.</span><a href="#" id="cn-accept-cookie" data-cookie-set="accept" class="cn-set-cookie  bootstrap">OK</a>
		</div>
	</div><!-- clicky -->

	<footer itemscope itemtype="https://schema.org/WPFooter" id="white-footer">
		<div class="rich-snippet">
			<span itemprop="position">3</span>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-logo">
					<a href="#">
						<img src="assets/landing/imagen/logo.png" width="150" height="50" />
					</a>
					<p class="copyright">
						© 2018  Dev-Zeros
					</p>
				</div>
				<div class="col-md-6 text-center">
					<ul id="menu-footer-menu-es" class="menu">
						<li id="menu-item-12861" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12861">
							<a href="#">Sobre nosotros</a>
						</li>
						<li id="menu-item-12860" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12860">
							<a href="#">Aviso legal y política de privacidad</a>
						</li>
						<li id="menu-item-14396" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14396">
							<a href="#">Contacto</a>
						</li>
					</ul>
					<hr class="hr-very-short"/>
					<div class="icons-wrapper">
						<a target="_blank"  href="#">
							<i class="icon-facebook"></i>
						</a>
						<a target="_blank"  href="#">
							<i class="icon-twitter" ></i>
						</a>
						<a target="_blank"  href="#">
							<i class="icon-youtube-play"></i>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-image">
					<div class="img-wrapper">
						<img src="https://2j9zen46cyp13k47i01s551m-wpengine.netdna-ssl.com/wp-content/themes/tooltester-child/images/layout/footer_guy.png" alt="I love drag'n drop!" />
					</div>
				</div>
			</div>
		</div>
	</footer>
@endsection


@section('modalLogin')

	<style>
		body{
			font-family: 'Barlow Semi Condensed', sans-serif;
		}
		.main-section{
			margin: 0 auto;
			margin-top:100px;
			background-color: #fff;
			border-radius: 5px;
			padding: 0px;
		}
		.user-img{
			margin-top:-50px;
		}
		.user-img img{
			height: 100px;
			width: 100px;
		}
		.user-name{
			margin:10px 0px;
		}
		.user-name h1{
			font-size:30px;
			color:#676363;
		}
		.user-name button{
			position: absolute;
			top:-50px;
			right:20px;
			font-size:30px;
		}
		.form-input button{
			width: 100%;
			margin-bottom: 20px;
		}
		.link-part{
			border-radius:0px 0px 5px 5px;
			background-color: #ECF0F1;
			padding:15px;
			border-top:1px solid #c2c2c2;
		}
		.open-modal{
			margin-top:100px !important;
		}

		.modal{
			left: 15%!important;
		}

		@media screen and (max-width: 1000px){
			.modal{
				left: 0%!important;
			}
		}


		.loader {
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid blue;
			border-right: 16px solid green;
			border-bottom: 16px solid red;
			border-left: 16px solid pink;
			width: 50px;
			height: 50px;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
		}

		@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}

	</style>


	<div id="modalLogin" class="modal fade text-center">
		<div class="modal-dialog">
			<div class="col-lg-8 col-sm-8 col-12 main-section">
				<div class="modal-content">
					<div class="col-lg-12 col-sm-12 col-12 user-img">
						<img src="assets/landing/imagen/team/author1.png">
					</div>
					<div class="col-lg-12 col-sm-12 col-12 user-name">
						<button id="closeModal" type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="col-lg-12 col-sm-12 col-12 form-input">

							<form id="formLogin" name="formLogin">
								<div class="form-group">
									<p><h3>Iniciar Sesíon</h3></p>
									<div class="loader" style="position: relative;left: 45%; display:none;"></div>
								</div>
								<div class="form-group">
									<div class="errorForm"></div>
								</div>
								<div class="form-group">
									<input type="text" id="username" name="username" class="form-control" placeholder="Introduzca Correo o Cedula" required="required" minlength = "8" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$|.{8}|.{10}">
								</div>
								<div class="form-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Introduzca Contraseña" required="required" minlength = "5">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success  btn-sm" value="Iniciar Sesíon">
								</div>
							</form>
							<form id="formRecovery" name="formRecovery" style="display: none">
								<div class="form-group">
									<p><h3>Recuperar Contraseña</h3></p>
									<div class="loader" style="position: relative;left: 45%; display:none;"></div>
								</div>
								<div class="form-group">
									<div class="errorForm"></div>
								</div>
								<div class="form-group">
									<input type="text" id="usernameRecory" name="usernameRecory" class="form-control" placeholder="Introduzca Correo o Cedula" required="required" minlength = "8" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$|.{8}|.{10}">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-info  btn-sm" value="Recuperar Contraseña">
								</div>
							</form>

					</div>
					<div class="col-lg-12 col-sm-12 col-12 link-part" id="recoveryLogin">
						<a id="recoryPassword" onclick="return recoryPassword();">¿Olvidaste tu contraseña?</a>
					</div>
					<div class="col-lg-12 col-sm-12 col-12 link-part" id="loginRecovery">
						<a id="volverLogin">Volver</a>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection

@section('eventos')
	<script src="assets/js/main.js"></script>
	<script src="assets/landing/js/eventos/modal.js"></script>
	<script src="assets/landing/js/eventos/formularios.js"></script>
@endsection


