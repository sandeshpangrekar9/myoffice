@extends('layouts.master')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
	<!-- Inner content -->
	<div class="content-inner">
		<!-- Page header -->
		<div class="page-header page-header-light shadow">
			<div class="page-header-content d-lg-flex">
				<div class="d-flex">
					<h4 class="page-title mb-0">
						Dashboard
					</h4>

					<a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
						<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
					</a>
				</div>
			</div>

			<div class="page-header-content d-lg-flex border-top">
				<div class="d-flex">
					<div class="breadcrumb py-2">
						<a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
						<span class="breadcrumb-item">Dashboard</span>
					</div>

					<a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
						<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /page header -->


		<!-- Content area -->
		<div class="content">
			<div class="card">
				<div class="card-body">
					<div class="text-center m-4">
						<h5>Welcome to My Office!</h5>
					</div>
				</div>
			</div>
		</div>
		<!-- /content area -->
	</div>
	<!-- /inner content -->
</div>
<!-- /main content -->
@endsection

@push('js')
@endpush