<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@yield('head')
	@yield('css')
</head>
<body>
<div class="page">
	@yield('header')
	<div class="page-content d-flex align-items-stretch">
		@yield('nav')
		<div class="content-inner">
			<header class="page-header">
				<div class="container-fluid">
					<h2 class="no-margin-bottom">Bienvenido {{$name}}</h2>
				</div>
			</header>
			@if(isset($section))
				@foreach($section as $row)
					@yield($row->name)
				@endforeach
			@endif
		@yield('footer')
		</div>
	</div>
</div>
@yield('js')
</body>
</html>

