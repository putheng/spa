<header class="app-header app-header-dark">
	<!-- .top-bar -->
	<div class="top-bar">
		<!-- .top-bar-brand -->
		<div class="top-bar-brand">
			<a href="index.html"><img src="/images/brand-inverse.png" alt="" style="height: 32px;width: auto;"></a>
		</div>
		<!-- /.top-bar-brand -->
		<!-- .top-bar-list -->
		<div class="top-bar-list">
			<!-- .top-bar-item -->
			<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
				<!-- toggle menu -->
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
			</div>
			<!-- /.top-bar-item -->
			<!-- .top-bar-item -->
			<div class="top-bar-item top-bar-item-full">
				<!-- .top-bar-search -->
				<form class="top-bar-search">
					<div class="input-group input-group-search">
						<div class="input-group-prepend">
							<span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
						</div>
						<input type="text" class="form-control" aria-label="Search" placeholder="Search">
					</div>
				</form>
				<!-- /.top-bar-search -->
			</div>
			<!-- /.top-bar-item -->
			<!-- .top-bar-item -->
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				<!-- .nav -->
				<ul class="header-nav nav">
					@include('layouts.dashboard.partials._activity')

					@include('layouts.dashboard.partials._message')
					
					@include('layouts.dashboard.partials._app_com')
				</ul>
				<!-- /.nav -->
				<!-- .btn-account -->
				<div class="dropdown">
					<button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="user-avatar user-avatar-md">
							<img src="/images/profile.jpg" alt=""></span>
							<span class="account-summary pr-lg-4 d-none d-lg-block">
								<span class="account-name">{{ $user->username }}</span>
								<span class="account-description">Supper Admin</span>
							</span>
					</button>
					<div class="dropdown-arrow dropdown-arrow-left"></div>
					<!-- .dropdown-menu -->
					<div class="dropdown-menu">
						<h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6>
						<a class="dropdown-item" href="user-profile.html">
							<span class="dropdown-icon oi oi-person"></span>
							Profile
						</a>

						<a class="dropdown-item" href="{{ route('logout') }}"
                               	onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
							<span class="dropdown-icon oi oi-account-logout"></span>
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" 
							method="POST" style="display: none;">
                            @csrf
                        </form>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Help Center</a>
						<a class="dropdown-item" href="#">Ask Forum</a>
						<a class="dropdown-item" href="#">Keyboard Shortcuts</a>
					</div>
					<!-- /.dropdown-menu -->
				</div>
				<!-- /.btn-account -->
			</div>
			<!-- /.top-bar-item -->
		</div>
		<!-- /.top-bar-list -->
	</div>
	<!-- /.top-bar -->
</header>