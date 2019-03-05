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
		<app-form action="{{ route('auth.login') }}" redirect="{{ route('dashboard.index') }}">

			<app-input type="text" name="Email"></app-input>

			<app-input type="password" name="Password"></app-input>

			<app-button type="submit">Login</app-button>
		</app-form>

		<!-- /.auth-form -->
		<!-- copyright -->
		<footer class="auth-footer"> © {{ date('Y') }} All Rights Reserved. </footer>
	</main>
@endsection