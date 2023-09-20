<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
	<!-- Sidebar content -->
	<div class="sidebar-content">
		<!-- Main navigation -->
		<div class="sidebar-section">
			<ul class="nav nav-sidebar" data-nav-type="accordion">
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
						<i class="ph-house"></i><span>Dashboard</span>
					</a>
				</li>
				@if (Auth::user() && Auth::user()->type == 'admin')
				<li class="nav-item">
					<a href="{{ route('employees') }}" class="nav-link {{ Request::routeIs('employees') ? 'active' : '' }}">
						<i class="ph-users"></i><span>Employees</span>
					</a>
				</li>
				@endif
				<li class="nav-item">
					<a href="{{ route('clients') }}" class="nav-link {{ Request::routeIs('clients') ? 'active' : '' }}">
						<i class="ph-users-three"></i><span>Clients</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link {{ Request::routeIs('logout') ? 'active' : '' }}">
						<i class="ph-sign-out"></i><span>Logout</span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
				</li>
			</ul>
		</div>
		<!-- /main navigation -->
	</div>
	<!-- /sidebar content -->
</div>
<!-- /main sidebar -->