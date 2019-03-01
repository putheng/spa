@extends('layouts.auth.auth')

@section('content')
	<main class="auth">
		<header id="auth-header" class="auth-header">
			<h1>
				<img src="/images/brand-inverse.png" alt="" height="72"> <span class="sr-only">Sign Up</span>
			</h1>
			<p>
				Already have an account? please
				<a href="auth-signin-v1.html">Sign In</a>
			</p>
		</header>
		<!-- form -->
		<app-form action="/api/register">
			
			<!-- .form-group -->
			<div class="form-group text-center">
				<div class="custom-control custom-control-inline custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="newsletter">
					<label class="custom-control-label" for="newsletter">
						Sign me up for the newsletter
					</label>
				</div>
			</div>
			<!-- /.form-group -->

			<!-- recovery links -->
			<p class="text-center text-muted mb-0">
				By creating an account you agree to the
				<a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
			</p>
		</app-form>
		<!-- /.auth-form -->
		<!-- copyright -->
		<footer class="auth-footer"> © {{ date('Y') }} All Rights Reserved. </footer>
	</main>
@endsection