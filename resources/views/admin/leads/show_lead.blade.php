@extends('admin.include.app')
@section('main-content')
<style>
.driver-profile {
    font-size: 13px;
}
.profile-section p {
    margin-bottom: 6px;
    border-bottom: 1px dashed #e4e4e4;
    padding-bottom: 4px;
}
.img-fluid {
    max-width: 100%;
    max-height: 200px;
}
</style>

<div class="container-fluid py-4">
    <div class="card shadow driver-profile">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Driver Profile</h5>
            <a href="{{ url('admin/leads-lists') }}" class="btn btn-sm btn-light">Back</a>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- LEFT COLUMN -->
                <div class="col-md-6">
                    <h6 class="text-muted mb-3">Personal Information</h6>
                    <div class="profile-section">
                        <p><strong>Source:</strong> {{ $studentData->source ?? '-' }}</p>
                        @php
                                    $driver_category_status =DB::table('driver_category_status')->where('id',$studentData->license_type )->first();
                                    @endphp
                        <p><strong>Driver Category:</strong> {{ $driver_category_status->name ?? '-' }}</p>
                        <p><strong>Driver Type:</strong> {{ $studentData->driver_type ?? '-' }}</p>
                        <p><strong>Name:</strong> {{ $studentData->first_name ?? '-' }}</p>
                        <p><strong>Father Name:</strong> {{ $studentData->father_name ?? '-' }}</p>
                        <p><strong>Mother Name:</strong> {{ $studentData->mother_name ?? '-' }}</p>
                        <p><strong>Gender:</strong> {{ $studentData->gender ?? '-' }}</p>
                        <p><strong>Phone:</strong> {{ $studentData->phone_number ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $studentData->email ?? '-' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $studentData->dob ?? '-' }}</p>
                        <p><strong>Religion:</strong> {{ $studentData->religion ?? '-' }}</p>
                        <p><strong>Marital Status:</strong> {{ $studentData->martial_status ?? '-' }}</p>
                        <p><strong>Address:</strong> {{ $studentData->address ?? '-' }}</p>
                        <p><strong>Zip:</strong> {{ $studentData->zip ?? '-' }}</p>
                        <p><strong>Country:</strong> {{ $studentData->country->name ?? '-' }}</p>
                        <p><strong>State:</strong> {{ $studentData->state->name ?? '-' }}</p>
                        <p><strong>Education:</strong> {{ $studentData->education_level ?? '-' }}</p>
                        <p><strong>Age:</strong> {{ $studentData->age ?? '-' }}</p>
                        <p><strong>Height:</strong> {{ $studentData->height ?? '-' }}</p>
                        <p><strong>Weight:</strong> {{ $studentData->weight ?? '-' }}</p>
                        <p><strong>Eye Vision:</strong> {{ $studentData->eye_vision ?? '-' }}</p>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-md-6">
                    <h6 class="text-muted mb-3">License & Job Details</h6>
                    <div class="profile-section">
                        @php
                        $license_type =DB::table('license_types')->where('id',$studentData->license_type )->first();
                     
                        $job_type =DB::table('job_types')->where('id',$studentData->job_type )->first();
                     
                        $expected_salary =DB::table('expected_salary')->where('id',$studentData->expected_salary )->first();
                        
                        $educationLanes = \App\Models\DocumentType::pluck('name', 'id');
                        @endphp
                        <p><strong>License Type:</strong> {{ $license_type->name ?? '-' }}</p>
                        <p><strong>Vehicle Type:</strong> {{ $studentData->vechicle_type ?? '-' }}</p>
                        <p><strong>License No:</strong> {{ $studentData->license_no ?? '-' }}</p>
                        <p><strong>Issue Date:</strong> {{ $studentData->license_issue_date ?? '-' }}</p>
                        <p><strong>Expiry Date:</strong> {{ $studentData->license_exp_date ?? '-' }}</p>
                        <p><strong>Police Verification:</strong> {{ $studentData->pulice_verification_status ?? '-' }}</p>
                        <p><strong>Verification No:</strong> {{ $studentData->pulice_verification_no ?? '-' }}</p>
                        <p><strong>Total Experience:</strong> {{ $studentData->total_exp ?? '0' }} years</p>
                        <p><strong>Job Type:</strong> {{ $job_type->name ?? '-' }}</p>
                        <p><strong>Current Salary:</strong> {{ $studentData->current_salary ?? '-' }}</p>
                        <p><strong>Expected Salary:</strong> {{ $expected_salary->name ?? '-' }}</p>
                        <p><strong>Remarks:</strong> {{ $studentData->student_comment ?? '-' }}</p>
                    </div>

                    <h6 class="text-muted mt-4">Documents</h6>
                    <div class="row">
                        @foreach ($studentData->driver_documents as $doc)

                       
                            <div class="col-6 mb-3">
                                <strong>{{ $educationLanes[$doc->document_type] ?? 'N/A' }}</strong><br>
                                <img src="{{ asset($doc->document_path) }}" alt="Document" class="img-fluid rounded border">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
