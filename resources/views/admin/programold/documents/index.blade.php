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
                            Manage Documents
                        </li>
                    </ol>
                </div>
                @can('documents.create')
                    <div class="col-md-2">
                        <a href="{{ route('create-documents') }}" class="btn add-btn">
                            <i class="las la-plus"></i>Create New </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-3">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('documents')}}" method="get" class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating">
                    <input id="lead-total_credits" name="name" type="text" class="form-control" placeholder="NAME">
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2 ps-3">
              <button type="submit" class="btn btn-info w-100" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 ps-3">
                <a href="{{route('documents')}}" class="btn btn-info w-100">Reset</a>
            </div>
            <div class="col-md-3 "></div>
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
                        <th>Program</th>
                        <th>Name</th>
                        @can('documents.update')
                          <th>Edit</th>
                        @endcan
                       @can('documents.delete')
                            <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($documents as $item)
                    <tr>
                        <td>{{ $loop->index + (($documents->currentPage() - 1) * $documents->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->programlevel->name }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        {{-- <td class="text-wrap">{{ $item->orders }}</td> --}}
                        @can('documents.update')
                            <td><a  href="{{route('edit-documents',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('documents.delete')
                            <td><a href="{{route('delete-documents',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 py-4">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$documents->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
