<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- End Required meta tags -->
		<!-- Begin SEO tag -->
		<title> Dashboard </title>
		<link rel="shortcut icon" href="/images/favicon.ico">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<div id="app">
			<!-- .app -->
			<div class="app">
				<!-- .app-header -->
				@include('layouts.dashboard.partials._header')
				<!-- /.app-header -->
				<!-- .app-aside -->
				@include('layouts.dashboard.partials._aside')
				<!-- /.app-aside -->
				<!-- .app-main -->
				<main class="app-main">
					<!-- .wrapper -->
					<div class="wrapper">
						@yield('content')
					</div>
					<!-- /.wrapper -->
				</main>
				
				<!-- /.app-main -->
			</div>
			<!-- /.app -->
			<!-- BEGIN BASE JS -->
		</div>

		<script src="{{ asset('js/pace.min.js') }}"></script>
		<script src="{{ asset('js/stacked-menu.min.js') }}"></script>
		<script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>

	</body>
</html>