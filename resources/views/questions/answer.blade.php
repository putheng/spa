@extends('layouts.dashboard.index')

@section('content')
<!-- .page -->
<div class="page has-sidebar has-sidebar-expand-xl ">
	<div class="page-inner">
		<!-- .page-title-bar -->
		<header class="page-title-bar">
			<!-- page title stuff goes here -->
			<h1 class="page-title"> Create a question </h1>
		</header>
		<!-- /.page-title-bar -->
		<div class="card">
			<!-- .card-body -->
			<div class="card-body">
				<!-- .form -->
				<answer :data="{{ $question->toJson() }}"></answer>
				<!-- /.form -->
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>
<!-- /.page -->
@endsection