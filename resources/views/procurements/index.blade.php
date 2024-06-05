@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #ffffff; border-radius: 5px; padding: 20px; margin-right:300px;">
        <h1 class="my-4 text-center" style="margin-top:20px; font-weight: bold; font-size: 2.5rem;">Procurement Monitoring
        </h1>

        <div class="mb-3" style="margin-left: 40px; margin-top: 70px; margin-bottom: 70px; border-radius: 5px;">
            <div class="mb-3 d-flex justify-content-between align-items-center" style="border-radius: 5px;">
                <input type="text" class="mr-2 form-control" placeholder="Search a Code..." id="search-code"
                    style="border-radius: 5px;">
                <input type="text" class="mr-2 form-control" placeholder="Sort by End-user..." id="sort-end-user"
                    style="border-radius: 5px;">
                <select class="mr-2 form-control" id="sort-category" style="border-radius: 5px;">
                    <option value="">Sort by Category...</option>
                    <option value="Goods">Goods</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Consulting Services">Consulting Services</option>
                </select>
                <button class="btn btn-lg add-btn" data-toggle="modal" data-target="#addProcurementModal"
                    style="width: 150px; border-radius:5px; margin-left: 25px; margin-bottom:1px; height: 40px;">
                    Add
                </button>
            </div>
        </div>

        <div class="table-responsive" style="max-height: 400px; margin-left:30px; overflow-y: auto; margin-top: 100px;">
            <table id="table" class="table mx-auto text-center table-bordered" style="width: 90%; margin-bottom: 70px;">
                <thead>
                    <tr>
                        <th class="border">No.</th>
                        <th class="border">Code</th>
                        <th class="border">Procurement Project</th>
                        <th class="border">Category</th>
                        <th class="border">PMO/End-User</th>
                        <th class="border">Procurement Status</th>
                        <th class="border">Actions</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($procurements as $index => $procurement)
                        <tr>
                            <td class="text-center border">{{ $index + 1 }}</td>
                            <td class="text-center border">{{ $procurement->code }}</td>
                            <td class="text-center border">
                                <a
                                    href="{{ route('procurements.show', ['id' => $procurement->id]) }}">{{ $procurement->project }}</a>
                            </td>
                            <td class="text-center border">{{ $procurement->category }}</td>
                            <td class="text-center border">{{ $procurement->end_user }}</td>
                            <td class="text-center status-cell" data-status="{{ $procurement->status }}">
                                {{ $procurement->status }}</td>
                            <td class="text-center border">
                                <a href="#" class="btn btn-primary edit-btn" data-toggle="modal"
                                    data-target="#editProcurementModal" data-id="{{ $procurement->id }}"
                                    data-code="{{ $procurement->code }}" data-project="{{ $procurement->project }}"
                                    data-category="{{ $procurement->category }}"
                                    data-end-user="{{ $procurement->end_user }}"
                                    data-status="{{ $procurement->status }}">✏️ Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addProcurementModal" tabindex="-1" role="dialog"
        aria-labelledby="addProcurementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProcurementModalLabel">Add a Procurement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('procurements.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code:</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <div class="form-group">
                            <label for="source_funds">Source Funds:</label>
                            <input type="text" class="form-control" id="source_funds" name="source_funds">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="form-group">
                            <label for="app">App:</label>
                            <input type="text" class="form-control" id="app" name="app">
                        </div>
                        <div class="form-group">
                            <label for="project_type">Project Type:</label>
                            <input type="text" class="form-control" id="project_type" name="project_type">
                        </div>
                        <div class="form-group">
                            <label for="annual_procurement_plan">Annual Procurement Plan:</label>
                            <input type="date" class="form-control" id="annual_procurement_plan"
                                name="annual_procurement_plan">
                        </div>
                        <div class="form-group">
                            <label for="complete_set_of_ppu">Complete Set of PPU:</label>
                            <input type="date" class="form-control" id="complete_set_of_ppu"
                                name="complete_set_of_ppu">
                        </div>
                        <div class="form-group">
                            <label for="pmo_end_user">PMO/End-user:</label>
                            <input type="text" class="form-control" id="pmo_end_user" name="pmo_end_user">
                        </div>
                        <div class="form-group">
                            <label for="early_procurements">Early Procurements:</label>
                            <input type="text" class="form-control" id="early_procurements"
                                name="early_procurements">
                        </div>
                        <div class="form-group">
                            <label for="mode_of_procurement">Mode of Procurement:</label>
                            <input type="text" class="form-control" id="mode_of_procurement"
                                name="mode_of_procurement">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Add Procurement</button>
                            <button type="reset" class="btn btn-secondary">Clear Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editProcurementModal" tabindex="-1" role="dialog"
        aria-labelledby="editProcurementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProcurementModalLabel">Edit Procurement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="edit-procurement-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit-code">Code:</label>
                            <input type="text" class="form-control" id="edit-code" name="code" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-source_funds">Source Funds:</label>
                            <input type="text" class="form-control" id="edit-source_funds" name="source_funds">
                        </div>
                        <div class="form-group">
                            <label for="edit-status">Status:</label>
                            <input type="text" class="form-control" id="edit-status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="edit-category">Category:</label>
                            <input type="text" class="form-control" id="edit-category" name="category">
                        </div>
                        <div class="form-group">
                            <label for="edit-app">App:</label>
                            <input type="text" class="form-control" id="edit-app" name="app">
                        </div>
                        <div class="form-group">
                            <label for="edit-project_type">Project Type:</label>
                            <input type="text" class="form-control" id="edit-project_type" name="project_type">
                        </div>
                        <div class="form-group">
                            <label for="edit-annual_procurement_plan">Annual Procurement Plan:</label>
                            <input type="date" class="form-control" id="edit-annual_procurement_plan"
                                name="annual_procurement_plan">
                        </div>
                        <div class="form-group">
                            <label for="edit-complete_set_of_ppu">Complete Set of PPU:</label>
                            <input type="date" class="form-control" id="edit-complete_set_of_ppu"
                                name="complete_set_of_ppu">
                        </div>
                        <div class="form-group">
                            <label for="edit-pmo_end_user">PMO/End-user:</label>
                            <input type="text" class="form-control" id="edit-pmo_end_user" name="pmo_end_user">
                        </div>
                        <div class="form-group">
                            <label for="edit-early_procurements">Early Procurements:</label>
                            <input type="text" class="form-control" id="edit-early_procurements"
                                name="early_procurements">
                        </div>
                        <div class="form-group">
                            <label for="edit-mode_of_procurement">Mode of Procurement:</label>
                            <input type="text" class="form-control" id="edit-mode_of_procurement"
                                name="mode_of_procurement">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Procurement</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
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
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .status-cell {
            padding: 8px;
            border-radius: 4px;
        }

        .status-cell[data-status="Complete"] {
            background-color: #33FF00;
        }

        .status-cell[data-status="Ongoing"] {
            background-color: #FFB800;
        }

        .status-cell[data-status="Failed"] {
            background-color: #FF9090;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tableBody = document.getElementById('table-body');
            var allRows = Array.from(tableBody.rows);

            function filterProcurements() {
                var searchCode = document.getElementById('search-code').value.toLowerCase();
                var sortEndUser = document.getElementById('sort-end-user').value.toLowerCase();
                var sortCategory = document.getElementById('sort-category').value.toLowerCase();

                tableBody.innerHTML = '';

                allRows.forEach(function(row) {
                    var code = row.cells[1].textContent.toLowerCase();
                    var project = row.cells[2].textContent.toLowerCase();
                    var category = row.cells[3].textContent.toLowerCase();
                    var endUser = row.cells[4].textContent.toLowerCase();
                    var status = row.cells[5].textContent.toLowerCase();

                    if ((code.includes(searchCode) || searchCode === '') &&
                        (endUser.includes(sortEndUser) || sortEndUser === '') &&
                        (category.includes(sortCategory) || sortCategory === '')) {
                        tableBody.appendChild(row);
                    }
                });
            }

            document.getElementById('search-code').addEventListener('input', filterProcurements);
            document.getElementById('sort-end-user').addEventListener('input', filterProcurements);
            document.getElementById('sort-category').addEventListener('change', filterProcurements);

            // Edit button click event
            var editButtons = document.getElementsByClassName('edit-btn');
            for (var i = 0; i < editButtons.length; i++) {
                editButtons[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    var id = this.getAttribute('data-id');
                    var code = this.getAttribute('data-code');
                    var project = this.getAttribute('data-project');
                    var category = this.getAttribute('data-category');
                    var endUser = this.getAttribute('data-end-user');
                    var status = this.getAttribute('data-status');
                    var pmoEndUser = this.getAttribute('data-pmo-end-user'); // New attribute
                    var earlyProcurements = this.getAttribute('data-early-procurements'); // New attribute
                    var modeOfProcurement = this.getAttribute('data-mode-of-procurement'); // New attribute

                    document.getElementById('edit-procurement-form').action = '/procurements/' + id;
                    document.getElementById('edit-code').value = code;
                    document.getElementById('edit-project').value = project;
                    document.getElementById('edit-category').value = category;
                    document.getElementById('edit-end-user').value = endUser;
                    document.getElementById('edit-status').value = status;
                    document.getElementById('edit-pmo_end_user').value =
                        pmoEndUser; // Set value for PMO/End-user field
                    document.getElementById('edit-early_procurements').value =
                        earlyProcurements; // Set value for Early Procurements field
                    document.getElementById('edit-mode_of_procurement').value =
                        modeOfProcurement; // Set value for Mode of Procurement field
                });

            }
        });
    </script>
@endsection
