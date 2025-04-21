@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Student</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Student Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="form-control-static"><b>Name</b>: {{$student->first_name}} {{$student->last_name}}</p>
                        <p class="form-control-static"><b>Email</b>: {{$student->email}}</p>
                        <p class="form-control-static"><b>Phone Number</b>: {{$student->phone_number}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="form-control-static"><b>Country</b>: {{$student->country->name ?? ''}}</p>
                        <p class="form-control-static"><b>City</b>: {{$student->city}}</p>
                        <p class="form-control-static"><b>Zip</b>: {{$student->zip}}</p>
                    </div>
                </div>
                <h4 class="card-title">
                    <h3 class="text-center">Services Fees</h3>
                </h4>
                <div class="row">
                    @foreach ($payments as $item)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Services : {{ $item->PaymentLink->master_services->name ?? '' }} : {{ $item->PaymentLink->master_services->amount ?? '' }}</h5>
                                <p class="card-text">Discount : {{ $item->PaymentLink->discount }}</p>
                                <h5 class="card-title">Sub Services</h5>
                                <ul class="list-group">
                                    @foreach (App\Models\SubService::whereIn('id', explode(',', $item->PaymentLink->sub_service))->Select('name','master_service_id','id','status')->where('status', 1)->get() as $subservice)
                                    <li class="list-group-item">{{ $subservice->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    </div>
    </div>
</div>
@endsection
