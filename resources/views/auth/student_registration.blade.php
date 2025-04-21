@extends('frontend.layouts.main')
@section('content')
<div class="main-content">
   <style type="text/css">
      .url_link {
         position: relative;
         color: #3a67f0;
         font-weight: 600;
         text-decoration: underline;
      }

      .form-group label {
         margin-bottom: 10px !important;

      }

      .form-group,
      .form-control {
         width: 100% !important
      }

      #send_otp,
      #register {
         height: unset !important;
      }

      .invalid-feedback {
         display: block !important;
      }

      #resendOTP {
         display: flex;
      }

      .otp_success {
         display: none;
         padding: 10px;
         background: #e0ffe7;
         border-radius: 4px;
         margin-bottom: 10px;
      }

      .otp_success p {
         font-size: 13px;
         margin-bottom: 13px;
      }

      #resend_otp {
         text-decoration: underline;
         cursor: pointer;
         color: #007bff;
      }

      .required {
         color: red;
      }
   </style>
   <style>
      .form-input {
         width: 100%;
         padding: 4px 20px;
         font-size: 18px;
         font-weight: 500;
         color: #070758 !important;
         background-color: #f7f9ff !important;
         border: 2px solid #07075857 !important;
         border-radius: 0px !important;
         box-shadow: 0 4px 6px rgba(7, 7, 88, 0.1);
      }

      .form-input:focus {
         outline: none;
         border-color: #070758 important;
         background-color: #eef2ff important;
         box-shadow: 0 6px 10px rgba(7, 7, 88, 0.2);
      }

      .form-input:hover {
         background-color: #eef2ff important;
         border-color: #4a4eff important;
         box-shadow: 0 6px 12px rgba(134, 135, 160, 0.3);
      }

      .form-input::placeholder {
         color: rgba(7, 7, 88, 0.27);
         font-weight: 600;
         font-size: 16px;
      }

      .radio-input {
         appearance: none;
         width: 16px;
         height: 16px;
         border: 1px solid #070758;
         border-radius: 50%;
         outline: none;
      }

      .styled-form {
         background-color: #f5f7fa;
         padding: 30px;
         border-radius: 1px;
         box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);

      }

      .form-button {
         background: #070758 !important;
         color: #ffff;
         padding: 12px 30px !important;
         border-radius: 6px;
         border: none;
         font-size: 16px !important;
      }

      .form-footer {
         padding: 10px;
         font-family: Arial, sans-serif;
         color: #333;
      }

      .form-footer .footer-link {
         color: #070758;
         font-weight: bold;
         text-decoration: none;
         transition: color 0.3s ease;
      }

      .form-footer .footer-link:hover {
         color: #4a4eff;
      }
   </style>
   <section class="register-section">
      <div class="container">
         <div class="register-box">

            @if (session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
            </div>
            @endif
            <!-- Login Form -->
            <div class="styled-form">
               <form id="contact-form" method="POST" action="{{route('student-store')}}" aria-label="Register">
                  <div class="sec-title text-center mb-30">
                     <h2 class="title mb-10 fs-md-1 fw-bold">Student Registration</h2>
                  </div>
                  <div class="row  clearfix">
                     @csrf

                     <div class="row g-3">
                        <div class="col-md-6 px-md-3">
                           <div class="form-group">
                              <label class=" fw-bold">Name <span class="required">*</span></label>
                              <input id="name_input" type="text" name="name" value="{{old('name')}}" class="form-control form-input" placeholder="Enter Name">
                              <span class="invalid-feedback" role="alert" id="name_error">
                              </span>
                           </div>
                           @error('name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="form-group">
                              <label class=" fw-bold" for="exampleInputEmail1">Email address <span class="required">*</span></label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control form-input " id="email" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              <span id="email_error" class="invalid-feedback" role="alert">
                              </span>
                              @error('email')
                              <span class="text-danger"> {{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="form-group">
                              <label class=" fw-bold" for="exampleInputPhoneNumber1">Mobile No. <span class="required">*</span></label>
                              <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control form-input" placeholder="Phone Number">
                              <span id="phone_number_error" class="invalid-feedback" role="alert">
                              </span>
                              @error('phone_number')
                              <span class="text-danger"> {{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="form-group">
                              <label class=" fw-bold">Password <span class="required">*</span></label>
                              <input type="password" name="password" value="" class="form-control form-input" placeholder="Password" id="password_box">
                              <span id="password_error" class="invalid-feedback" role="alert">
                              </span>
                              @error('password')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="form-group">
                              <label class=" fw-bold">Confirm Password <span class="required">*</span></label>
                              <input type="password" name="password_confirmation" value="" class="form-control form-input" placeholder="Confirm Password">
                              <span id="password_confirmation_error" class="invalid-feedback" role="alert">
                              </span>
                              @error('password_confirmation')
                              <span class="text-danger"> {{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <p class="otp_failed text-danger"></p>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="form-group" style="display :none;" id="otpDiv">
                              <label class=" fw-bold" for="VerifyOtp">Enter OTP</label>
                              <input type="text" class="form-control form-input" id="VerifyOtp" placeholder="OTP">
                           </div>
                        </div>
                        <div class="col-md-6 px-md-3">
                           <div class="otp_success">
                              <p class="success_messages">One Time Password Sent To Your Email &amp; Phone No.</p>
                              <p>
                                 <a type="button" class="loading_button" id="resend_otp">
                                    <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span>Resend OTP</span>
                                 </a>
                              </p>
                              <p id="resendOTPText"></p>
                           </div>
                        </div>
                        <div class="form-group col-md-12  text-center">
                           <button type="Submit" class="readon submit-btn" id="send_otp">Register</button>
                        </div>
                     </div>

                     <!-- <div class="form-group col-md-12  form-footer">
                        <div class="users">Already have an account? <a href="https://overseaseducationlane.com/login">Login</a></div>

                        <div> <a href="{{route('franchise-register')}}" class="url_link">Register as a Franchise</a></div>
                        
                        {{-- <div><a href="{{route('counselor_register')}}" class="url_link">Register as a Counselor</a></div> --}}

                        <div class="users">
                        By joining OEL, you agree to OEL's Student
                        <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                        </div>
                     </div> -->
                     <div class="form-group col-md-12 form-footer">
                        <div class="users text-center">
                           Already have an account?
                           <a href="https://overseaseducationlane.com/login" class="footer-link">Login</a>
                        </div>
                        <div class="footer-divider">
                           <div class="text-center">
                              <a href="{{route('franchise-register')}}" class="url_link footer-link">Register as a Franchise</a>
                           </div>
                           <div class="footer-divider">
                              {{--<div class="text-center">
                              <a href="{{route('counselor_register')}}" class="url_link footer-link">Register as a Counselor</a>
                                 </div> --}}
                           <div class="footer-divider">
                              <div class="users text-center">
                                 By joining OEL, you agree to OEL's Student
                                 <a href="{{url('privacy-policy')}}" class="footer-link">Privacy Policy</a>
                              </div>
                           </div>

                        </div>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   <script type="text/javascript">
      let buttons = document.querySelectorAll(".loading_button");
      for (let i = 0; i < buttons.length; i++) {
         let button = buttons[i];
         button.addEventListener("click", function() {
            button.firstElementChild.style.display = "inline-block";
         });
      }
   </script>
</div>
@endsection