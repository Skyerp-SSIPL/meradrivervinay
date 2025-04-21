@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a > Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                           Manage Franchise
                        </li>
                    </ol>
                </div>
                @can('learning_franchise.create')
                    <div class="col-md-4 ">
                        <a href="{{ route('learning-franchise.create') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create Franchise</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="card-group mb-md-3">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('learning-agent.index')}}" method="get" class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating">
                    <input id="lead-total_credits" name="name" type="text" class="form-control" placeholder="NAME">
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2 px-3">
              <button type="submit" class="btn btn-info w-100" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 px-3">
                <a href="{{route('learning-agent.index')}}" class="btn btn-info w-100">Reset</a>
            </div>
            <div class="col-md-4"></div>
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
                        <th>Name</th>
                        <th>Pdf</th>
                        <th>video</th>
                        <th>Youtube</th>
                        @can('learning_franchise.update')
                          <th>Edit</th>
                        @endcan
                        @can('learning_franchise.delete')
                          <th>Delete</th>
                        @endcan
                        @if(!Auth::user()->hasRole('Administrator'))
                        <th>Request</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->index + (($data->currentPage() - 1) * $data->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td>
                            @if ($item->pdf)
                                <a href="{{ asset('imagesapi/'.$item->pdf) }}" target="_blank">View PDF</a>
                            @endif
                        </td>
                        <td>
                            @if ($item->video)
                                <video width="200" controls>
                                    <source src="{{ asset('imagesapi/'.$item->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </td>
                        <td class="text-wrap">
                            <iframe width="200"  src="{{$item->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </td>
                        @can('learning_franchise.update')
                          <td><a  href="{{route('learning-franchise.edit',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('learning_franchise.delete')
                          <td><a href="{{route('learning-franchise.delete',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                        @if(!Auth::user()->hasRole('Administrator'))
                        <td><a href="{{route('learning-franchise.request',$item->id)}}" class="btn btn-success"><i class="fa-solid fa-hand-peace"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$data->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
