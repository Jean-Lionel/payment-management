<!doctype html>
<html lang="en">
<head>
	<title>LYCEE SAINTE-ESPRIT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/print.min.css')}}">
	@livewireStyles

</head>
<body>
	
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4">
				<h1><a href="/" class="logo">L. DU SAINT ESPRIT</a></h1>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="{{ route('sections.index') }}"><span class="fa fa-home mr-3"></span> Section</a>
					</li>
					<li>
						<a href="{{ route('eleves.index') }}"><span class="fa fa-user mr-3"></span> Eleve</a>
					</li>
					<li>
						<a href="{{ route('paiements.index') }}"><span class="fa fa-briefcase mr-3"></span> Paiment</a>
					</li>
					<li>
						<a href="{{ route('patrimoines.index') }}"><span class="fa fa-sticky-note mr-3"></span>Patrimoines</a>
					</li>
					<li>
						<a href="{{ route('stoks.index') }}"><span class="fa fa-suitcase mr-3"></span> Stock</a>
					</li>
					<li>
						<a href="{{ route('ventes.index') }}"><span class="fa fa-cogs mr-3"></span> Vente</a>
					</li>

					<li>
						<a href="{{ route('rapport') }}"><span class="fa fa-cogs mr-3"></span> Rapport</a>
					</li>
					<li>
						

						<form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf

                                        <button type="submit"><span class="fa fa-paper-plane mr-3"></span> Se deconnecter</button>
                           </form>
					</li>
				</ul>


				

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			@if(session()->has('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
			@endif

			@if(session()->has('error'))
			<div class="alert alert-dange">
				{{ session()->get('error') }}
			</div>
			@endif



			@yield('content')
			
		</div>
	</div>
	
	<script src="{{asset('js/jquery.min.js')}}"></script>

{{-- 	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/print.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	
	@livewireScripts

	@stack('scripts')

</body>
</html>