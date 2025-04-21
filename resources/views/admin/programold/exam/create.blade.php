@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Exam</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>Add Exam</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('store-exam') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-6 input-group-adss">
                                        <label>Program Level<span class="text-danger">*</span></label>
                                        <select class="form-control " name="program_level_id">
                                            <option value="">Select Program Level</option>
                                            @foreach ($programlevels as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('program_level_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss">
                                        <label>Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="number" >
                                        @error('number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss">
                                        <label>Enter Exam Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </form>
                                <div class="col-12 justify-content-center d-flex">
                                        <button type="submit" class="btn btn-info  py-6 w-25">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

