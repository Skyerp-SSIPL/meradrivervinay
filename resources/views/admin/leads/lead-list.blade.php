@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.php"> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted"> Driver List </li>
                    </ol>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('admin.create_new_lead') }}" class="btn add-btn">
                        <i class="fa-solid fa-plus"></i> Add Driver </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('leads-filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="name"
                                value="{{ request()->get('name') }}" placeholder="Driver Name ">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="phone_number"
                                value="{{ request()->get('phone_number') }}" placeholder="Driver Phone Number">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="email"
                                value="{{ request()->get('email') }}" placeholder="Driver Email">
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <select name="source" class="form-control  formmrgin">
                                <option value="">--Select Source--</option>
                                @foreach ($source as $item)
                                <option value="{{ $item->name }}"
                                    {{ request()->get('source') == $item->name ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <select name="driver_category" class="form-control  formmrgin">
                                <option value="">--Select Driver Category--</option>

                                @foreach ($driver_cate_status as $status)
                                <option value="{{ $status->id }}" {{ request()->get('driver_category') == $status->id ? 'selected' : '' }}>

                                    {{ $status->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <select name="driver_type" class="form-control  formmrgin">
                                <option value="">--Select Driver type--</option>
                                @foreach ($driver_type as $item)
                                <option value="{{ $item->name }}"
                                    {{ request()->get('driver_type') == $item->name ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <input type="date" name="from_date" class="form-control  formmrgin"
                                value="{{ request()->get('from_date') }}" placeholder="From Date">
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <input type="date" name="to_date" class="form-control  formmrgin"
                                value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                        </div>


                        @if(Auth::user()->hasRole('Administrator'))
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info d-lg-block formmrgin" name="export"
                                value="export">Export to Excel</button>
                        </div>
                        @endif
                        <div class="col-md-2 ">
                            <a href="{{ route('leads-filter') }}" class="btn btn-info d-lg-block  formmrgin">Reset
                            </a>
                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-4"
                                name="submit">Filter </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="col-md-12">
        @php
        $users =Auth::user();
        @endphp
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        @if (($users->hasRole('Franchise')) || ($users->hasRole('Administrator')))
                        <th><input type="checkbox" class="checked_all_lead"> <small>R.U</small></th>
                        @endif
                        <th><small>Date</small></th>
                        <th><small>Driver Type</small></th>
                        <th><small>Category</small></th>
                        <th><small>Name</small></th>
                        <th><small>Phone</small></th>
                        <th><small>Email</small></th>
                        <th><small>Action</small></th>
                    </tr>
                </thead>

                <tbody id="lead-list">
                    @php
                    $i = ($lead_list->currentPage() - 1) * $lead_list->perPage() + 2;
                    @endphp
                    @foreach ($lead_list as $data)
                    @php
                    $users = Auth::user();
                    $userEmail = App\Models\User::where('id', $data->assigned_to)->value('email');
                    $franchiseEmail = App\Models\User::where('id', $data->added_by_agent_id)->value('name');
                    $admin_type = App\Models\User::where('id', $data->added_by_agent_id)->value('admin_type');

                    $lead_status = App\Models\DriverCategoryStatus::find($data->driver_category_status);
                    @endphp
                    <tr>
                        @if (($users->hasRole('Franchise')) || ($users->hasRole('Administrator')))
                        <td>
                            <input type="checkbox" class="assigned_lead" id="{{ $data->id }}">
                            <a class="frenchise-details" href="#" data-bs-toggle="offcanvas" data-bs-target="#viewlead" lead-id="{{ $data->id }}">
                                <span class="badge bg-success"><i class="las la-hands-helping"></i></span>
                            </a><br>

                            @if (!empty($data->assigned_to))
                            @if ($data->assigned_to == $data->added_by_agent_id)
                            <span class="fw-bold">{{$admin_type}}-{{ $franchiseEmail ?? '' }}</span><br>

                            @else
                            Franchise: <span class="fw-bold">{{ $franchiseEmail ?? '' }}</span><br>
                            Sub Agent: <span class="fw-bold">{{ $userEmail ?? '' }}</span>
                            @endif
                            @endif
                        </td>
                        @endif
                        <td><a href="#"><span>{{ $data->created_at->format('Y-m-d') }}</span></a></td>
                        <td>{{ Str::limit($data->driver_type, 12, '...') }}</td>
                        <td>{{ $lead_status->name ?? '' }}</td>
                        <td>
                            <a href="{{ route('view-lead', $data->id) }}">
                                <span>{{ Str::limit($data->first_name, 12, '...') }}</span>
                            </a>
                        </td>
                        <td>
                            <a href="tel:{{ $data->phone_number }}">
                                <span class="badge bg-success fw-bold"><i class="la la-phone"></i> {{ Str::limit($data->phone_number, 12, '...') }}</span>
                            </a>
                        </td>
                        <td><span>{{ Str::limit($data->email, 18, '...') }}</span></td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('manage-lead', $data->id) }}">
                                        <i class="fa-solid fa-users me-1"></i> Manage Lead
                                    </a>
                                    <a class="dropdown-item" href="{{ route('edit-lead', $data->id) }}">
                                        <i class="fa-solid fa-pencil me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('view-lead', $data->id) }}">
                                        <i class="fa-solid fa-eye me-1"></i> View
                                    </a>
                                    @php $existingUser = App\Models\User::where('email', $data->email)->first(); @endphp
                                    @if ($existingUser)
                                    <a class="dropdown-item" href="{{ route('impersonate', $existingUser) }}">
                                        <i class="fa-solid fa-user me-1"></i> Login to {{ Str::limit($data->first_name, 8) }}
                                    </a>
                                    @elseif(!empty($data->email))
                                    <a class="dropdown-item" href="{{ route('create-student-profile', $data->id) }}">
                                        <i class="fa-solid fa-user me-1"></i> Create Profile
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="dataTables_paginate paging_simple_numbers">
                        {{ $lead_list->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="viewlead">
            <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
                <div class="sidebar-headersets">
                    <h5> Reallocated Users</h5>
                </div>

                <div class="sidebar-headerclose">
                    <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="offcanvas-body">
                <div class="row">
                    <div class="card card-stretch-full">
                        <div class="card-body card-body-scrollable table-responsive ">
                            <table class="table table-modern table-hover">
                                
                                <tbody id="agent-details-table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            function setupCSRF() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            function fetchStates(country_id) {
                $('.province_id').empty();
                setupCSRF();
                $.ajax({
                    url: "{{ route('states.get') }}",
                    method: 'get',
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data)) {
                            $('.province_id').append(
                                '<option value="">No records found</option>');
                        } else {
                            $.each(data, function(key, value) {
                                $('.province_id').append('<option value="'+ key +'">' + value +
                                    '</option>');
                            });
                        }
                    }
                });
            }
            fetchStates($('.country').val());
            $('.country').change(function() {
                var country_id = $(this).val();
                fetchStates(country_id);
            });
            $('.frenchise-details').click(function(e) {
                $('.error-message').empty();
                e.preventDefault();
                setupCSRF();
                var lead_id = $(this).attr('lead-id');
                
                $.ajax({
                    url: "{{ route('relocated-frenchise') }}",
                    method: 'get',
                    data: {
                        lead_id: lead_id
                    },
                    success: function(response){
                        $('#agent-details-table').empty();
                        response.forEach(function(entry){
                            var agent_data = `<tr>
                                <td>
                                    <button class="btn btn-outline-primary relocate-button" data-record-id="${entry.id}">Reallocate</button
                                </td>
                                <td>${entry.email}</td>
                                <!-- Add more <td> elements for other data fields as needed -->
                            </tr>`;
                            $('#agent-details-table').append(agent_data);
                        });
                    }
                });
            });
            const t = document.querySelector(".checked_all_lead"),
                o = document.querySelectorAll('[type="checkbox"]');
                t.addEventListener("change", t => {
                o.forEach(e => {
                    e.checked = t.target.checked
                })
            });

            $('#agent-details-table').on('click', '.relocate-button', function() {
               
                var recordId = $(this).data('record-id');
                var checkedIds = [];
                $('#lead-list').find('.assigned_lead').each(function() {
                    if ($(this).prop('checked')) {
                        checkedIds.push($(this).attr('id'));
                    }
                });
                console.log(checkedIds);
                setupCSRF();
                $.ajax({
                    url: "{{route('assign-leads')}}",
                    method: 'Post',
                    data: {
                        leadIds: checkedIds,agentId:recordId
                    },
                    success: function(response){
                        if(response.status){
                                Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }else{
                            Swal.fire({
                            title: 'Warning!',
                            text: response.message,
                            icon: 'warning',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                        }
                    }
                });
            });
        });
    </script>
@endsection