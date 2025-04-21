@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Eng Proficiency level</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>Add Eng Proficiency level</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row " action="{{ route('store-eng-proficiency-level') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-md-6 input-group-adss">
                                        <label>Enter  Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Enter Number<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control " name="number">
                                        @error('number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label for="status">Status<span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </form>
                                <br>
                                <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info  w-25">Submit</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

