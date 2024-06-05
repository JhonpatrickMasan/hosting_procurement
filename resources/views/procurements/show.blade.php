@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Information Technology Equipment --}}
        <div class="mb-3 card">
            <div class="text-center card-header font-weight-bold">Information Technology Equipment</div>
            <div class="text-center card-body">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-warning">Amendment</button>
                    <div>
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash"></i>
                        <i class="fa fa-print"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Procurement Timeline --}}
        <div class="mb-3 card">
            <div class="text-center card-header font-weight-bold">Procurement Timeline</div>
            <div class="text-center card-body">
                <p>Today is {{ \Carbon\Carbon::now()->format('l, F d, Y') }}</p>
                <div class="timeline">
                    <div class="timeline-step">
                        <span class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></span>
                        <p>Annual Procurement Plan Submission</p>
                        <small>{{ \Carbon\Carbon::parse($procurement->annual_procurement_plan)->format('F d, Y - h:i A') }}</small>
                    </div>
                    <div class="timeline-step">
                        <span class="timeline-badge"><i class="glyphicon glyphicon-record"></i></span>
                        <p>Amendatory APP/Resolution</p>
                        <small>{{ \Carbon\Carbon::parse($procurement->complete_set_of_ppu)->format('F d, Y - h:i A') }}</small>
                    </div>
                    <div class="timeline-step">
                        <span class="timeline-badge"><i class="glyphicon glyphicon-record"></i></span>
                        <p>Purchase Request Submission</p>
                        <small>{{ \Carbon\Carbon::parse($procurement->purchase_request)->format('F d, Y - h:i A') }}</small>
                    </div>
                </div>
                <button class="btn btn-dark">View Full Timeline</button>
            </div>
        </div>

        {{-- Info Card --}}
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Code:</strong> {{ $procurement->code }}</div>
                    <div class="col-md-3"><strong>Category:</strong> {{ $procurement->category }}</div>
                    <div class="col-md-3"><strong>PMO/End-user:</strong> {{ $procurement->end_user }}</div>
                    <div class="col-md-3"><strong>Is this an Early Procurement Activity?:</strong>
                        {{ $procurement->early_procurement }}</div>
                    <div class="col-md-3"><strong>Mode of Procurement:</strong> {{ $procurement->mode_of_procurement }}
                    </div>
                </div>
            </div>
        </div>

        {{-- End-User's Contact Person Card --}}
        <div class="mb-3 card">
            <div class="text-center card-header font-weight-bold">End-user's Contact Person</div>
            <div class="text-center card-body">
                <div class="row">
                    <div class="col-md-6"><strong>End-user's Contact Person (if applicable):</strong>
                        {{ $procurement->end_user_contact_person }}</div>
                    <div class="col-md-6"><strong>End-user's Contact Person's Email (if applicable):</strong>
                        {{ $procurement->end_user_contact_person_email }}</div>
                </div>
            </div>
        </div>

        {{-- Procurement Planning Card --}}
        <div class="mb-3 card">
            <div class="text-center card-header font-weight-bold">Procurement Planning</div>
            <div class="card-body">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            <th>Documents</th>
                            <th>Statuses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (['annual_procurement_plan' => 'Annual Procurement Plan', 'complete_set_of_ppu' => 'Complete Set of PPU', 'purchase_request' => 'Purchase Request', 'condition_of_funds_and_availability' => 'Certificate of Funds and Availability', 'certificate_of_funded_body' => 'Certificate of Market Study'] as $field => $label)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>
                                    <span class="badge badge-success">Submitted</span>
                                    <span class="badge badge-success">Approved</span>
                                </td>
                                <td>
                                    <button class="btn btn-success">Approve</button>
                                    <button class="btn btn-danger">Reject</button>
                                    <button class="btn btn-dark">View Document</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
