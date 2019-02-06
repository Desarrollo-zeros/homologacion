<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	@yield('head')
	@yield('css')
</head>
<body class="home page-template-default page page-id-9298 cookies-not-set">
	@yield('header')
	@yield('jumbotron')
	@yield('informacion')
	@yield('noticias')
	@yield('infoUpc')
	@yield('footer')
	@yield('modalLogin')
</body>
@yield('js')


<script>
	$ = jQuery; //inicializo Jquery in $
	$urlAjax = '{{$urlAjax}}';
	$token = '{{$token}}';
</script>

@yield('eventos')

@if(isset($_GET["status"]))
	@if($_GET["status"] == "ok")
	<script>
		$.notify("contraseña actualizada, por favor revisar su correo electronico","success");
	</script>
	@else
		<script>
			$.notify("token no coincide","error");
		</script>
	@endif
@endif

</html>
