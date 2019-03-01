<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- End Required meta tags -->
		<!-- Begin SEO tag -->
		<title> Sign Up</title>

		<!-- Favicons -->
		<link rel="shortcut icon" href="/images/favicon.ico">
		<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<div id="app">
			@yield('content')
		</div>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script>
			$(document).on('theme:init', () => {
			  particlesJS.load('auth-header', '{{ asset('js/particles.json') }}');
			})
		</script>
	</body>
</html>