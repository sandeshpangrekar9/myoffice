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
						Employees
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
						<span class="breadcrumb-item">Employees</span>
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
			<!-- Style combinations -->
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0">
						Employees List
						<span class="float-end">
							<button type="button" class="btn btn-primary" name="create-emp-btn" id="create-emp-btn"><i class="ph-plus me-1"></i>Create</button>
						</span>
					</h5>
				</div>
				<table class="table datatable-basic table-bordered table-striped table-hover" data-listing-url="{{ route('employees') }}">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th class="text-center">Status</th>
							<th class="text-center">Created At</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!-- /style combinations -->
		</div>
		<!-- /content area -->
		<!-- footer -->
	</div>
	<!-- /inner content -->
</div>
<!-- /main content -->

<!-- Create/Edit Modal -->
<div class="modal" id="employeeModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"><span id="employeeModalTitle">Create Employee</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form method="POST" name="employeeModalForm" id="employeeModalForm" action="#" data-store-url="{{ route('employees.store') }}" data-update-url="{{ route('employees.update', 'id') }}">
        	@csrf
			<div class="mb-3 mt-1">
				<label for="name" class="form-label fw-bold">Name<sup class="text-danger">*</sup></label>
				<input type="text" class="form-control form-input" id="name" placeholder="Enter name" name="name">
				<div id="name-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="email" class="form-label fw-bold">Email<sup class="text-danger">*</sup></label>
				<input type="text" class="form-control form-input" id="email" placeholder="Enter email" name="email">
				<div id="email-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="password" class="form-label fw-bold">Password
					<span id="password-star"></span>
					<span id="password-edit-label"></span>
				</label>
				<input type="password" class="form-control form-input" id="password" placeholder="Enter password" name="password" autocomplete="new-password">
				<div id="password-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="phone" class="form-label fw-bold">Phone Number<sup class="text-danger">*</sup></label>
				<input type="text" class="form-control form-input" id="phone" placeholder="Enter phone number" name="phone">
				<div id="phone-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="status" class="form-label fw-bold">Status<sup class="text-danger">*</sup></label>
				<div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input form-input" type="radio" name="status" id="status-active" value="1">
					  <label class="form-check-label" for="status-active">Active</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input form-input" type="radio" name="status" id="status-inactive" value="0">
					  <label class="form-check-label" for="status-inactive">Inactive</label>
					</div>
				</div>
				<div id="status-msg"></div>
			</div>
		</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="employeeFormSubmitBtn" class="btn btn-primary me-2">Submit</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="employeeDelModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" name="employeeDelModalForm" id="employeeDelModalForm" action="{{ route('employees.destroy', 'id') }}">
      @csrf
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Delete Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to delete this record?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="employeeDelFormYesBtn" id="employeeDelFormYesBtn">Yes</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/assets1/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/assets2/js/employees-datatables.js') }}"></script>
<script src="{{ asset('assets/assets2/js/employees.js') }}"></script>
@endpush