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
                        <li class="breadcrumb-item text-muted">
                            Manage Program Sub Level
                        </li>
                    </ol>
                </div>
                @can('program_sub_level.create')
                <div class="col-md-2">
                    <a href="{{ route('create-new-program-sub-level') }}" class="btn add-btn">
                        <i class="las la-plus"></i>Create New </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('program-sub-level')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
              <button type="submit" class="btn btn-info px-5 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 col-sm-2 ">
                <a href="{{route('program-sub-level')}}" class="btn btn-info px-5  float-end">
                    Reset
                </a>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Program Name</th>
                        <th>NAME</th>
                        {{-- <th>Order </th> --}}
                        @can('program_sub_level.update')
                        <th>Edit</th>
                        @endcan
                        @can('program_sub_level.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($program_sub_level as $item)
                    <tr>
                        <td>{{ $loop->index + (($program_sub_level->currentPage() - 1) * $program_sub_level->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->programLevel->first()?->name ?? null }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        {{-- <td class="text-wrap">{{ $item->orders }}</td> --}}
                        @can('program_sub_level.update')
                        <td><a  href="{{route('edit-program-sub-level',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('program_sub_level.delete')
                        <td><a href="{{route('delete-program-sub-level',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$program_sub_level->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
