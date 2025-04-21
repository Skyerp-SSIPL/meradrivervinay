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
        .dropdown-menu{
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
        <h4 class="card-title mb-0">Edit Program </h4>
    </div>
        <div class="card-body">
          <div class="wizard">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                <!--  <div class="col-lg-12"><select class="selectpicker" multiple data-live-search="true"><option> UNIVERSITY OF SOUTHERN CALIFORNIA</option><option> HARVARD UNIVERSITY</option><option> COLUMBIA UNIVERSITY</option><option> STANFORD UNIVERSITY</option><option> UNIVERSITY OF CALIFORNIA UCB</option><option> YALE UNIVERSITY</option></select></div> -->
                <div class="mb-4">
                  <h3> Edit Program</h3>
                </div>
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
                <form class="row g-4"  action="{{route('update-program',$program->id)}}" method="POST">
                    @csrf
                    @method('post')
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="school_id" id="school_id" placeholder="University / College Name">
                            <option value="">-- University / College Name --</option>
                            @foreach ($universities as $item)
                               <option value="{{$item->id}}" {{ old('school_id') == $item->id ? 'selected' : ($program->school_id == $item->id ? 'selected' : '') }}>{{ implode(' ', array_slice(explode(' ', $item->university_name), 0, 3)) }}</option>
                            @endforeach
                         </select>
                          <label for="school_id" class="form-label">University / College Name <span class="text-danger">*</span></label>
                          @error('school_id')
                                  <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control program_discipline_select" name="program_discipline" id="program-discipline" placeholder="Program Category">
                             <option value="">-- Select Program Discipline --</option>
                             @foreach ($program_discipline as $item)
                                <option value="{{$item->id}}" {{ old('program_discipline') == $item->id ? 'selected' : ($program->program_discipline == $item->id ? 'selected' : '') }}>{{ implode(' ', array_slice(explode(' ', $item->name), 0, 3)) }}</option>
                             @endforeach
                          </select>
                          <label for="lead-program-discipline" class="form-label">Program discipline <span class="text-danger">*</span></label>
                        </div>
                        @error('program_discipline')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-4">
                 
                        <div class="form-floating">
                            <select class="form-control program_sub_discipline_select text-wrap" name="program_subdiscipline" id="program-subdiscipline" placeholder="Program Sub Discipline">
                                <option value="">-- Select Program Sub Discipline --</option>
                                @foreach ($program_subdiscipline as $item)
                             
                                    <option class="text-wrap" value="{{$item->id}}" {{ old('program_subdiscipline') == $item->id ? 'selected' : ($program->program_subdiscipline == $item->id ? 'selected' : '') }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <label for="lead-program-sub-discipline" class="form-label">Program sub discipline</label>
                        </div>
                        @error('program_subdiscipline')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="col-4 ">
                        <div class="form-floating">
                            <select class="form-control  selectpicker" name="subject_id_input"
                                id="subject_id_input" multiple placeholder="Education Level">
                                @foreach ($all_subject as $item)
                                    <option value="{{ $item->id }}" {{ old('subject_id_input') == $item->id ? 'selected' : '' }}>{{ $item->subject_name }}</option>
                                @endforeach
                            </select>
                            <label for="lead-education_level_id" class="form-label">-- Program / Courses Subject --</label>

                        </div>
                        @error('subject_id_input')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div> --}}
                    <div class="col-4">
                        <div class="form-floating">
                            <input  name="name" type="text" class="form-control " value="{{ old('name') ? old('name') : $program->name }}" placeholder="Program / Courses Name" autocomplete="name" >
                            <label for="lead-name" class="form-label">Program / Courses Name <span class="text-danger">*</span></label>
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                            <input id="lead-length" name="length" type="text" class="form-control "  value="{{ old('length') ? old('length') : $program->length }}" placeholder="Program / Courses Duration" autocomplete="length" value="">
                            <label for="lead-length" class="form-label">Program / Courses Duration <span class="text-danger">*</span></label>
                        </div>
                        @error('length')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="programType" id="lead-programType" placeholder="Program / Courses Type">
                             <option value="">-- Select programType --</option>
                             <option value="Full Time" {{ $program->programType == 'Full Time' ? 'selected' : (old('programType') == 'Full Time' ? 'selected' : '') }}>Full Time</option>
                             <option value="Part Time" {{ $program->programType == 'Part Time' ? 'selected' : (old('programType') == 'Part Time' ? 'selected' : '') }}>Part Time</option>
                             <option value="Correspondence" {{ $program->programType == 'Correspondence' ? 'selected' : (old('programType') == 'Correspondence' ? 'selected' : '') }}>Correspondence</option>
                          </select>
                          <label for="lead-programType" class="form-label">Program / Courses Type <span class="text-danger">*</span></label>
                        </div>
                        @error('programType')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control  " name="programCampus" id="lead-programCampus" placeholder="Courses Campus">
                             <option value="">-- Select programCampus --</option>
                             @foreach(['Online', 'On Campus'] as $option)
                                  <option value="{{ $option }}" {{ ($program->programCampus == $option || old('programCampus') == $option) ? 'selected' : '' }}>{{ $option }}</option>
                             @endforeach
                          </select>
                          <label for="lead-programCampus" class="form-label">Courses Campus <span class="text-danger">*</span></label>
                          @error('programCampus')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                       </div>
                    </div>

                   <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-priority" name="priority" type="text" class="form-control" placeholder="Campus" autocomplete="priority" value="{{old('priority') ?? $program->priority}}">
                            <label for="lead-priority" class="form-label">Campus</label>
                        </div>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>







                    
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="lang_spec_for_program" id="lead-lang_spec_for_program" placeholder="Language Specification For Program / Courses">
                             <option value="">-- Select Language --</option>
                             <option value="English" {{ (old('lang_spec_for_program') == 'English' || $program->lang_spec_for_program == 'English') ? 'selected' : '' }}>English</option>
                             <option value="Hindi" {{ (old('lang_spec_for_program') == 'Hindi' || $program->lang_spec_for_program == 'Hindi') ? 'selected' : '' }}>Hindi</option>
                             <option value="Other" {{ (old('lang_spec_for_program') == 'Other' || $program->lang_spec_for_program == 'Other') ? 'selected' : '' }}>Other</option>
                          </select>
                          <label for="lead-lang_spec_for_program" class="form-label">Language Specification For Program<span class="text-danger">*</span></label>
                        </div>
                        @error('lang_spec_for_program')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    {{-- <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="fieldsofstudytype" id="lead-fieldsofstudytype" placeholder="Fields Of Study Type (Degree type offered)">
                             <option value="">-- Select Fields Of Study Type --</option>
                             @foreach ($filed_of_study as $item)
                             <option value="{{$item->id}}" {{ old('fieldsofstudytype ') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                             @endforeach
                            </select>
                          <label for="lead-fieldsofstudytype" class="form-label">Fields Of Study Type (Degree type offered) <span class="text-danger">*</span></label>
                        </div>
                        @error('fieldsofstudytype')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div> --}}

                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="program_level" id="program-level" placeholder="Degree">
                             <option value="">-- Program level--</option>
                             @foreach ($program_level as $item)
                                  <option value="{{$item->id}}" {{ (old('program-level') == $item->id || $item->id == $program->program_level_id) ? 'selected' : '' }}>{{$item->name}}</option>
                             @endforeach
                          </select>
                          <label for="program-level" class="form-label">Program level <span class="text-danger">*</span></label>
                        </div>
                        @error('program_level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control program-sub-level" name="program_sub_level" id="program-sub-level" placeholder="" >
                              <option value="">-- Program Sub level --</option>
                               @foreach ($program_sublevel as $item)
                                    <option value="{{$item->id}}" {{ old('program_sub_level') == $item->id ? 'selected' : ($program->program_sub_level == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                           </select>
                           <label for="lead-program-sub-evel" class="form-label">Program Sub level <span class="text-danger">*</span></label>
                         </div>
                         @error('program_sub_level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                    <div class="col-4" >
                        <div class="form-floating">
                          <select class="form-control " name="education_level" id="education-level" placeholder="Education Level">
                             <option value="">-- Min Education Level Required--</option>
                             @foreach ($education_level as $item)
                                <option value="{{$item->id}}" {{ old('education_level') == $item->id ? 'selected' : (($program->education_level_id == $item->id) ? 'selected' : ( (isset($program->education_level_id) && $program->education_level_id != $item->id) ? '' : 'selected')) }}>{{$item->name}}</option>
                            @endforeach
                          </select>
                          <label for="lead-education-level" class="form-label">Education Level <span class="text-danger">*</span></label>
                        </div>
                        @error('education-level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control select-grading-scheme" name="grading_scheme_id" id="grading_scheme_id" placeholder="Grading Scheme">
                                <option value="">-- Grading Scheme --</option>
                                @foreach ($grading_scheme as $item)
                                    <option value="{{$item->id}}" {{ old('grading_scheme_id') == $item->id ? 'selected' : ($program->grading_scheme_id == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                            </select>

                            <label for="lead-grading_scheme_id" class="form-label">Grading Scheme <span class="text-danger">*</span></label>
                        </div>
                        @error('grading_scheme_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control select-grading-scheme" name="grading_scheme_id" id="grading_scheme_id" placeholder="Grading Scheme">
                                <option value="">-- Grading Scheme --</option>
                                @foreach ($grading_scheme as $item)
                                    <option value="{{$item->id}}" {{ old('grading_scheme_id') == $item->id ? 'selected' : ($program->grading_scheme_id == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <label for="lead-grading_scheme_id" class="form-label">Grading Scheme <span class="text-danger">*</span></label>
                        </div>
                        @error('grading_scheme_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4" id="grading-number-div" style="display: none;">
                        <div class="form-floating">
                            <input type="hidden" name="max_grading_number" id="max_grading_number">
                            <input id="lead-grading_number" name="grading_number" type="text" class="form-control" placeholder="Grading Number" autocomplete="grading_number"
                            value="{{old('grading_number', $program->grading_number ?? '')}}" >
                            <label for="lead-grading_number" class="form-label">Grading Number <span class="text-danger">*</span></label>
                            <div id="grading_input_error" class="text-danger"  style="display: none;">Invalid grade. Please enter a value within the selected grading scheme.</div>
                        </div>
                        @error('grading_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control select-grading-scheme" name="grading_scheme_id" id="grading_scheme_id" placeholder="Grading Scheme">
                                <option value="">-- Grading Scheme --</option>
                                @foreach ($grading_scheme as $item)
                                    <option value="{{$item->id}}" {{ old('grading_scheme_id') == $item->id ? 'selected' : ($program->grading_scheme_id == $item->id ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <label for="lead-grading_scheme_id" class="form-label">Grading Scheme <span class="text-danger">*</span></label>
                        </div>
                        @error('grading_scheme_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4" id="grading-number-div" style="display: none;">
                        <div class="form-floating">
                            <input type="hidden" name="max_grading_number" id="max_grading_number">
                            <input id="lead-grading_number" name="grading_number" type="text" class="form-control" placeholder="Grading Number" autocomplete="grading_number"
                            value="{{old('grading_number', $program->grading_number ?? '')}}" >
                            <label for="lead-grading_number" class="form-label">Grading Number <span class="text-danger">*</span></label>
                            <div id="grading_input_error" class="text-danger"  style="display: none;">Invalid grade. Please enter a value within the selected grading scheme.</div>
                        </div>
                        @error('grading_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-4">
                        <div class="form-floating ">
                            <input id="lead-total_credits" name="total_credits" type="number" class="form-control " placeholder="Total Credits" autocomplete="total_credits" value="{{old('total_credits', $program->total_credits ?? '')}}">
                            <label for="lead-total_credits" class="form-label">Total Credits <span class="text-danger">*</span></label>
                        </div>
                        @error('total_credits')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control other-exam" name="other_exam" id="other_exam" placeholder="" >
                               <option value="">-- Other Exam --</option>
                                @foreach ($other_exam as $item)
                                    <option value="{{$item->id}}" {{$program->other_exam == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                           </select>
                           <label for="lead-other-exam" class="form-label"> Other Exam <span class="text-danger">*</span></label>
                         </div>
                         @error('other_exam')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="col-4" id="other-exam-input" style="display: none;">
                        <div class="form-floating">
                            <input id="lead-other-exam-number" name="other_exam_number" value="{{$program->other_exam_number  ?? null}}" type="number" class="form-control" placeholder="Other Exam Total Score" autocomplete="other-exam-number"
                             value="{{old('other-exam-number')}}" >
                            <label for="lead-other-exam-number" class="form-label">Other Exam Total Score <span class="text-danger">*</span></label>
                            <div id="other_exam_input_error" class="text-danger"  style="display: none;">Invalid input. Please enter a value within the selected other exam.</div>
                        </div>
                        @error('other-exam-number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control other-exam" name="other_exam" id="other_exam" placeholder="" >
                              <option value="">-- Other Exam --</option>
                              @foreach ($other_exam as $item)
                                <option value="{{$item->id}}" {{$program->other_exam == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           <label for="lead-other-exam" class="form-label"> Other Exam <span class="text-danger">*</span></label>
                         </div>
                         @error('other_exam')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div> --}}
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_fee" name="application_fee" type="number" class="form-control " placeholder="Application Fees in INR" autocomplete="application_fee" value="{{old('application_fee', $program->application_fee ?? '')}}">
                            <label for="lead-application_fee" class="form-label">Application Fees in INR <span class="text-danger">*</span></label>
                        </div>
                        @error('application_fee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                            <input id="lead-application_apply_date" name="application_apply_date" type="date" class="form-control " placeholder="Application Apply Date" autocomplete="application_apply_date"  value="{{old('application_apply_date', $program->application_apply_date ?? '')}}">
                            <label for="lead-application_apply_date" class="form-label">Application Apply Date <span class="text-danger">*</span></label>
                        </div>
                        @error('application_apply_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-application_closing_date" name="application_closing_date" type="date" class="form-control date-input" placeholder="Application Closing Date" autocomplete="application_closing_date" value="{{old('application_closing_date_input', $program->application_closing_date ?? '')}}">
                            <label for="lead-application_closing_date" class="form-label">Application Closing Date <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="application_closing_date" id="application_closing_date_option1" value="ASAP" {{ old('application_closing_date', $program->application_closing_date) == 'ASAP' ? 'checked' : '' }}>
                            <label class="form-check-label" for="application_closing_date_option1">
                              ASAP
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="application_closing_date" id="application_closing_date_option2" value="TBD" {{ old('application_closing_date', $program->application_closing_date) == 'TBD' ? 'checked' : '' }}>
                            <label class="form-check-label" for="application_closing_date_option2">
                              TBD
                            </label>
                        </div>
                        @error('application_closing_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('.date-input').on('change', function() {
                                var date = $(this).val();
                                $('input[name="application_closing_date"][value="'+date+'"]').prop('checked', true);
                            });
                            $('input[name="application_closing_date"]').on('change', function() {
                                var date = $(this).val();
                                if (date == 'ASAP' || date == 'TBD') {
                                    $('.date-input').val('');
                                }
                            });
                        });
                    </script>
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tution_fee" name="tution_fee" type="number" class="form-control " placeholder="Tution Fee" autocomplete="tution_fee" value="{{old('tution_fee', $program->tution_fee ?? '')}}">
                            <label for="lead-tution_fee" class="form-label">Tution Fee <span class="text-danger">*</span></label>
                        </div>
                        @error('tution_fee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="currency" id="lead-currency" placeholder="Currency">
                             <option value="">-- Currency --</option>
                             @foreach ($currency as $item)
                                <option value="{{$item->currency}}" {{ (old('currency', $program->currency) == $item->currency) ? 'selected' : '' }}>{{$item->currency}}</option>
                             @endforeach
                          </select>
                          <label for="lead-currency" class="form-label">Currency</label>
                        </div>
                        @error('currency')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="intake" id="lead-intake" placeholder="Intake">
                             <option value="">--Select--</option>
                             @foreach (range(1, 12) as $month)
                                <option value="{{ date('m', mktime(0, 0, 0, $month, 10)) }}" {{ old('intake', $program->intake) == date('m', mktime(0, 0, 0, $month, 10)) ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                             @endforeach
                          </select>
                          <label for="lead-intake" class="form-label">Intake <span class="text-danger">*</span></label>
                        </div>
                        @error('intake')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                       <div class="form-floating">
                          <select class="form-control " name="year" id="lead-year" placeholder="Year">
                             <option value="">-- Select Year --</option>
                             @foreach (range((int)date('Y'), (int)date('Y') + 10) as $year)
                                <option value="{{ $year }}" {{ old('year', $program->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                             @endforeach
                          </select>
                          <label for="lead-year" class="form-label">Year <span class="text-danger">*</span></label>
                        </div>
                        @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control" name="work_experience" id="lead-work-experience" placeholder="Work Experience">
                                <option value="">-- Select Work Experience --</option>
                                <option value="1" {{ old('work_experience', $program->work_experience) == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('work_experience', $program->work_experience) == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            <label for="lead-work-experience" class="form-label">Work Experience <span class="text-danger">*</span></label>
                        </div>
                        @error('work_experience')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-min_gpa" name="min_gpa" type="number" class="form-control " placeholder="Minimum GPA" autocomplete="min_gpa" value="{{old('min_gpa')}}">
                            <label for="lead-min_gpa" class="form-label">Minimum GPA <span class="text-danger">*</span></label>
                        </div>
                        @error('min_gpa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-tags" name="tags" type="text" class="form-control " placeholder="Course Tags" autocomplete="tags" value="{{old('tags') ?? $program->tags}}">
                            <label for="lead-tags" class="form-label">Course Tags</label>
                        </div>
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
              <!--  <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-priority" name="priority" type="number" class="form-control " placeholder="Priority" autocomplete="priority" value="{{old('priority') ?? $program->priority}}">
                            <label for="lead-priority" class="form-label">Priority</label>
                        </div>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div> -->
                    {{-- <div class="col-4">
                        <div class="form-floating">
                            <input id="lead-other_requirements" name="other_requirements" type="text" class="form-control " placeholder="Other Requirements (Eligibility Of Program / Courses)" autocomplete="other_requirements" value="">
                            <label for="lead-other_requirements" class="form-label">Other Requirements (Eligibility Of Program / Courses)</label>
                        </div>
                        @error('other_requirements')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div> --}}
                    <div class="col-12">
                       <label>Description</label>
                        <textarea name="details" id="summernote1" cols="30" rows="10">{!! old('details') ?? $program->description !!}</textarea>
                    </div>

                    <div class="col-12">
                        <label>Extra Notes</label>
                         <textarea name="extra_notes" id="summernote2" cols="30" rows="10">{!! old('details') ?? $program->extra_notes !!}</textarea>
                         @error('notes')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <div class="col-12 w-50"><button type="submit" class="btn btn-info  py-6 ">Submit</button></div>
                 </form>
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

 {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
 {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
          const gradingSchemeSelect = document.getElementById('grading_scheme_id');
          const gradingInput = document.getElementById('lead-grading_number');
          gradingSchemeSelect.addEventListener('change', function () {
              validateInput();
          });
          gradingInput.addEventListener('input', function () {
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
      document.addEventListener('DOMContentLoaded', function () {
            const otherExam = document.getElementById('other_exam');
            const otherExamInput = document.getElementById('lead-other-exam-number');
            otherExam.addEventListener('change', function () {
                validateInput();
            });
            otherExamInput.addEventListener('input', function () {
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
                    console.log(maxGrade,inputValue);
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
    $(document).ready(function(){
        function csrf(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function program_displine(program_discipline_id){
            var selectedStateId = $('#program-sub-discipline').val();
            csrf();
            $.ajax({
                type:"GET",
                url:"{{route('get-program-sub-discipline')}}?program_discipline_id="+program_discipline_id,
                success:function(res){
                    if(res){
                        $(".program_sub_discipline_select").empty();
                        $(".program_sub_discipline_select").append('<option value="">--Select Program Sub Discipline--</option>');
                        $.each(res,function(key,value){
                            var selected = (key == selectedStateId) ? 'selected' : '';
                            $(".program_sub_discipline_select").append('<option value="'+value.id+'"' + selected + '>'+value.name+'</option>');
                        });
                    }else{
                        $(".program_sub_discipline_select").empty();
                    }
                }
            });
        }
        $('.program_discipline_select').on('change',function(){
            var program_discipline_id = $('#program-discipline').val();
            program_displine(program_discipline_id);
        });
    });
</script>
<script>
    // function showEducationLevel(programLevelId) {
    //     $.ajax({
    //         url: "{{route('get-education-level')}}",
    //         type: "POST",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             programLevelId: programLevelId,
    //         },
    //         success: function(response) {
    //             var educationLevel = $('#lead-education-level');
    //             educationLevel.empty();
    //             educationLevel.append("<option value=''>-- Education Level--</option>");
    //             response.forEach(element => {
    //                 educationLevel.append("<option value='"+element.id+"'>"+element.name+"</option>");
    //             });
    //         }
    //     });
    // }
</script>
<script>
    function csrf(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
    $('#program-level').on('change',function() {
        var selectedOptions = $(this).val();
        csrf();
        $.ajax({
            url: '{{ route('get-program-sublevel') }}',
            type: 'POST',
            data: {
                'program_level_id': selectedOptions
            },
            success: function(data) {
                $('#program-sub-level').empty();
                if (data.length > 0) {
                    $('#program-sub-level').append(`<option value=''>--- Select Sub level ---</option>`);
                    $.each(data, function(index, program_sub_level) {
                        $('#program-sub-level').append(`
                        <option value="${program_sub_level.id}">${program_sub_level.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#program-sub-level').empty().append('<option value="">Not Found</option>');
                }
            }
        });
     });
     $('.program-sub-level').on('change',function() {
        var program_level =$('#program-level').val();
        var program_sub_level =$('#program-sub-level').val();
        csrf();
        $.ajax({
            url: '{{ route('education-level-fetch') }}',
            type: 'POST',
            data: {
                'program_level_id': program_level,
                'program_sublevel_id': program_sub_level
            },
            success: function(data) {
                if (data.length > 0) {
                    $('#education-level').empty();
                    $.each(data, function(index, education_level) {
                        $('#education-level').append(`
                            <option value="${education_level.id}">${education_level.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#education-level').empty().append('<option value="">Not Found</option>');
                }
            }
        });
    });
    // grading_scheme_id
    // $('.select-grading-scheme').on('click',function(){
    $('#education-level').on('click',function(){
        var education_level = $('#education-level').val();
        var univerisity_id = $('#school_id').val();
        if (education_level === '') {
            alert('Please Select Education Level');
            return false;
        }
        if (univerisity_id === '') {
            alert('Please Select University');
            return false;
        }
        csrf();
        $.ajax({
            url: '{{ route('fetch-scheme-data') }}',
            type: 'POST',
            data: {
                'education_level_id': education_level,
                'university_id': univerisity_id
            },
            success: function(data) {
                if (data.length > 0) {
                    $('#grading_scheme_id').empty();
                    $('#grading_scheme_id').append(`
                        <option value="">--Select Grading Scheme--</option>
                    `);
                    $.each(data, function(index, education_level) {
                        $('#grading_scheme_id').append(`
                            <option value="${education_level.id}" grading-data ="${education_level.name}">${education_level.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#grading_scheme_id').empty().append('<option value="">Not Found</option>');
                }
            }
        });
    });
    // $('.other-exam').on('click',function(){
    $('#program-level').on('change',function(){
        var program_id = $('#program-level').val();
        if (program_id === '') {
            alert('Please Select Program Level');
            return false;
        }
        csrf();
        $.ajax({
            url: '{{ route('fetch-other-exam') }}',
            type: 'POST',
            data: {
                'program_id': program_id,
            },
            success: function(data) {
                if (data.length > 0) {
                    $('#other_exam').empty();
                    $('#other_exam').append(`
                        <option value="">--Select Other Exam--</option>
                    `);
                    $.each(data, function(index, other_exam) {
                        $('#other_exam').append(`
                            <option value="${other_exam.id}" other-exam-number="${other_exam.number}">${other_exam.name.toUpperCase()}</option>
                        `);
                    });
                } else {
                    $('#other_exam').empty().append('<option value="">Not Found</option>');
                }
            }
        });
    });
    $('.select-grading-scheme').on('change', function() {
        $('#grading-number-div').toggle(this.value != '');
    }).trigger('change');
    $('.other-exam').on('change', function() {
        $('#other-exam-input').toggle(this.value != '');
    }).trigger('change');
    // $(document).on('change','.other-exam',function(){
    //     var grading_scheme_id = $(this).val();
    //     if(grading_scheme_id != ''){
    //         $('#other-exam-input').show();
    //     }else{
    //         $('#other-exam-input').hide();
    //     }
    // })
</script>
@endsection

