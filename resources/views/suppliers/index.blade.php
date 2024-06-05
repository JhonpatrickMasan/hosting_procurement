@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #ffffff; border-radius: 5px; padding: 20px; margin-right:300px;">
    <h1 class="my-4 text-center" style="margin-top:20px; font-weight: bold; font-size: 2.5rem;">Suppliers' Database</h1>

    <div class="mb-3" style="margin-left: 40px; margin-top: 70px; margin-bottom: 70px; border-radius: 5px;">
        <div class="mb-3 d-flex justify-content-between align-items-center" style="border-radius: 5px;">
            <input type="text" class="mr-2 form-control" placeholder="Search by Name..." id="search-name" style="border-radius: 5px;">
            <select class="mr-2 form-control" id="search-category" style="border-radius: 5px;">
                <option value="">Category...</option>
                <option value="Goods">Goods</option>
                <option value="Infrastructure">Infrastructure</option>
                <option value="Consulting Services">Consulting Services</option>
            </select>
            <button class="btn btn-lg add-btn" data-toggle="modal" data-target="#addSupplierModal"
                style="width: 150px; border-radius:5px; margin-left: 25px; margin-bottom:1px; height: 40px;">
                Add
            </button>
        </div>
    </div>

    <div class="table-responsive" style="max-height: 400px; margin-left:30px; overflow-y: auto; margin-top: 100px; align-items: center;">
        <table id="table" class="table mx-auto text-center table-bordered" style="width: 90%; margin-bottom: 70px;">
            <thead>
                <tr>
                    <th class="border">No.</th>
                    <th class="border">Supplier ID</th>
                    <th class="border">Supplier Name</th>
                    <th class="border">Category</th>
                    <th class="border">Edit Information</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td class="text-center border">
                            {{ $loop->iteration + $suppliers->perPage() * ($suppliers->currentPage() - 1) }}</td>
                        <td class="text-center border">{{ $supplier->id }}</td>
                        <td class="text-center border">
                            <a href="#" class="supplier-details" data-toggle="modal" data-target="#supplierDetailsModal"
                               data-id="{{ $supplier->id }}"
                               data-name="{{ $supplier->name }}"
                               data-category="{{ $supplier->category }}"
                               data-address="{{ $supplier->address }}"
                               data-email="{{ $supplier->email }}"
                               data-contact_number="{{ $supplier->contact_number }}"
                               data-representative_name="{{ $supplier->representative_name }}"
                               data-representative_contact_number="{{ $supplier->representative_contact_number }}"
                               data-representative_email="{{ $supplier->representative_email }}">
                                {{ $supplier->name }}
                            </a>
                        </td>
                        <td class="text-center border">{{ $supplier->category }}</td>
                        <td class="text-center border">
                            <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editSupplierModal"
                                data-id="{{ $supplier->id }}"
                                data-name="{{ $supplier->name }}"
                                data-category="{{ $supplier->category }}"
                                data-address="{{ $supplier->address }}"
                                data-email="{{ $supplier->email }}"
                                data-contact_number="{{ $supplier->contact_number }}"
                                data-representative_name="{{ $supplier->representative_name }}"
                                data-representative_contact_number="{{ $supplier->representative_contact_number }}"
                                data-representative_email="{{ $supplier->representative_email }}"
                                style="width: 50%; height: 100%; display: flex; align-items: center; justify-content: center; margin-left:50px;">
                                ✏️ Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center" id="pagination-links">
        {{ $suppliers->links() }}
    </div>
</div>

<!-- Add Supplier Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">Add a Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Supplier's Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="Goods">Goods</option>
                            <option value="Infrastructure">Infrastructure</option>
                            <option value="Consulting Services">Consulting Services</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Supplier's Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="representative_name">Supplier Representative's Name:</label>
                        <input type="text" class="form-control" id="representative_name" name="representative_name" required>
                    </div>
                    <div class="form-group">
                        <label for="representative_contact_number">Supplier Representative's Contact Number:</label>
                        <input type="text" class="form-control" id="representative_contact_number" name="representative_contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="representative_email">Supplier Representative's Email:</label>
                        <input type="email" class="form-control" id="representative_email" name="representative_email" required>
                    </div>
                    <!-- Add other fields here as needed -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Add Supplier</button>
                        <button type="reset" class="btn btn-secondary">Clear Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Supplier Modal -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSupplierModalLabel">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('suppliers.update', '') }}" method="POST" id="edit-supplier-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit-name">Supplier's Name:</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-category">Category:</label>
                        <select class="form-control" id="edit-category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="Goods">Goods</option>
                            <option value="Infrastructure">Infrastructure</option>
                            <option value="Consulting Services">Consulting Services</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-address">Supplier's Address:</label>
                        <input type="text" class="form-control" id="edit-address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email:</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-contact_number">Contact Number:</label>
                        <input type="text" class="form-control" id="edit-contact_number" name="contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-representative_name">Supplier Representative's Name:</label>
                        <input type="text" class="form-control" id="edit-representative_name" name="representative_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-representative_contact_number">Supplier Representative's Contact Number:</label>
                        <input type="text" class="form-control" id="edit-representative_contact_number" name="representative_contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-representative_email">Supplier Representative's Email:</label>
                        <input type="email" class="form-control" id="edit-representative_email" name="representative_email" required>
                    </div>
                    <!-- Add other fields here as needed -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Supplier</button>
                        <button type="reset" class="btn btn-secondary">Clear Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Supplier Details Modal -->
<div class="modal fade" id="supplierDetailsModal" tabindex="-1" role="dialog" aria-labelledby="supplierDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierDetailsModalLabel">Supplier Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name:</strong> <span id="details-name"></span></li>
                    <li class="list-group-item"><strong>Category:</strong> <span id="details-category"></span></li>
                    <li class="list-group-item"><strong>Address:</strong> <span id="details-address"></span></li>
                    <li class="list-group-item"><strong>Email:</strong> <span id="details-email"></span></li>
                    <li class="list-group-item"><strong>Contact Number:</strong> <span id="details-contact_number"></span></li>
                    <li class="list-group-item"><strong>Representative Name:</strong> <span id="details-representative_name"></span></li>
                    <li class="list-group-item"><strong>Representative Contact Number:</strong> <span id="details-representative_contact_number"></span></li>
                    <li class="list-group-item"><strong>Representative Email:</strong> <span id="details-representative_email"></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        overflow: hidden;
    }

    .table th,
    .table td {
        border: 1px solid black;
        vertical-align: middle;
    }

    .table thead th {
        background-color: #f8f9fa;
    }

    .btn-primary,
    .btn-danger {
        width: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .add-btn {
        background-color: #28a745; /* Change button color */
        color: #fff;
        transition: background-color 0.3s, transform 0.3s;
    }

    .add-btn:hover {
        background-color: #218838; /* Darken button color on hover */
        transform: scale(1.05); /* Slightly increase button size on hover */
    }

    #pagination-links {
        margin-bottom: 50px;
    }

    .edit-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tableBody = document.getElementById('table-body');
        var allRows = Array.from(tableBody.rows);

        function filterSuppliers() {
            var searchQuery = document.getElementById('search-name').value.toLowerCase();
            var searchCategory = document.getElementById('search-category').value.toLowerCase();

            tableBody.innerHTML = '';

            allRows.forEach(function(row) {
                var name = row.cells[2].textContent.toLowerCase();
                var category = row.cells[3].textContent.toLowerCase();

                if ((name.includes(searchQuery) || searchQuery === '') &&
                    (category.includes(searchCategory) || searchCategory === '')) {
                    tableBody.appendChild(row);
                }
            });
        }

        document.getElementById('search-name').addEventListener('input', filterSuppliers);
        document.getElementById('search-category').addEventListener('change', filterSuppliers);

        // Handle edit modal population
        $('#editSupplierModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var supplierId = button.data('id');
            var supplierName = button.data('name');
            var supplierCategory = button.data('category');
            var supplierAddress = button.data('address');
            var supplierEmail = button.data('email');
            var supplierContactNumber = button.data('contact_number');
            var representativeName = button.data('representative_name');
            var representativeContactNumber = button.data('representative_contact_number');
            var representativeEmail = button.data('representative_email');

            var modal = $(this);
            modal.find('.modal-body #edit-name').val(supplierName);
            modal.find('.modal-body #edit-category').val(supplierCategory);
            modal.find('.modal-body #edit-address').val(supplierAddress);
            modal.find('.modal-body #edit-email').val(supplierEmail);
            modal.find('.modal-body #edit-contact_number').val(supplierContactNumber);
            modal.find('.modal-body #edit-representative_name').val(representativeName);
            modal.find('.modal-body #edit-representative_contact_number').val(representativeContactNumber);
            modal.find('.modal-body #edit-representative_email').val(representativeEmail);

            var form = modal.find('form');
            form.attr('action', '/suppliers/' + supplierId);
        });

        // Handle supplier details modal population
        $('.supplier-details').on('click', function (event) {
    var button = $(this); // Link that triggered the modal
    var supplierName = button.data('name');
    var supplierCategory = button.data('category');
    var supplierAddress = button.data('address');
    var supplierEmail = button.data('email');
    var supplierContactNumber = button.data('contact_number');
    var representativeName = button.data('representative_name');
    var representativeContactNumber = button.data('representative_contact_number');
    var representativeEmail = button.data('representative_email');
    var supplierHistory = button.data('supplier_history'); // Assuming you have this attribute in your supplier object

    var modal = $('#supplierDetailsModal');
    modal.find('#details-name').text(supplierName);
    modal.find('#details-category').text(supplierCategory);
    modal.find('#details-address').text(supplierAddress);
    modal.find('#details-email').text(supplierEmail);
    modal.find('#details-contact_number').text(supplierContactNumber);
    modal.find('#details-representative_name').text(representativeName);
    modal.find('#details-representative_contact_number').text(representativeContactNumber);
    modal.find('#details-representative_email').text(representativeEmail);
});

        // Handle pagination links
        document.getElementById('next-page-btn').addEventListener('click', function() {
            var nextPageLink = document.querySelector('.pagination .next a');
            if (nextPageLink) {
                var nextPageUrl = nextPageLink.getAttribute('href');
                fetchSuppliers(nextPageUrl);
            }
        });

        function fetchSuppliers(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(data, 'text/html');
                    var newTableBody = doc.querySelector('#table-body').innerHTML;
                    var newPaginationLinks = doc.querySelector('#pagination-links').innerHTML;

                    document.getElementById('table-body').innerHTML = newTableBody;
                    document.getElementById('pagination-links').innerHTML = newPaginationLinks;
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });
</script>
@endsection
