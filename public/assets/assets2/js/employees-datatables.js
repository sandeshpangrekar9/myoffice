const DatatableBasic = function() {
    // Basic Datatable examples
    const _componentDatatableBasic = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            serverSide: true,
            order: [[4,"DESC"]],
            ajax: {
                url: $('.datatable-basic').data('listing-url'),
                type: 'GET',
                dataType: 'json',
            },
            autoWidth: true,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span class="me-3">Filter:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': document.dir == "rtl" ? '&larr;' : '&rarr;', 'previous': document.dir == "rtl" ? '&rarr;' : '&larr;' }
            },
            columns: [
                {data: 'name', width: '18%'},
                {data: 'email', width: '18%'},
                {data: 'phone', width: '15%'},
                {
                    data: 'status',
                    width: '10%',
                    className: 'text-center',
                    render: function (data) {
                        return (data == "1") ? '<span class="badge bg-success bg-opacity-10 text-success">Active</span>' : '<span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>';
                    }
                },
                {data: 'created_at', width: '15%', className: 'text-center'},
                {
                    data: 'action',
                    width: '8%',
                    className: 'text-center',
                    render: function (data, type, row) {
                        return `<div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" data-row='`+ JSON.stringify(row) +`' class="dropdown-item edit-emp-link">
                                                <i class="ph-pencil me-2"></i>
                                                Edit
                                            </a>
                                            <a href="javascript:void(0);" data-row='`+ JSON.stringify(row) +`' class="dropdown-item delete-emp-link">
                                                <i class="ph-trash me-2"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>`;
                    },
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // Basic datatable
        $('.datatable-basic').DataTable();

        // Alternative pagination
        $('.datatable-pagination').DataTable({
            pagingType: "simple",
            language: {
                paginate: {'next': document.dir == "rtl" ? 'Next &larr;' : 'Next &rarr;', 'previous': document.dir == "rtl" ? '&rarr; Prev' : '&larr; Prev'}
            }
        });

        // Datatable with saving state
        $('.datatable-save-state').DataTable({
            stateSave: true
        });

        // Scrollable datatable
        const table = $('.datatable-scroll-y').DataTable({
            autoWidth: true,
            scrollY: 300
        });

        // Resize scrollable table when sidebar width changes
        $('.sidebar-control').on('click', function() {
            table.columns.adjust().draw();
        });
    };

    return {
        init: function() {
            _componentDatatableBasic();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});