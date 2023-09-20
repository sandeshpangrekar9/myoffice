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
						Clients
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
						<span class="breadcrumb-item">Clients</span>
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
						Clients List
						<span class="float-end">
							<button type="button" class="btn btn-primary" name="create-client-btn" id="create-client-btn"><i class="ph-plus me-1"></i>Create</button>
						</span>
					</h5>
				</div>
				<table class="table datatable-basic table-bordered table-striped table-hover" data-listing-url="{{ route('clients') }}">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>City</th>
							<th>Notes</th>
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
<div class="modal" id="clientModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"><span id="clientModalTitle">Create Client</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form method="POST" name="clientModalForm" id="clientModalForm" action="#" data-store-url="{{ route('clients.store') }}" data-update-url="{{ route('clients.update', 'id') }}">
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
				<label for="address" class="form-label fw-bold">Address<sup class="text-danger">*</sup></label>
				<textarea type="text" class="form-control form-input" id="address" placeholder="Enter address" name="address" rows="2"></textarea>
				<div id="address-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="city" class="form-label fw-bold">City<sup class="text-danger">*</sup></label>
				<input type="text" class="form-control form-input" id="city" placeholder="Enter city" name="city">
				<div id="city-msg"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="notes" class="form-label fw-bold">Notes<sup class="text-danger">*</sup></label>
				<textarea type="text" class="form-control form-input" id="notes" placeholder="Enter notes" name="notes" rows="2"></textarea>
				<div id="notes-msg"></div>
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
        <button type="button" id="clientFormSubmitBtn" class="btn btn-primary me-2">Submit</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="clientDelModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" name="clientDelModalForm" id="clientDelModalForm" action="{{ route('clients.destroy', 'id') }}">
      @csrf
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Delete Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to delete this record?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="clientDelFormYesBtn" id="clientDelFormYesBtn">Yes</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/assets1/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/assets2/js/clients-datatables.js') }}"></script>
<script src="{{ asset('assets/assets2/js/clients.js') }}"></script>
@endpush