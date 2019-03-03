@extends('layouts.auth.auth')

@section('content')
	<main class="auth">
		<header id="auth-header" class="auth-header">
			<h1>
				<img src="/images/brand-inverse.png" alt="" height="72"> <span class="sr-only">Sign In</span>
			</h1>
			<p>
				Already have an account? please
				<a href="auth-signin-v1.html">Sign In</a>
			</p>
		</header>
		<!-- form -->
		<login-form action="{{ route('auth.login') }}"></login-form>

		<!-- /.auth-form -->
		<!-- copyright -->
		<footer class="auth-footer"> © {{ date('Y') }} All Rights Reserved. </footer>
	</main>
@endsection