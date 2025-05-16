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
                        <a href="index.php"> Home</a>
                     </li>
                     <li class="breadcrumb-item text-muted">Add driver</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div clas="row">
   <div class="col-md-12">
      <div class="card bg-white px-0 mx-0 ">
       
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
                  <a class="nav-link disabled" id="educational_information" href="#basictab3" href="#basictab3" data-bs-toggle="tab" aria-selected="true" role="tab">Documents Details </a>
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
                           <select class="form-control" name="source" placeholder="Source Type">
                              <option value="">--- Source type ---</option>
                              @foreach ($source as $item)
                              <option value="{{$item->name}}">{{$item->name}}</option>
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
                              @foreach ($driverCtagoryStatus as $status)
                              <option value="{{ $status->id }}" >
                                 {{ $status->name }}
                              </option>
                              @endforeach
                           </select>
                           <span class="text-danger driver_category_status"></span>
                           <label for="driver_category_status" class="form-label">Category Status</label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="driver_type" placeholder="Driver type">
                              <option value="">-- driver type --</option>
                              @foreach ($driver_type as $item)
                              <option value="{{$item->name}}">{{$item->name}}</option>
                              @endforeach
                           </select>
                           <span class="text-danger driver_type"></span>
                           <label for="driver_type" class="form-label">Driver type<span class="text-danger">*</span></label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-name" name="first_name" type="text" class="form-control" placeholder="First Name" autocomplete="name" required>
                           <input id="lead-name" type="hidden" name="tab1" value="tab1">
                           <input type="hidden" name="id" class="uniquevalue" value="">
                           <label for="lead-name" class="form-label">First Name <span class="text-danger">*</span></label>
                           <span class="text-danger first_name"></span>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name">
                           <label for="lead-last_name" class="form-label">Last Name</label>
                           <span class="text-danger last_name"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-father_name" name="father_name" type="text" class="form-control" placeholder="Father Name" autocomplete="father_name">
                           <label for="lead-father_name" class="form-label">Father Name</label>
                           <span class="text-danger father_name"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-father_name" name="mother_name" type="text" class="form-control" placeholder="Mother Name" autocomplete="father_name" value="">
                           <label for="lead-father_name" class="form-label">Mother Name</label>
                           <span class="text-danger father_name"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-email" name="email" type="email" class="form-control" placeholder="Email" autocomplete="email" value="">
                           <label for="lead-email" class="form-label">Email <span class="text-danger">*</span></label>
                           <span class="text-danger email"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-phone_number" name="phone_number" type="number" class="form-control" placeholder="Phone" autocomplete="phone_number" value="">
                           <label for="lead-phone_number" class="form-label">Phone <span class="text-danger">*</span></label>
                           <span class="text-danger phone_number"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input  name="emergency_no" type="number" class="form-control" placeholder="Emergency Number" autocomplete="phone_number1">
                           <label for="emergency-number" class="form-label">Emergency Number</label>
                           <span class="text-danger phone_number1"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <input name="dob" style="background: f8f9fa !important" type="date" class="form-control" placeholder="Date of Birth" autocomplete="dob" value="">
                           <label for="lead-dob" class="form-label">Date of Birth</label>
                           <span class="text-danger dob"></span>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="martial_status" placeholder="Marital Status">
                              <option value="">-- Marital Status --</option>

                              <option value="Married">Married </option>
                              <option value="Unmarried ">Unmarried </option>
                              <option value="Divorced  ">Divorced </option>

                           </select>
                           <label for="lead-source" class="form-label">Marital Status </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="gender" placeholder="Gender">
                              <option value="">-- Gender --</option>

                              <option value="Male">Male </option>
                              <option value="Female ">Female </option>

                           </select>
                           <label for="lead-source" class="form-label">Gender</label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="passport_number" type="number" class="form-control" value="">
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

                           <select class="form-control" name="religion" placeholder="Source">
                              <option value="">-- Religion --</option>
                              @foreach($religions as $item)
                              <option value="{{$item}}">{{$item}}</option>

                              @endforeach

                           </select>
                           <label for="lead-source" class="form-label">Religion </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="color" id="">
                              <option value="">-- Color --</option>

                              <option value="Yes">Light Skin</option>
                              <option value="No">Dark Skin</option>

                           </select>
                           <label for="color" class="form-label">Color </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control" name="language" id="">
                              <option value="">-- Language --</option>
                              <option value="Bhojpuri">Bhojpuri</option>
                              <option value="Hindi">Hindi</option>
                              <option value="English">English</option>
                              <option value="Other">Other</option>

                           </select>
                           <label for="language" class="form-label">Language </label>
                        </div>
                     </div>


                     <div class="col-4">
                        <div class="form-floating">
                           <input name="age" type="text" class="form-control" value="">
                           <label for="age" class="form-label">Age </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="height" type="text" class="form-control" value="">
                           <label for="height" class="form-label">Height </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input name="weight" type="text" class="form-control" value="">
                           <label for="weight" class="form-label">Weight </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">
                           <select class="form-control country" name="country_id">
                              <option value="">-- Select Country --</option>
                              @foreach ($countries as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                           </select>
                           <label for="country_id" class="form-label">Country</label>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-floating">

                           <select name="province_id" class="form-control province_id" required>

                              <option value=""></option>

                           </select>
                           <label for="state" class="form-label">State </label>
                        </div>
                     </div>

                     <div class="col-4">
                        <div class="form-floating">
                           <input id="lead-name" name="zip" type="text" class="form-control" value="">

                           <label for="pincode" class="form-label">PinCode</label>
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="form-floating">
                           <textarea name="address" class="form-control w-100"></textarea>
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
                                 <option value="{{ $level }}">{{ $level }}</option>
                                 @endforeach
                              </select>
                              <label for="education_level" class="form-label">Education </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="vechile_driver_training" id="">
                                 <option value="">-- Training Status --</option>

                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>

                              </select>
                              <label for="vechile_driver_training" class="form-label">Training Status </label>

                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="driver_certificate" type="file" class="form-control" value="">

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
                                 <option value="{{$item}}">{{$item}}</option>
                                 @endforeach
                              </select>
                              <label for="interested_in" class="form-label">Eye Vision </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="health_insurance_status" id="">
                                 <option value="">-- Health Insurance Status --</option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
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
                                 <option value="{{ $group }}">{{ $group }}</option>
                                 @endforeach
                              </select>
                              <span class="text-danger source"></span>
                              <label for="blood-group" class="form-label">Blood Group</label>
                           </div>
                        </div>

                        <div class="col-6">
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
                     <form class="row g-4" id="tab3DataForm">


                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="licence_type">
                                 <option value="">-- License Details --</option>
                                 @foreach ($licensetype as $item)
                                 <option class="option" value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="licence-type" class="form-label"> License Details</label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="vechicle_type">
                                 <option value="">-- Vechicle Type --</option>

                                 <option class="option" value="HUV">HUV</option>
                                 <option class="option" value="MUV">MUV</option>
                                 <option class="option" value="SUV">SUV</option>
                                 <option class="option" value="SEDAN">SEDAN</option>

                              </select>
                              <label for="vechicle-type" class="form-label"> Vechicle Type </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_no" type="text" class="form-control">
                              <label for="licens-no" class="form-label">Driving License No </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_issue_date" type="date" class="form-control">
                              <label for="license-issue-date" class="form-label">DL Issue Date</label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="license_exp_date" type="date" class="form-control">
                              <label for="license-exp-date" class="form-label">DL Expired date </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="police_verification_status">
                                 <option value="">-- Pulice Verified status --</option>

                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>

                              </select>
                              <label for="police-verification-status" class="form-label"> Pulice Verified status </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="pulice_verification_no" type="pulice_verification_no" class="form-control">
                              <label for="pulice-verification-no" class="form-label">Pulice Verified No </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input name="pulice_verification_doc" type="file" class="form-control">


                              <label for="pulice-verification-doc" class="form-label">Pulice Verified upload </label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="job_type" placeholder="Source">
                                 <option value="">-- Job Type --</option>
                                 @foreach ($job_type as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="job-type" class="form-label">Job Type</label>
                           </div>
                        </div>

                        <input type="hidden" name="id" class="uniquevalue" value="">
                        <input id="lead-name" type="hidden" name="tab3" value="tab3">

                        <div class="col-4">
                           <div class="form-floating">
                              <select name="total_experiance" class="form-control">
                                 <option value="">Experiance</option>
                                 <option value="1">1 Year </option>
                                 <option value="2">2 Year</option>
                                 <option value="2">3 Year</option>
                              </select>
                              <label for="total-experiance" class="form-label"> Experiance</label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input type="text" name="current_sallery" class="form-control" value="" placeholder="Current Sallary">
                              <label for="current-sallery" class="form-label">Current Salary</label>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <select name="expected_sallery" class=" form-control">
                                 <option value="">Expected Salary</option>
                                 @foreach ($expected_sallery as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                              <label for="expected-sallery" class="form-label">Expected Salary</label>
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
                              <input type="hidden" id="student_id" name="id" class="uniquevalue" value="">
                               
                                 <label class="form-label">Document Upload</label>
                              </div>
                           </div>

                           <div class="col-4 d-flex align-items-end">
                              <button type="button" id="uploadBtn" class="btn btn-primary">Upload</button>
                              <button type="button" id="nextBtn" class="btn btn-success ms-2" style="display: none;">Next</button>
                           </div>
                        
                        <div class="col-6">
                           <button type="button" class="btn btn-info btn-sm" id="gotab2">Previous</button>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-info btn-sm" id="tab3datasubmit">Save &amp; Continue</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="tab-pane" id="basictab4" role="tabpanel">
                  <div class="tab-pane show active" id="basictab4" role="tabpanel">
                     <div id="responseMessagetab4"></div>
                     <form class="row g-4" id="tab4DataForm">
                        <div class="col-4">
                           <div class="form-floating">
                              <select class="form-control" name="payment_mode">
                                 <option value="">-- Perfered Payment Mode --</option>

                                 <option class="option" value="Cheque">Cheque</option>
                                 <option class="option" value="Cash">Cash</option>
                                 <option class="option" value="NEFT">NEFT</option>
                                 <option class="option" value="RTGS">RTGS</option>
                                 <option class="option" value="Online">Online</option>

                              </select>
                              <label for="payment-mode" class="form-label"> Perfered Payment Mode </label>
                           </div>
                        </div>

                        <div class="col-4">
                           <div class="form-floating">
                              <input name="amount" type="text" class="form-control" placeholder="Amount" autocomplete="last_name" value="">
                              <label for="amount" class="form-label">Amount</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input name="payment_receipt_date" type="date" class="form-control" placeholder="Bank Name" autocomplete="last_name" value="">
                              <label for="payment-receipt-date" class="form-label">Payment Receipt Date</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="bank_name" type="text" class="form-control" placeholder="bank Name" autocomplete="last_name">
                              <label for="bank-name" class="form-label">Bank Name</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input id="lead-last_name" name="bank_account_no" type="text" class="form-control" placeholder="Bank account No" autocomplete="last_name">
                              <label for="bank-account-no" class="form-label">Bank Account No</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="ifsc_code" type="text" class="form-control" placeholder="IFSC Code" autocomplete="last_name">
                              <label for="ifsc-code" class="form-label">IFSC Code</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="branch_name" type="text" class="form-control" placeholder="Branch Name" autocomplete="last_name">
                              <label for="branch-name" class="form-label">Branch Name</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="form-floating">
                              <input  name="upi_id" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name">
                              <label for="upi-id" class="form-label">UPI ID/cheque No</label>
                              <span class="text-danger last_name"></span>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-floating">
                              <textarea name="remarks" class="form-control w-100"></textarea>
                              <label for="remarks" class="form-label">Remarks</label>
                          
                             
                              <input type="hidden" name="id" class="uniquevalue" value="">
                            <input id="lead-name" type="hidden" name="tab4" value="tab4">

                           </div>
                        </div>
                        <div class="col-6">
                           <button type="button" class="btn btn-info btn-sm" id="gotab3">Previous</button>
                        </div>
                        <div class="col-2">
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
        fetchStates($('.country').val());
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
                  console.log(response);
                    $('.uniquevalue').val(response.id);
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
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

                    $('.driver_category_status').html(response.errors.driver_category_status);
                    $('.driver_type').html(response.errors.driver_type);

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
        $('#tab3datasubmit').on('click', function() {
            var tab3formData = $('#tab3DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab3formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    if(response.tab3 == 'tab3'){
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
                        title: response.message,
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            var originUrl = window.location.origin;
                            window.location.href = originUrl + '/admin/leads-lists';
                        }
                    });
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                    });
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
