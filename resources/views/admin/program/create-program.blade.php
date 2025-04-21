@extends('admin.include.app')
@section('style')
<style>
    .octicon.octicon-light-bulb {
        position: absolute;
        left: 31px;
        top: 43px;
        font-size: 12px;
        width: 99%;
        text-align: center;
    }

    .dropdown-menu {
        min-width: 150px !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"> Add  Driver Job </h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                            <!--  <div class="col-lg-12"><select class="selectpicker" multiple data-live-search="true"><option> UNIVERSITY OF SOUTHERN CALIFORNIA</option><option> HARVARD UNIVERSITY</option><option> COLUMBIA UNIVERSITY</option><option> STANFORD UNIVERSITY</option><option> UNIVERSITY OF CALIFORNIA UCB</option><option> YALE UNIVERSITY</option></select></div> -->
                           
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- resources/views/driver_jobs/create.blade.php -->

                            <div class="container">
                                <h2 class="mb-4">Post a Driver Job</h2>

                                <form action="" method="POST">
                                    @csrf

                                    <!-- Basic Job Information -->
                                    <div class="mb-3">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="location" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Job Type</label>
                                        <select name="job_type" class="form-control" required>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Temporary">Temporary</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Salary / Pay Rate</label>
                                        <input type="text" name="salary" class="form-control">
                                    </div>

                                    <!-- Requirements -->
                                    <div class="mb-3">
                                        <label class="form-label">License Type Required</label>
                                        <input type="text" name="license_type" class="form-control" placeholder="e.g., CDL Class A, LMV, HMV">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Minimum Driving Experience (Years)</label>
                                        <input type="number" name="experience" class="form-control" min="0">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Age Requirement</label>
                                        <input type="number" name="age_requirement" class="form-control" min="18">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Languages Required</label>
                                        <input type="text" name="languages" class="form-control" placeholder="e.g., English, Hindi">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Education Level</label>
                                        <input type="text" name="education_level" class="form-control" placeholder="e.g., High School, Diploma">
                                    </div>

                                    <!-- Vehicle Information -->
                                    <div class="mb-3">
                                        <label class="form-label">Vehicle Provided?</label>
                                        <select name="vehicle_provided" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Type of Vehicle</label>
                                        <input type="text" name="vehicle_type" class="form-control" placeholder="e.g., Sedan, Truck, Van">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Shift Timing</label>
                                        <input type="text" name="shift_timing" class="form-control" placeholder="e.g., Day Shift, Night Shift">
                                    </div>

                                    <!-- Job Description -->
                                    <div class="mb-3">
                                        <label class="form-label">Job Description</label>
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>

                                    <!-- Route Type -->
                                    <div class="mb-3">
                                        <label class="form-label">Route Type</label>
                                        <select name="route_type" class="form-control">
                                            <option value="Local">Local</option>
                                            <option value="Intercity">Intercity</option>
                                            <option value="Interstate">Interstate</option>
                                        </select>
                                    </div>

                                    <!-- Working Hours -->
                                    <div class="mb-3">
                                        <label class="form-label">Working Hours</label>
                                        <input type="text" name="working_hours" class="form-control" placeholder="e.g., 9 AM - 6 PM">
                                    </div>

                                    <!-- Benefits -->
                                    <div class="mb-3">
                                        <label class="form-label">Benefits Offered</label>
                                        <input type="text" name="benefits" class="form-control" placeholder="e.g., Fuel, Accommodation, Bonus">
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="mb-3">
                                        <label class="form-label">Contact Person</label>
                                        <input type="text" name="contact_person" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone / WhatsApp</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <!-- Application Info -->
                                    <div class="mb-3">
                                        <label class="form-label">Application Deadline</label>
                                        <input type="date" name="deadline" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">How to Apply</label>
                                        <textarea name="how_to_apply" class="form-control" rows="3" placeholder="e.g., Send CV to email, Apply online"></textarea>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" class="btn btn-primary">Post Job</button>
                                </form>
                            </div>
                          


                            <br>
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



<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote1').summernote({
        placeholder: ' Write Here',
        tabsize: 2,
        height: 100
    });
    $('#summernote2').summernote({
        placeholder: ' Write Here',
        tabsize: 2,
        height: 100
    });
</script>
<script>
    $(document).ready(function() {
        function csrf() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $('.program_discipline_select').on('change', function() {
            var program_discipline_id = $('#program-discipline').val();
            csrf();
            $.ajax({
                type: "GET",
                url: "{{route('get-program-sub-discipline')}}?program_discipline_id=" + program_discipline_id,
                success: function(res) {
                    if (res) {
                        $(".program_sub_discipline_select").empty();
                        $(".program_sub_discipline_select").append('<option value="">--Select Program Sub Discipline--</option>');
                        $.each(res, function(key, value) {
                            $(".program_sub_discipline_select").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $(".program_sub_discipline_select").empty();
                    }
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const gradingSchemeSelect = document.getElementById('grading_scheme_id');
        const gradingInput = document.getElementById('lead-grading_number');

        gradingSchemeSelect.addEventListener('change', function() {
            validateInput();
        });
        gradingInput.addEventListener('input', function() {
            validateInput();
        });

        function extractMaxGrade(value) {
            const match = value.match(/(\d+)$/);
            return match ? parseInt(match[0], 10) : null;
        }

        function validateInput() {
            const selectedOption = gradingSchemeSelect.options[gradingSchemeSelect.selectedIndex];
            const selectedScheme = selectedOption.getAttribute('grading-data');
            const inputValue = gradingInput.value;
            if (selectedScheme && inputValue !== '') {
                const maxGrade = extractMaxGrade(selectedScheme);
                if (maxGrade && inputValue > maxGrade) {
                    gradingInput.classList.add('is-invalid');
                    $('#grading_input_error').show();
                } else {
                    gradingInput.classList.remove('is-invalid');
                    $('#grading_input_error').hide();
                }
            } else {
                gradingInput.classList.remove('is-invalid');
                $('#grading_input_error').hide();
            }
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const otherExam = document.getElementById('other_exam');
        const otherExamInput = document.getElementById('lead-other-exam-number');
        otherExam.addEventListener('change', function() {
            validateInput();
        });
        otherExamInput.addEventListener('input', function() {
            validateInput();
        });

        function extractMaxGrade(value) {
            const match = value.match(/(\d+)$/);
            return match ? parseInt(match[0], 10) : null;
        }

        function validateInput() {
            const selectedOption = otherExam.options[otherExam.selectedIndex];
            const selectedScheme = selectedOption.getAttribute('other-exam-number');
            const inputValue = otherExamInput.value;
            if (selectedScheme && inputValue !== '') {
                const maxGrade = extractMaxGrade(selectedScheme);
                console.log(maxGrade, inputValue);
                if (inputValue > maxGrade) {
                    otherExamInput.classList.add('is-invalid');
                    $('#other_exam_input_error').show().html(`Invalid input. Please enter a value within ${maxGrade}`);
                } else {
                    otherExamInput.classList.remove('is-invalid');
                    $('#other_exam_input_error').hide();
                }
            } else {
                otherExamInput.classList.remove('is-invalid');
                $('#other_exam_input_error').hide();
            }
        }
    });
</script>
<script>
    function csrf() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    $('#program-level').on('change', function () {
        var selectedOptions = $(this).val();
        csrf();
        $.ajax({
            url: '{{ route("get-program-sublevel") }}',
            type: 'POST',
            data: {
                'program_level_id': selectedOptions
            },
            success: function (data) {
                $('#program-sub-level').empty();
                if (data.length > 0) {
                    $('#program-sub-level').append(`<option value=''>--- Select Sub level ---</option>`);
                    $.each(data, function (index, program_sub_level) {
                        $('#program-sub-level').append(`
                            <option value="${program_sub_level.id}">${program_sub_level.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#program-sub-level').append('<option value="">Not Found</option>');
                }
            }
        });
    });

    $('.program-sub-level').on('change', function () {
        var program_level = $('#program-level').val();
        var program_sub_level = $('#program-sub-level').val();
        csrf();
        $.ajax({
            url: '{{ route("education-level-fetch") }}',
            type: 'POST',
            data: {
                'program_level_id': program_level,
                'program_sublevel_id': program_sub_level
            },
            success: function (data) {
                $('#education-level').empty();
                if (data.length > 0) {
                    $.each(data, function (index, education_level) {
                        $('#education-level').append(`
                            <option value="${education_level.id}">${education_level.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#education-level').append('<option value="">Not Found</option>');
                }
            }
        });
    });

    $('#education-level').on('click', function () {
        var education_level = $('#education-level').val();
        var university_id = $('#school_id').val();

        if (education_level === '') {
            alert('Please Select Education Level');
            return false;
        }
        if (university_id === '') {
            alert('Please Select University');
            return false;
        }

        csrf();
        $.ajax({
            url: '{{ route("fetch-scheme-data") }}',
            type: 'POST',
            data: {
                'education_level_id': education_level,
                'university_id': university_id
            },
            success: function (data) {
                $('#grading_scheme_id').empty();
                if (data.length > 0) {
                    $('#grading_scheme_id').append(`<option value="">--Select Grading Scheme--</option>`);
                    $.each(data, function (index, scheme) {
                        $('#grading_scheme_id').append(`
                            <option value="${scheme.id}" grading-data="${scheme.name}">${scheme.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#grading_scheme_id').append('<option value="">Not Found</option>');
                }
            }
        });
    });

    $('#program-level').on('change', function () {
        var program_id = $(this).val();
        if (program_id === '') {
            alert('Please Select Program Level');
            return false;
        }

        csrf();
        $.ajax({
            url: '{{ route("fetch-other-exam") }}',
            type: 'POST',
            data: {
                'program_id': program_id
            },
            success: function (data) {
                $('#other_exam').empty();
                if (data.length > 0) {
                    $('#other_exam').append(`<option value="">--Select Other Exam--</option>`);
                    $.each(data, function (index, exam) {
                        $('#other_exam').append(`
                            <option value="${exam.id}" other-exam-number="${exam.number}">${exam.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#other_exam').append('<option value="">Not Found</option>');
                }
            }
        });
    });

    $(document).on('change', '.select-grading-scheme', function () {
        var grading_scheme_id = $(this).val();
        $('#grading-number-div').toggle(grading_scheme_id !== '');
    });

    $(document).on('change', '.other-exam', function () {
        var other_exam_id = $(this).val();
        $('#other-exam-input').toggle(other_exam_id !== '');
    });
</script>

@endsection