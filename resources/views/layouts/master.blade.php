<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body>
	@include('layouts.navbar')
	<!-- Page content -->
	<div class="page-content">
		@include('layouts.sidebar')
		@yield('content')
	</div>
	<!-- /page content -->
	@stack('js')
	@include('notification')
</body>
</html>