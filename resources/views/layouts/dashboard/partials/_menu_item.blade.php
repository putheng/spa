<!-- .menu-item -->
<li class="menu-item has-child">
	<a href="#" class="menu-link">
		<span class="menu-icon oi oi-list-rich"></span>
		<span class="menu-text">Questions</span>
	</a> <!-- child menu -->
	<ul class="menu">
		<li class="menu-item">
			<a href="{{ route('dashboard.question.index') }}" class="menu-link">All Questions</a>
		</li>
		<li class="menu-item">
			<a href="{{ route('dashboard.question.create') }}" class="menu-link">Add Question</a>
		</li>
	</ul>
	<!-- /child menu -->
</li>
<!-- /.menu-item -->