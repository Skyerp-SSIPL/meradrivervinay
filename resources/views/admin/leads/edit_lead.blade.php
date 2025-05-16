@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="page-header">
   <div class="row">
      <div class="card card-buttons">
         <div class="card-body">
            <div class="row">
               <div class="col-md-10">
                  <ol class="breadcrumb text-muted mb-0">
                     <li class="breadcrumb-item">
                        <a href="{{url('admin/leads-lists')}}"> Home</a>
                     </li>
                     <li class="breadcrumb-item text-muted">Edit Driver</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div clas="row">
   <div class="col-md-12">
      <div class="card bg-white">
        
         <div id="responseMessage"></div>
         <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item" role="presentation">
                  <a class="nav-link active  disabled" id="personal_information" href="#basictab1" data-bs-toggle="tab" aria-selected="true" role="tab">Personal Details</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link disabled" id="basic_info" href="#basictab2" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Education & Health Details</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link disabled" id="educational_information" href="#basictab3" href="#basictab3" data-bs-toggle="tab" aria-selected="true" role="tab">Documents</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link disabled" id="intake" href="#basictab4" href="#basictab3" data-bs-toggle="tab" aria-selected="true" role="tab">Payment Details</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                  <form class="row g-4" id="tab1DataForm">
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="source" placeholder="source Type">
                              <option value="">--- Source type ---</option>
                              @foreach ($source as $item)
                              <option value="{{$item->name}}" {{ $item->name == $studentData->source ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           <span class="text-danger source"></span>
                           <label for="source" class="form-label">Source type</label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="driver_category_status" placeholder="Driver Category Status">
                              <option value="">--- Category Status ---</option>
                              <!-- @php
                              $statuses = ['Verified (KYC & Payment done)', 'Unverified (KYC & Payment not done)', 'Blocked','High Rated Driver (5*)','Verified (Payment done & KYC not done)','Verified (KYC done & Payment not done)'];
                              @endphp -->
                              @foreach ($driverCtagoryStatus as $status)
                              <option value="{{ $status->id }}" {{ $studentData->driver_category_status == $status->id ? 'selected' : '' }}>
                                 {{ $status->name }}
                              </option>
                              @endforeach
                           </select>
                           <span class="text-danger source"></span>
                           <label for="driver-category-status" class="form-label">Category Status</label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="driver_type" placeholder="Driver Type">
                              <option value="">--- Driver type ---</option>
                              @foreach ($driver_type as $item)
                              <option value="{{$item->name}}" {{ $item->name == $studentData->driver_type ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           <span class="text-danger source"></span>
                           <label for="lead-driver_type" class="form-label">Driver type</label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-name" name="first_name" type="text" class="form-control" placeholder="First Name" autocomplete="name" value="{{$studentData->first_name}}">
                           <input id="lead-name" type="hidden" name="tab1" value="tab1">
                           <input type="hidden" name="id" class="uniquevalue" value="{{$studentData->id}}">
                           <label for="lead-name" class="form-label">First Name</label>
                           <span class="text-danger first_name"></span>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name" value="{{$studentData->last_name}}">
                           <label for="lead-last_name" class="form-label">Last Name</label>
                           <span class="text-danger last_name"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-father_name" name="father_name" type="text" class="form-control" placeholder="Father Name" autocomplete="father_name" value="{{$studentData->father_name}}">
                           <label for="lead-father_name" class="form-label">Father Name</label>
                           <span class="text-danger father_name"></span>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-father_name" name="mother_name" type="text" class="form-control" placeholder="Mother Name" autocomplete="father_name" value="{{$studentData->mother_name}}">
                           <label for="lead-father_name" class="form-label">Mother Name</label>
                           <span class="text-danger father_name"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-email" name="email" type="email" class="form-control" placeholder="Email" autocomplete="email" value=" {{$studentData->email}}">
                           <label for="lead-email" class="form-label">Email</label>
                           <span class="text-danger email"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-phone_number" name="phone_number" type="number" class="form-control" placeholder="Phone" value="{{$studentData->phone_number}}">
                           <label for="lead-phone_number" class="form-label">Phone</label>
                           <span class="text-danger phone_number"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input  name="emergency_no" type="number" class="form-control" value="{{$studentData->emergency_no}}">
                           <label for="emergency-no" class="form-label">Emergency Number</label>
                           <span class="text-danger phone_number1"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input name="dob" style="background: f8f9fa !important" type="date" class="form-control" placeholder="Date of Birth" value="{{$studentData->dob}}">
                           <label for="lead-dob" class="form-label">Date of Birth</label>
                           <span class="text-danger dob"></span>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="martial_status" placeholder="Martial Status">
                              <option value="">-- Marital status --</option>

                              <option value="Married" {{ $studentData->martial_status == 'Married' ? 'selected' : '' }}>Married </option>
                              <option value="Unmarried " {{ $studentData->martial_status == 'Unmarried' ? 'selected' : '' }}>Unmarried </option>
                              <option value="Divorced  " {{ $studentData->martial_status == 'Divorced' ? 'selected' : '' }}>Divorced </option>

                           </select>
                           <label for="martial-status" class="form-label">Marital status </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="gender" placeholder="Gender">
                              <option value="">-- Select Gender --</option>
                              <option value="Male" {{ $studentData->gender == 'Male' ? 'selected' : '' }}>Male </option>
                              <option value="Female " {{ $studentData->gender == 'Female' ? 'selected' : '' }}>Female </option>
                           </select>
                           <label for="gender" class="form-label">Select Gender</label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="passport_number" type="number" class="form-control" value="{{$studentData->passport_number}}">
                           <label for="passport" class="form-label">Passport Number</label>
                           <span class="text-danger phone_number1"></span>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <?php

                           $religions = [
                              'Hindu',
                              'Muslim',
                              'Christian',
                              'Sikh',
                              'Buddhist',
                              'Jain',
                              'Parsi',
                              'Jewish',
                              'Atheist',
                              'Agnostic',
                              'Other',
                              'Prefer not to say',
                           ];

                           ?>

                           <select class="form-control" name="religion" placeholder="Religion">
                              <option value="">-- Religion --</option>
                              @foreach($religions as $item)
                              <option value="{{$item}}" {{ $item == $studentData->religion ? 'selected' : '' }}>{{$item}}</option>

                              @endforeach

                           </select>
                           <label for="lead-religion" class="form-label"> Religion </label>
                        </div>

                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="color" id="">
                              <option value="">-- Color --</option>

                              <option value="Yes" {{$studentData->color == 'Yes' ? 'selected' : ''}}>Light Skin</option>
                              <option value="No" {{$studentData->color == 'No' ? 'selected' : ''}}>Dark Skin</option>

                           </select>
                           <label for="color" class="form-label">Color </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="language" id="">
                              <option value="">-- Language --</option>
                              <option value="Bhojpuri" {{$studentData->language == 'Bhojpuri' ? 'selected' : ''}}>Bhojpuri</option>
                              <option value="Hindi" {{$studentData->language == 'Hindi' ? 'selected' : ''}}>Hindi</option>
                              <option value="English" {{$studentData->language == 'English' ? 'selected' : ''}}>English</option>
                              <option value="Other"   {{$studentData->language == 'Other' ? 'selected' : ''}}>Other</option>

                           </select>
                           <label for="language" class="form-label">Language </label>
                        </div>
                     </div>


                     <div class="col-4">
                        <div class="form-floating">
                           <input name="age" type="text" class="form-control" value="{{ $studentData->age}}">
                           <label for="age" class="form-label">Age </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="height" type="text" class="form-control" value="{{ $studentData->height}}">
                           <label for="height" class="form-label">Height </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="weight" type="text" class="form-control" value="{{ $studentData->weight}}">
                           <label for="weight" class="form-label">Weight </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control country" name="country_id">
                              <option value="">-- Select Country --</option>
                              @foreach ($countries as $item)
                              <option value="{{$item->id}}" {{ $item->id == $studentData->country_id ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           <label for="country_id" class="form-label">Country</label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           @php
                           $state =DB::table('province')->where('id',$studentData->province_id)->first();
                           @endphp
                           <select name="province_id" class="form-control province_id" required>
                              @if(!empty($studentData->province_id))
                              <option value="{{$studentData->province_id}}" selected>{{$state->name}}</option>
                              @endif
                           </select>
                           <label for="state" class="form-label">State/Provision </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-name" name="zip" type="text" class="form-control" value="{{$studentData->zip}}">

                           <label for="pincode" class="form-label">PinCode</label>
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="form-floating">
                           <textarea name="address" class="form-control w-100">{{$studentData->address}}</textarea>
                           <label for="address" class="form-label">Address</label>
                        </div>
                     </div>



                     <div class="col-12">
                        <button type="button" id="tab1datasubmit" class="btn btn-info btn-sm">Save &amp; Continue</button>
                     </div>
                  </form>
               </div>
               <div class="tab-pane" id="basictab2" role="tabpanel" style="display: ">
                  <div class="tab-pane show active" id="basictab2" role="tabpanel">
                     <form class="row g-4" id="tab2DataForm">

                        <?php
                        $educationLevels = [
                           "No Formal Education",
                           "Primary School (Class 1–5)",
                           "Secondary School (Class 6–10)",
                           "Higher Secondary (Class 11–12)",
                           "Diploma / Certification Course",
                           "Bachelor's Degree",
                           "Master's Degree",
                           "Doctorate / PhD"
                        ];
                        ?>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="education_level">
                                 <option value="">-- Education --</option>
                                 @foreach ($educationLevels as $level)
                                 <option value="{{ $level }}" {{ $level == $studentData->education_level ? 'selected' : '' }}>{{ $level }}</option>
                                 @endforeach
                              </select>
                              <label for="education_level" class="form-label">Education </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="vechile_driver_training" id="">
                                 <option value="">-- Training Status --</option>

                                 <option value="Yes" {{$studentData->driver_training == 'Yes' ? 'selected' : ''}}>Yes</option>
                                 <option value="No" {{$studentData->driver_training == 'No' ? 'selected' : ''}}>No</option>

                              </select>
                              <label for="vechile_driver_training" class="form-label">Training Status </label>

                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="vechile_driver_certificate" type="file" class="form-control" value="{{ $studentData->vechile_driver_certificate}}">

                              <input id="lead-name" type="hidden" name="tab2" value="tab2">
                              <input type="hidden" name="id" class="uniquevalue" value="">
                              <label for="training_in" class="form-label">Training Certificate </label>
                           </div>
                        </div>


                        <div class="col-4">
                           <div class="form-floating">

                              <?php

                              $eyeVisions = [
                                 'Normal Vision',
                                 'Normal with Glasses',
                                 'Low Vision (6/18)',
                                 'Low Vision (6/24)',
                                 'Color Blind (Red-Green)',
                                 'Color Blind (Blue-Yellow)',
                                 'Night Vision Impaired',
                                 'Vision Corrected with Lenses',
                                 'Monocular Vision (One Eye)',
                                 'Vision Test Pending',
                              ];
                              ?>

                              <select class="form-control country" name="eye_vision" id="">
                                 <option value="">-- Eye Vision --</option>

                                 @foreach($eyeVisions as $item)
                                 <option value="{{$item}}" {{ $item == $studentData->eye_vision ? 'selected' : '' }}>{{$item}}</option>
                                 @endforeach
                              </select>
                              <label for="eye_vision" class="form-label">Eye Vision </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="health_insurance_status" id="">
                                 <option value="">-- Health Insurance Status --</option>

                                 <option value="Yes" {{$studentData->health_insurance_status == 'Yes' ? 'selected' : ''}} >Yes</option>
                                 <option value="No" {{$studentData->health_insurance_status == 'No' ? 'selected' : ''}}> No</option>

                              </select>

                              <label for="interested_in" class="form-label">Health Insurance Status </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="blood_group" placeholder="Blood Group">
                                 <option value="">--- Select Blood Group ---</option>
                                 @php
                                 $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                 @endphp
                                 @foreach ($bloodGroups as $group)
                                 <option value="{{ $group }}" {{ $studentData->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                                 @endforeach
                              </select>
                              <span class="text-danger source"></span>
                              <label for="blood-group" class="form-label">Blood Group</label>
                           </div>
                        </div>

                        <div class="col-4">
                           <button type="button" class="btn btn-info btn-sm" id="gotab1">Previous</button>
                        </div>
                        <div class="col-4">
                           <button type="button" id="tab2datasubmit" class="btn btn-info btn-sm">Save &amp; Continue</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="tab-pane" id="basictab3" role="tabpanel">
                  <div class="tab-pane show active" id="basictab3" role="tabpanel">
                     <form class="row g-4" id="tab3DataForm" enctype="multipart/form-data">


                       
                        <input type="hidden" name="id" class="uniquevalue" value="">
                        <input id="lead-name" type="hidden" name="tab3" value="tab3">
                       
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="licence_type">
                                 <option value="">-- License Details --</option>
                                 @foreach ($licensetype as $item)
                                 <option class="option" value="{{$item->id}}" {{ $item->id == $studentData->license_type ? 'selected' : '' }}>{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="licence-type" class="form-label"> License Details</label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="vechicle_type">
                                 <option value="">-- Vechicle Type --</option>

                                 <option class="option" value="HUV" {{ $studentData->vechicle_type == 'HUV' ? 'selected' : '' }}>HUV</option>
                                 <option class="option" value="MUV" {{ $studentData->vechicle_type == 'MUV' ? 'selected' : '' }}>MUV</option>
                                 <option class="option" value="SUV" {{ $studentData->vechicle_type == 'SUV' ? 'selected' : '' }}>SUV</option>
                                 <option class="option" value="SEDAN" {{ $studentData->vechicle_type == 'SEDAN' ? 'selected' : '' }}>SEDAN</option>

                              </select>
                              <label for="vechicle-type" class="form-label"> Vechicle Type </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_no" type="text" class="form-control" value="{{ $studentData->license_no}}">
                              <label for="license-no" class="form-label">Driving License No </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_issue_date" type="date" class="form-control" value="{{ $studentData->license_issue_date}}">
                              <label for="license-issue-date" class="form-label">DL Issue Date</label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_exp_date" type="date" class="form-control" value="{{ $studentData->license_exp_date}}">
                              <label for="license_exp_date" class="form-label">DL Expired date </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="police_verification_status">
                                 <option value="">-- Police Verified status --</option>

                                 <option value="Yes" {{ $studentData->pulice_verification_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                 <option value="No" {{ $studentData->pulice_verification_status == 'No' ? 'selected' : '' }}>No</option>

                              </select>
                              <label for="pulice-verification-status" class="form-label"> Police Verified status </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="pulice_verification_no" type="number" class="form-control" value="{{ $studentData->pulice_verification_no}}">
                              <label for="police_verification_no" class="form-label">Police Verified No </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input name="pulice_verification_doc" type="file" class="form-control" value="{{ $studentData->pulice_verification_document}}">


                              <label for="pulice_verification_doc" class="form-label">Police Verified upload </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="job_type" placeholder="job type">
                                 <option value="">-- Jobs Type --</option>
                                 @foreach ($job_type as $item)
                                 <option value="{{$item->id}}" {{ $item->id == $studentData->job_type ? 'selected' : '' }}>{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="job-type" class="form-label">Job Type</label>
                           </div>
                        </div>
                      
                        <div class="col-4">
                           <div class="form-floating">
                              <select name="total_experiance" class="form-control">
                                 <option value="">Experiance</option>
                                 <option value="1" {{ $studentData->total_exp == '1' ? 'selected' : '' }}>1 Year</option>
                                 <option value="2" {{ $studentData->total_exp == '2' ? 'selected' : '' }}>2 Year</option>
                                 <option value="2" {{ $studentData->total_exp == '3' ? 'selected' : '' }}>3 Year</option>


                              </select>
                              <label for="total-experiance" class="form-label">Experiance</label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input type="text" name="current_sallery" class="form-control" value="{{ $studentData->current_salary}}" placeholder="Current Sallary">
                              <label for="current-salary" class="form-label">Current Salary</label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select name="expected_sallery" class=" form-control">
                                 <option value="">Expected Salary</option>
                                 @foreach ($expected_sallery as $item)
                                 <option value="{{$item->id}}" {{ $item->id == $studentData->expected_salary ? 'selected' : '' }}>{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="expected-salary" class="form-label">Expected Salary</label>
                           </div>
                        </div>
                      
                           <div class="col-4">
                              <div class="form-floating">
                                 <select class="form-control" id="document_type" required>
                                    <option value="">-- Document Category --</option>
                                    @foreach ($documentType as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                 </select>
                                 <label class="form-label">Document Category</label>
                              </div>
                           </div>

                           <div class="col-4">
                              <div class="form-floating">
                                 <input type="file" id="document_upload" class="form-control" required>
                              <input type="hidden" id="student_id" name="id" class="uniquevalue" value="{{$studentData->id}}">
                               
                                 <label class="form-label">Document Upload</label>
                              </div>
                           </div>

                           <div class="col-4 d-flex align-items-end">
                              <button type="button" id="uploadBtn" class="btn btn-primary">Upload</button>
                              <button type="button" id="nextBtn" class="btn btn-success ms-2" style="display: none;">Next</button>
                           </div>
                       
                       

                        <div class="col-2">
                           <button type="button" class="btn btn-info btn-sm" id="gotab2">Previous</button>
                        </div>
                        <div class="col-4">
                           <button type="button" class="btn btn-info btn-sm" id="tab3datasubmit">Save & Continue</button>
                        </div>
                     </form>
                     



                  </div>
               </div>
               <div class="tab-pane" id="basictab4" role="tabpanel">
                  <div class="tab-pane show active" id="basictab4" role="tabpanel">
                     <div id="responseMessagetab4"></div>
                     <form class="row g-4" id="tab4DataForm" enctype="multipart/form-data">

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="payment_mode">
                                 <option value="">-- Perfered Payment Mode --</option>

                                 <option class="option" value="Cheque" {{$studentData->payment_mode == 'Cheque' ? 'selected' : ''}}>Cheque</option>
                                 <option class="option" value="Cash" {{$studentData->payment_mode == 'Cash' ? 'selected' : ''}}>Cash</option>
                                 <option class="option" value="NEFT" {{$studentData->payment_mode == 'NEFT' ? 'selected' : ''}}>NEFT</option>
                                 <option class="option" value="RTGS" {{$studentData->payment_mode == 'RTGS' ? 'selected' : ''}}>RTGS</option>
                                 <option class="option" value="Online" {{$studentData->payment_mode == 'Online' ? 'selected' : ''}}>Online</option>

                              </select>
                              <label for="payment-mode" class="form-label"> Perfered Payment Mode </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="amount" type="text" class="form-control" placeholder="Bank Name" autocomplete="last_name" value="{{$studentData->amount}}">
                              <label for="amount" class="form-label">Amount</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input name="payment_receipt_date" type="date" class="form-control" placeholder="Bank Name" autocomplete="last_name" value="{{$studentData->payment_receipt_date}}">
                              <label for="payment-receipt-date" class="form-label">Payment Receipt Date</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="bank_name" type="text" class="form-control" placeholder="Bank Name" autocomplete="bank_name" value="{{$studentData->bank_name}}">
                              <label for="lead-last_name" class="form-label">Bank Name</label>
                              <input id="lead-name" type="hidden" name="tab4" value="tab4">
                              <input type="hidden" name="id" class="uniquevalue" value="{{$studentData->id}}">

                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="bank_account_no" type="text" class="form-control" placeholder="Bank Name" autocomplete="last_name" value="{{$studentData->bank_account}}">
                              <label for="lead-last_name" class="form-label">Bank Account No</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="ifsc_code" type="text" class="form-control" placeholder="Last Name" autocomplete="ifsc_code" value="{{$studentData->ifsc_code}}">
                              <label for="lead-last_name" class="form-label">IFSC Code</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input id="lead-last_name" name="branch_name" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name" value="{{$studentData->branch_name}}">
                              <label for="lead-last_name" class="form-label">Branch Name</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input id="lead-last_name" name="upi_id" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name" value="{{$studentData->upi_id}}">
                              <label for="lead-last_name" class="form-label">UPI ID/cheque No</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-floating">
                              <textarea name="remarks" class="form-control w-100">{{$studentData->comments}}</textarea>
                              <label for="lead-dob" class="form-label">Remarks</label>
                           </div>
                        </div>
                        <div class="col-4">
                           <button type="button" class="btn btn-info btn-sm" id="gotab3">Previous</button>
                        </div>
                        <div class="col-4">
                           <button type="button" class="btn btn-info btn-sm" id="tab4datasubmit">Save &amp; Continue</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('.province_id').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('.province_id').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        // fetchStates($('.country').val());
        $('.country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
        $('#tab1datasubmit').on('click', function() {
            var tab1formData = $('#tab1DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab1formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    $('.uniquevalue').val(response.id);
                    if(response.tab1 == 'tab1'){
                     $('#basictab1').hide();
                     $('#basictab3').hide();
                     $('#basictab4').hide();
                     $('#basictab2').show();
                     $('#basic_info').addClass('active');
                     $('#personal_information').removeClass('active');
                     $('#educational_information').removeClass('active');
                     $('#intake').removeClass('active');
                    }
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    $('.source').html(response.errors.source);
                    $('.first_name').html(response.errors.first_name);
                    $('.middle_name').html(response.errors.middle_name);
                    $('.last_name').html(response.errors.last_name);
                    $('.father_name').html(response.errors.father_name);
                    $('.email').html(response.errors.email);
                    $('.phone_number').html(response.errors.phone_number);
                    $('.phone_number1').html(response.errors.phone_number1);
                    $('.dob').html(response.errors.dob);
                }
            });
        });
        $('#tab2datasubmit').on('click', function() {
            var tab2formData = $('#tab2DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab2formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    if(response.tab2 == 'tab2'){
                    $('#basictab1').hide();
                    $('#basictab2').hide();
                    $('#basictab4').hide();
                    $('#basictab3').show();
                    $('#educational_information').addClass('active');
                    $('#personal_information').removeClass('active');
                    $('#basic_info').removeClass('active');
                    $('#intake').removeClass('active');
                    }
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                }
            });
        });
            $('#tab3datasubmit').on('click', function(e) {
               e.preventDefault(); // prevent default form submission

               var form = $('#tab3DataForm')[0]; // get raw DOM element
               var tab3formData = new FormData(form); // use FormData to include files

               $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });

               $.ajax({
                  url: '{{ route('add-leadData-tab') }}',
                  type: 'POST',
                  data: tab3formData,
                  contentType: false, // important for file upload
                  processData: false, // important for file upload
                  success: function(response) {
                        Swal.fire({
                           title: 'Success!',
                           text: response.message,
                           icon: 'success',
                           confirmButtonText: 'Ok'
                        });

                        if (response.tab3 == 'tab3') {
                           $('#basictab1').hide();
                           $('#basictab2').hide();
                           $('#basictab3').hide();
                           $('#basictab4').show();
                           $('#intake').addClass('active');
                           $('#personal_information').removeClass('active');
                           $('#basic_info').removeClass('active');
                           $('#educational_information').removeClass('active');
                        }
                  },
                  error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response); // log error for debugging
                  }
               });
            });

        $('#tab4datasubmit').on('click', function() {
            var tab4formData = $('#tab4DataForm').serialize();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab4formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                }
            });
        });
        $('#gotab1').on('click',function(){
            $('#basictab1').show();
            $('#basictab3').hide();
            $('#basictab4').hide();
            $('#basictab2').hide();
            $('#basic_info').removeClass('active');
            $('#personal_information').addClass('active');
            $('#educational_information').removeClass('active');
            $('#intake').removeClass('active');
        });
        $('#gotab2').on('click',function(){
            $('#basictab1').hide();
            $('#basictab2').show();
            $('#basictab4').hide();
            $('#basictab3').hide();
            $('#educational_information').removeClass('active');
            $('#personal_information').removeClass('active');
            $('#basic_info').addClass('active');
            $('#intake').removeClass('active');
        });
        $('#gotab3').on('click',function(){
            $('#basictab1').hide();
            $('#basictab2').hide();
            $('#basictab3').show();
            $('#basictab4').hide();
            $('#intake').removeClass('active');
            $('#personal_information').removeClass('active');
            $('#basic_info').removeClass('active');
            $('#educational_information').addClass('active');
        });
        $('#interested').on('change',function() {
            var selectedValue = $(this).val();
            if (selectedValue == 2) {
                $('.programoption').show();
            } else {
                $('.programoption').hide();
            }
        });
    });
</script>
<script>
   document.getElementById('documentUploadForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      let formData = new FormData(this);

      

      fetch("{{ route('student.upload.document') }}", {
         method: 'POST',
         headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
         },
         body: formData
      })
      .then(response => response.json())
      .then(data => {
         if (data.success) {
            alert('Document uploaded successfully.');
            document.getElementById('nextBtn').style.display = 'inline-block';
         } else {
            alert('Upload failed. Please try again.');
         }
      })
      .catch(error => {
         console.error(error);
         alert('An error occurred.');
      });
   });

   document.getElementById('nextBtn').addEventListener('click', function () {
      // Reset form for next upload
      document.getElementById('documentUploadForm').reset();
      this.style.display = 'none';
   });
</script>

<script>
   document.getElementById('uploadBtn').addEventListener('click', function () {
      const documentType = document.getElementById('document_type').value;
      const fileInput = document.getElementById('document_upload');
      const student_id = document.getElementById('student_id').value;

      const file = fileInput.files[0];

      if (!documentType || !file) {
         alert("Please select document type and upload a file.");
         return;
      }

      const formData = new FormData();
      formData.append('document_type', documentType);
   
      formData.append('student_id', student_id);
      formData.append('document_upload', file);

      fetch("{{ route('student.upload.document') }}", {
         method: 'POST',
         headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
         },
         body: formData
      })
      .then(response => response.json())
      .then(data => {
         if (data.success) {
            alert("Uploaded successfully!");
            document.getElementById('nextBtn').style.display = 'inline-block';
            document.getElementById('uploadBtn').disabled = true;
         } else {
            alert("Upload failed.");
         }
      })
      .catch(error => {
         console.error(error);
         alert("An error occurred.");
      });
   });

   document.getElementById('nextBtn').addEventListener('click', function () {
      document.getElementById('document_type').value = '';
      document.getElementById('document_upload').value = '';
      document.getElementById('uploadBtn').disabled = false;
      this.style.display = 'none';
   });
</script>


@endsection
