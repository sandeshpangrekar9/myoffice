<!-- Main navbar -->
<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
	<div class="container-fluid">
		<div class="d-flex d-lg-none me-2">
			<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
				<i class="ph-list"></i>
			</button>
		</div>

		<div class="navbar-brand flex-1 flex-lg-0">
			<a href="index.html" class="d-inline-flex align-items-center">
				<img src="{{ asset('assets/assets1/images/logo_icon.svg') }}" alt="">
				<h5 class="d-none d-sm-inline-block h-16px ms-3 text-white">My Office</h5>
			</a>
		</div>

		<ul class="nav flex-row justify-content-end order-1 order-lg-2">
			<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
				<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
					<span class="d-none d-lg-inline-block mx-lg-2">
						<i class="ph-user me-1"></i>{{ Auth::user()->name }}
					</span>
				</a>

				<div class="dropdown-menu dropdown-menu-end">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-nav').submit();" class="dropdown-item">
						<i class="ph-sign-out me-2"></i>
						Logout
					</a>
					<form id="logout-nav" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->