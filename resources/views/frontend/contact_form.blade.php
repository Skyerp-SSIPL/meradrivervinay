<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<style>
    .select2-container {
        width: 100% !important;
        margin-bottom: 10px;
    }

    .iti {
        width: 100%;
    }

    input[name="phone"] {
        width: 100%;
    }
</style>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="universities_heading ">
                            <h3 class="fw-bold">Contact OEL</h3>
                            <p> We offer numerous way for you to connect with us.</p>
                        </div>
                        <div class="attractive-bar">
                            <img src="{{asset('frontend/img/contact1.jpg')}}" alt="gif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="universities_heading ">
                            <p>Book your FREE consultation with Certified Counselors.</p>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form action="{{route('contact_us.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control delete  rounded" name="first_name" placeholder="First name" aria-label="First name" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control delete  rounded" name="last_name" placeholder="Last name" aria-label="Last name" required>
                                </div>
                               
                                <div class="col-12 mb-3">
                                    <input type="tel Number" id="phone" class="form-control delete rounded" name="phone" placeholder="Mobile Number" aria-label="Mobile Number">
                               
                                    <input type="hidden" id="phone-number" class="form-control delete rounded" name="phone" value="" placeholder="Mobile Number" aria-label="Mobile Number">
                               
                                 </div>
                                
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                                <script>
                                    const phoneInput = document.querySelector("#phone");

                                    const iti = window.intlTelInput(phoneInput, {
                                        initialCountry: "in",
                                        separateDialCode: true,
                                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                    });


                                    var dialCode = document.querySelector('.iti__selected-dial-code').innerText;
                                  
                                    // Set the dial code value into the input field
                                    
                                    document.getElementById('phone-number').value = dialCode;
                                </script>

                                <!-- <div class="col-12 mb-3">
                                    <select class="form-select " id="inputGroupSelect01">
                                        <option selected="">Nearest Office</option>
                                        <option value="gorakhpur">Gorakhpur</option>
                                        <option value="2">Noida</option>

                                    </select>
                                </div>  -->

                                <!-- <div class="col-12 mb-3">
                                    <input type="text" class="form-control delete rounded" name="preferred_study_destination" placeholder="Preferred Study Destination" aria-label="Preferred Study Destination">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control delete rounded" name="preferred_study_year" placeholder="Preferred Study Year" aria-label="Preferred Study Year">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control delete rounded" name="preferred_study_intake" placeholder="Preferred Study Intake" aria-label="Preferred Study Intake">
                                </div> -->

                                <div class="col-12 mb-3">
                                    <div class="contact-select">
                                        <select class="form-control delete rounded" name="preferred_study_destination" aria-label="Preferred Study Destination">
                                            <option value="" disabled selected>Preferred Study Destination</option>


                                            @foreach(App\Models\Country::select('name', 'id')->where('is_active', 1)->get() as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                            <!-- <option value="USA">USA</option>
                                            <option value="Canada">Canada</option>
                                            <option value="UK">UK</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Germany">Germany</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="contact-select">
                                        <select class="form-control delete rounded" name="preferred_study_year" aria-label="Preferred Study Year" style="max-height: 300px;">
                                            <option value="" disabled selected>Preferred Study Year</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="contact-select">
                                        <select class="form-control delete rounded" name="preferred_study_intake" aria-label="Preferred Study Intake">
                                            <option value="" disabled selected>Preferred Study Intake</option>
                                            <option value="Fall">Fall</option>
                                            <option value="Spring">Spring</option>
                                            <option value="Summer">Summer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label " for="flexCheckDefault">
                                        By clicking you agree to our <span><a href="{{url('/privacy-policy')}}" target="_blank">Privacy Policy</a></span> and <span><a target="_blank" href="{{url('terms-and-conditions')}}">Terms &amp; Conditions</a></span>
                                    </label>
                                </div>
                                <div class="free-code text-center mt-3">
                                    <button class="apply-btn fn border-0 px-4 py-2" type="submit">Get Started for Free</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
