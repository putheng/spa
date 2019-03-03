<aside class="app-aside app-aside-expand-md app-aside-light">
	<!-- .aside-content -->
	<div class="aside-content">
		<!-- .aside-header -->
		@include('layouts.dashboard.partials._aside_header')
		<!-- /.aside-header -->
		<!-- .aside-menu -->
		<div class="aside-menu overflow-hidden">
			<!-- .stacked-menu -->
			<nav id="stacked-menu" class="stacked-menu">
				<!-- .menu -->
				<ul class="menu">
					<!-- .menu-item -->
					<li class="menu-item">
						<a href="{{ route('dashboard.index') }}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
					</li>
					<!-- /.menu-item -->
					@include('layouts.dashboard.partials._menu_item')
				</ul>
				<!-- /.menu -->
			</nav>
			<!-- /.stacked-menu -->
		</div>
		<!-- /.aside-menu -->
		<!-- Skin changer -->
		<footer class="aside-footer border-top p-3">
			<span>© {{ date('Y') }} ALL right reserved</span>
		</footer>
		<!-- /Skin changer -->
	</div>
	<!-- /.aside-content -->
</aside>