<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Flor de Liz</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../resources/assets/css/style.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!--Lib Chartist  -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
	<!--Lib jquery -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
	<div id="page">
		<section id="header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="{{ url('/') }}">Flor de Liz</a>
					</div>

					<div class="collapse navbar-collapse" id="navbar">
						<ul class="nav navbar-nav">
							<li class="hidden-xs"><a href="{{ url('/') }}">Página Inicial</a></li>
							@can('Area-Admin',\FlorDeLiz\Models\User::class)
							<li><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
							<li><a href="{{ route('admin.clients.index') }}">Clientes</a></li>
							<li><a href="{{ route('admin.products.index') }}">Produtos</a></li>
							<li><a href="{{ route('admin.orders.index') }}">Pedidos</a></li>
							<li><a href="{{ route('admin.cupoms.index') }}">Cupoms</a></li>
							<li><a href="{{ route('admin.productions.index') }}">Produção</a></li>
							<li><a href="#">Usuários</a></li>
							{{--@endcan--}}
							{{--@can('Cliente',\FlorDeLiz\Models\User::class)--}}

							@endcan

						</ul>
						<ul class="nav navbar-nav navbar-center welcome-msg hidden-xs hidden-sm">
						
							<li><a href="">Seja bem vindo:  <strong><span class="login-user">{{ empty(auth()->user()->name) ? 'Visitante' : auth()->user()->name }}</span></strong></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						
							<li><a href="{{ url('/auth/register') }}">Cadastro</a></li>	@if(auth()->guest()) @if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							@endif @if(!Request::is('auth/register'))

							@endif @else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Meu Profile <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Meus Dados</a></li>
									<li><a href="#">Meus Pedidos</a></li>
									<li><a href="#">Configuração</a></li>
									<li><a href="{{ url('/auth/logout') }}">Sair</a></li>
								</ul>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
		</section>

		@yield('content')
	</div>
	<!-- Scripts -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
@yield('post-script')
</body>

</html>