@extends('admin.include.app')
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
                        <li class="breadcrumb-item text-muted">Approve Program / Courses</li>
                    </ol>
                </div>
                @can('programs.create')
                <div class="col-md-2">
                    <a href="{{ route('add-program') }}" class="btn add-btn">
                        <i class="las la-university"></i>Add Program </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
<div class="row">
    <div class="card-group mb-3">
        <div class="card">
            <div class="card-body myform">
                <form id="program_filter" action="{{route('approve-program-filter')}}" method="get">
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control formmrgin" name="program_name" id="program_name" placeholder="Search By Program Name">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control formmrgin" name="univerisity_name" id="university_name" placeholder="Search By University Name">
                        </div>
                        <div class="col-md-4 text-start ">
                            <div>
                                <button type="submit" class="btn mr-3 btn-info d-lg-block float-start  formmrgin px-5 " id="submit" value="1">Search</button>
                            </div>
                            <div>
                                <a href="{{route('approve-program')}}" class="btn mr-3 btn-info d-lg-block float-start ms-3 formmrgin px-5 ">
                                    Reset
                                </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12 ms-2 px-0">
        <div class="table-responsive mb-4">
            <table class="table table-striped custom-table ">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>User Name </th>
                        <th>Program Name </th>
                        <th>Update Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($program as $item)
                    <tr>
                        <td>{{ $loop->index + (($program->currentPage() - 1) * $program->perPage()) + 1 }}</td>
                        @php
                        $user_name=App\Models\User::select('name')->Where('id',$item->user_id)->first();
                        @endphp
                        <td>{{$user_name->name ?? null }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->updated_at}}</td>
                        @can('programs.view')
                        <td><a class="btn btn-primary" href="{{route('view-program',$item->id)}}"> <i class="fa-solid fa-eye"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers py-4" id="pagination">
                        {{$program->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection