@extends('frontend.layouts.main')
@section('title', 'Home')
@section('content')
<section>
    <div class="airplane_Section ">
        <div class="airplane_section_title">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center b-flv">
                    <div class="col-lg-5">
                        <div class="sec_air_Plane d-none d-lg-block">
                            <h1 class=" fw-bold">Dreaming of Studying <br>
                                Abroad? <sapn class="text-black">We're Here to</sapn> <br>
                                Guide You!</h1>
                            <div class="btns mt-5">
                                <a href="{{url('contact-us')}}">
                                    <button class="text-white p-2 border-0 px-4 border rounded">Enquiry now</button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="main_air">
                            <div class="airplane-gif">
                                <img src="{{asset('/frontend/gif/gif in blue (1)_1 (1).gif')}}" width="w-100" height="auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="all_media_icon">
        <div class="icon_social ">
            <a href="https://www.facebook.com/overseasedu.lane/"><img src="{{asset('/frontend/img/facebook.png')}}"></a>
            <a href="https://in.linkedin.com/in/overseaseducationlane?trk=public_profile_samename-profile"> <img src="{{asset('/frontend/img/linkdin.png')}}"></a>
            <a href="https://www.youtube.com/@OverseasEducationLane1"><img src="{{asset('/frontend/img/youtube.png')}}"></a>
            <a href="https://www.instagram.com/overseaseducation_lane/"><img src="{{asset('/frontend/img/instagram.png')}}"></a>
            <a href="https://twitter.com/LaneEducation"> <img src="{{asset('/frontend/img/twitter.png')}}"></a>
        </div>
    </div>
</section>
<!-- <section>
  <a href="https://wa.me/918929922525?text=Hello,%20I%20am%20interested%20in%20your%20services!"
    target="_blank"
    class="whatsapp-icon"
  >
    <img src="{{asset('frontend/img/whatsapp.png')}}" alt="WhatsApp Logo">
  </a>
</section> -->

<section>
    <div class="marquee_section ">
        <img src="{{asset('frontend/img/transparent gif.gif')}}">

    </div>
</section>
<section>
    <div class="marquee_section_text ">
        <marquee>
            <P> <b>Study in Italy for FREE: 100% tuition waiver + €7,000 stipend<b> <a href="https://overseas.skylabserp.com/contact-us"> Apply Now</a> || <b> Study in the USA: Application Fee waiver + up to $9,840 scholarships –</b><a href="https://overseas.skylabserp.com/contact-us"> Apply Now </a> || <b>Study Master’s/MBA in the UK for just ₹12 lakhs:</b> <a href="https://overseas.skylabserp.com/contact-us"> Apply Now </a> || <b>Study in Barcelona! UK-quality education in €6,500/year, –</b> <a href="https://overseas.skylabserp.com/contact-us"> Apply Now </a> || <b>Study in South Korea: upto 100% scholarship!<b> <a href="https://overseas.skylabserp.com/contact-us"> Apply Now </a> || <b>Applications are currently open For Sep 2025 Intake-<b> <a href="https://overseas.skylabserp.com/contact-us"> Apply Now </a></P>
        </marquee>
    </div>
</section>
<section>
    <div class="container d-block d-xl-none d-lg-none">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec_air_Plane text-center mt-5 mb-5">
                    <h1 class="fw-bold">Dreaming of Studying <br>
                        Abroad? <sapn class="text-black">We're Here to</sapn> <br>
                        Guide You!</h1>
                    <div class="btns mt-5">
                        <a href="{{url('contact-us')}}">
                            <button class="text-white p-2 border-0 px-4 border rounded">Enquiry now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="student_titles pt-5 pb-5">
        <div class="students_form">
            <div class="container">
                <div class="main_form_students">
                    <h1 class="text-center heading text-center fw-bold">
                        WE TAKE STUDENTS FROM A STAGE OF
                    </h1>
                    <P class="text-center frd mb-5">We are a dedicated team of experienced education counselors and registered visa agents, committed to guiding you through every stage of the admissions and visa process. Reach out to us today for personalized assistance and expert support..</P>
                </div>
                <div class="row g-4">
                    @foreach ($service as $item)
                    <div class="col-lg-3">
                        <a href="{{ url('service-details') }}/{{$item->id}}" class=" text-dark text-decoration-none">
                            <div class="buddy_icon rounded">
                                <div class="buddy_title"></div>
                                <div class="buddy_img text-center">
                                    <img src="{{ asset('/imagesapi') }}/{{$item->image}}">
                                    <div class="confusion mt-4">
                                        <h4 class="text-center fw-bold imgg">{{ $item->name }}</h4>
                                        @php
                                        $content = strip_tags($item->content);
                                        $shortContent = Str::limit($content, 100);


                                        echo $shortContent;
                                        @endphp
                                    </div>
                                </div>
                                <!-- <div class="text-center fw-bold pt-2">Read more... </div> -->
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="about_us_title position-relative">
        <!-- <div class="sign_flower">
            <div class="sign_flower_int position-absolute top-0 end-0 ">
                <img src="{{asset('frontend/img/bg-partial-3.svg.png')}}" alt="paritial">
            </div>
        </div> -->
    </div>
    <div class="container ">
        <div class="about_int">
            <div class="row">
                <div class="col-lg-6">
                    <div class="s_img mt-4">
                        <img src="{{asset('frontend/img/tree.png')}}" usemap="#image-map" style="height: auto; width: 100%; max-width: 575px;" id="tree-responsive-image">
                        <map name="image-map">
                            <area target="_blank" alt="Meet OEL Counselors" title="Meet OEL Counselors" href="{{url('/meetoel')}}" coords="280,418,261,411,245,405,226,406,205,417,189,425,164,433,142,436,123,424,120,401,131,386,144,371,157,363,176,354,204,353,234,358,256,373,268,389,276,401" shape="poly">

                            <area target="_blank" alt="Psychometric Test" title="Psychometric Test" href="{{url('/psychometricstest')}}" coords="193,329,165,343,136,361,115,382,105,391,89,399,68,402,54,390,48,383,46,362,50,350,57,341,70,332,86,325,105,323,120,322,134,323,161,324,178,326,188,326" shape="poly">
                            <area target="_blank" alt="Country Program &amp; University Selection" title="Country Program &amp; University Selection" href="{{url('/countryprogram')}}" coords="202,307,158,307,145,306,120,309,98,304,78,301,61,293,28,271,15,246,11,229,7,210,11,193,19,177,27,169,39,159,58,150,85,149,112,153,130,173,157,185,173,198,194,219,224,271,236,296,234,321" shape="poly">
                            <area target="_blank" alt="University Application Assistance" title="University Application Assistance" href="{{url('/admissionguidance')}}" coords="200,178,173,164,151,157,131,150,115,148,97,142,83,131,73,112,71,90,79,73,95,64,114,59,134,61,151,73,167,85,176,103,185,118,191,138,197,155,200,176" shape="poly">
                            <area target="_blank" alt="Test praparation" title="Test praparation" href="{{url('/testprepration')}}" coords="210,142,198,129,187,109,180,96,174,76,171,53,174,31,180,15,200,5,223,7,236,9,250,23,257,47,252,60,242,75,234,94,224,112,218,125,215,141" shape="poly">
                            <area target="_blank" alt="University Test Praparation" title="University Test Praparation" href="{{url('/pretestprepration')}}" coords="240,240,232,221,226,190,227,161,229,136,238,109,249,85,275,54,294,40,324,37,339,55,347,75,346,107,340,131,324,157,303,177,284,195,271,205,258,221,243,233243,238" shape="poly">
                            <area target="_blank" alt="Resume Evaluation &amp; praparation of SOP etc" title="Resume Evaluation &amp; praparation of SOP etc" href="{{url('/resumeevaluation')}}" coords="333,208,344,185,352,162,357,134,354,105,355,86,359,63,372,42,391,39,412,42,427,63,431,84,431,108,421,135,406,152,388,169,369,186,347,197,342,204" shape="poly">
                            <area target="_blank" alt="Accommodation" title="Accommodation" href="{{url('/accommodation')}}" coords="272,311,267,298,261,284,262,264,271,246,283,228,300,218,323,214,339,226,348,243,342,271,323,280,301,287,284,298,275,304" shape="poly">
                            <area target="_blank" alt="Financial counseling for Education Loans" title="Financial counseling for Education Loans" href="{{url('/financialcounselling')}}" coords="377,368,377,341,381,314,383,295,378,251,378,218,398,192,427,173,458,170,471,184,477,209,476,228,467,249,459,269,446,293,434,316,418,333,404,349,387,364,377,368" shape="poly">
                            <area target="_blank" alt="Visa  &amp; Interviews Assistance" title="Visa  &amp; Interviews Assistance" href="{{url('/visainterview')}}" coords="311,408,309,392,300,371,294,347,296,323,307,305,322,297,339,296,349,308,353,328,351,351,343,368,335,384,324,400,316,406" shape="poly">
                            <area target="_blank" alt="Travel &amp; Medical Insuraance" title="Travel &amp; Medical Insuraance" href="{{url('/travelmedical')}}" coords="465,272,475,247,488,212,514,184,541,186,558,194,568,214,570,236,558,254,525,262,496,266,478,274,462,280" shape="poly">
                            <area target="_blank" alt="Foreign Exchanges" title="Foreign Exchanges" href="{{url('/foreignexchange')}}" coords="434,351,434,336,441,315,451,301,467,288,490,280,509,279,522,288,531,305,531,322,515,337,497,341,476,341,459,341,444,346,438,351" shape="poly">
                            <area target="_blank" alt="Pre Departure Briefing" title="Pre Departure Briefing" href="{{url('/predeparturebriefing')}}" coords="381,391,415,371,443,355,472,347,495,346,512,357,512,381,419,396,467,405,441,409,417,405,395,402,383,396" shape="poly">
                            <area target="_blank" alt="Bon Voyage" title="Bon Voyage" href="{{url('/bonvoyage')}}" coords="308,452,329,429,357,417,383,412,404,412,421,416,435,428,435,447,423,464,397,472,373,463,351,455,326.452,313,452" shape="poly">

                        </map>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="s_img_about">
                        <div class="forign_study">
                            <h3 class="fw-bold">About Us</h3>
                            <p class="fw-semibold text-black">We'll make your <span> Studying Abroad
                                </span>dream come true.</p>
                            <li class="text-black fw-light-bold text-black">
                                Overseas Education Lane, a venture of Ekon Solutions India Pvt Ltd was incepted to bridge this
                                divide and provide equal opportunities of higher education. We are a one-stop-solution,
                                facilitating assistance to the students and simplify the hassled process of
                                college selection, admission, test, VISA and Accommodation.
                            </li>
                            <div class="bts2">
                                <a href="{{url('about-oel')}}">
                                    <button class="bts2 border border-primary p-2 px-4 mt-3 rounded shadow hover:shadow-lg transition-all duration-300">Know More</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="about_us_titles position-relative">

    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const image = document.getElementById("tree-responsive-image");
        const map = document.getElementById("image-map");
        const originalWidth = 575;
        const originalHeight = 570;

        function scaleCoords() {
            const scaleX = image.offsetWidth / originalWidth;
            const scaleY = image.offsetHeight / originalHeight;

            const areas = map.getElementsByTagName("area");

            for (let area of areas) {
                const originalCoords = area.dataset.originalCoords.split(",").map(Number);
                const scaledCoords = originalCoords.map((value, index) =>
                    index % 2 === 0 ? value * scaleX : value * scaleY
                );
                area.coords = scaledCoords.join(",");
            }
        }

        const areas = map.getElementsByTagName("area");
        for (let area of areas) {
            if (!area.dataset.originalCoords) {
                area.dataset.originalCoords = area.coords;
            }
        }
        window.addEventListener("resize", scaleCoords);
        scaleCoords();
    });
</script>
<section>
    <div class="choose_us_title xs-p-0" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold cs fw-medium"> Why Choose Us? </h3>
                <p class="text-black choose-us-text">
                    At OEL, our team of experienced education counselors and certified immigration agents is dedicated
                    to guiding you through every step of your journey, from securing admission to completing the visa process.
                    With expert advice and personalized support, we aim to make your experience seamless and stress-free.
                    Contact us today to find out how we can help you achieve your goals!
                </p>
            </div>

            <div class="row text-center mt-5">
                <!-- Founded In Section -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="founded_p">
                        <img src="{{asset('frontend/img/Clip path group.png')}}" alt="flag" class="img-fluid">
                        <div class="yr_txt mt-3">
                            <h1 class="fw-bold">2013</h1>
                            <p class="fw-semibold text-black fd_s">Founded In</p>
                        </div>
                    </div>
                </div>

                <!-- Successful Students Section -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="founded_ps">
                        <img src="{{asset('frontend/img/man-user-color-icon 1.png')}}" alt="man" class="img-fluid">
                        <div class="yr_txt mt-3">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <!-- <div class="counter_wrapper">
                                <div class="counter_item">
                                    <h1 class="counter fw-bold" data-number="2500" data-speed="200"><span>+</span></h1>
                                    <p class="fw-semibold text-black">Successful Students</p>
                                </div>
                            </div> -->
                            <div class="counter_wrapper">
                                <div class="counter_item text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h1 class="counter fw-bold me-1" data-number="2500" data-speed="200">2500</h1>
                                        <h1 class="fw-bold">+</h1>
                                    </div>
                                    <p class="fw-semibold text-black fd_s">Successful Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Rate Section -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="founded_p">
                        <img src="{{asset('frontend/img/SVG.png')}}" alt="svg" class="img-fluid">
                        <div class="yr_txt">
                            <div class="counter_wrapper">
                                <!-- <div class="counter_item">
                                    <h1 class="fw-bold">99%</h1>
                                    <p class="fw-semibold text-black">Success Rate</p>
                                </div> -->
                                <div class="counter_item text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h1 class="counter fw-bold me-1" data-number="99" data-speed="0.84">99</h1>
                                        <h1 class="fw-bold">%</h1>
                                    </div>
                                    <p class="fw-semibold text-black fd_s">Success Rate
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="overseas_cast_edu">
        <div class="container">
            <div class="values_plus mt-5 text-center">
                <P class="fw-bold">Our Values</P>
                <h2 class="fw-bold">At Overseas Education Lane, we commit to:</h2>
            </div>
            <div class="all_overses_edu  d-flex justify-content-center mt-md-4 gap-3">
                <div class="all_img_education_int  px-md-3 " data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                    <img src="{{asset('frontend/img/b5.png')}}" alt="bc">
                </div>
                <div class="all_img_education_int  px-md-3 mt" data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                    <img src="{{asset('frontend/img/b1.png')}}" alt="bc">
                </div>
                <div class="all_img_education_int  px-md-3  mt mtcp" data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                    <img src="{{asset('frontend/img/b4.png')}}" alt="bc">
                </div>
                <div class="all_img_education_int  px-md-3 mt" data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                    <img src="{{asset('frontend/img/b3.png')}}" alt="bc">
                </div>
                <div class="all_img_education_int  px-md-3 mt bg_rotate" data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                    <img src="{{asset('frontend/img/b2.png')}}" alt="bc">
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="education_title ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="education_aside pt-5 pe-lg-5 ">
                        <div class="edu_as">
                            <h3 class="fw-bold">Education</h3>
                            <h4 class="text-black fw-medium">Unleash Your Potential with Global Learning Tailored to Your Ambitions.</h4>
                            <p class="text-black fw-normal">Studying abroad is more than just an educational opportunity—it's the gateway to realizing your
                                full potential and building a thriving future. Whether you're looking to accelerate your career, develop personally,
                                or acquire new expertise, an international education equips you with the tools and experiences to turn your aspirations
                                into reality. By aligning your studies with your unique goals,
                                you'll be empowered to achieve both personal and professional growth on a global scale. </p>
                            <div class="all_btns d-none d-sm-block">
                                <a href="{{url('universities?country=13')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">Study in
                                        Australia</button>
                                </a>
                                <a href="{{url('universities?country=38')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">Study in
                                        Canada</button>
                                </a>
                                <a href="{{url('universities?country=157')}}">
                                    <button class="border-0 text-white fw-light rounded  p-2 px-3 ">Study in New
                                        Zealand</button>
                                </a>
                                <a href="{{url('universities?country=231')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3 pv">Study in
                                        USA</button>
                                </a>
                            </div>
                            <div class="d-block d-sm-none all_btns text-center mt-5">
                                <a href="{{url('universities?country=13')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">Study in
                                        Australia</button>
                                </a>
                                <a href="{{url('universities?country=38')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">Study in
                                        Canada</button>
                                </a>
                            </div>
                            <div class="d-block d-sm-none all_btns text-center mt-3">
                                <a href="{{url('universities?country=230')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3 ">Study in UK</button>
                                </a>
                                <a href="{{url('universities?country=231')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3 ">Study in USA</button>
                                </a>
                                <a href="{{url('universities?country=157')}}">
                                    <button class="border-0 text-white fw-light pgo rounded p-2 px-3 ">Study in New
                                        Zealand</button>
                                </a>
                            </div>

                            <div class="all_btns mt-3 d-none d-sm-block">
                                <a href="{{url('universities?country=230')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">Study in UK</button>
                                </a>
                                <a href="{{url('programs')}}">
                                    <button class="border-0 text-white fw-light rounded p-2 px-3">More..</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="transform_img">
                        <img src="{{asset('frontend/img/education.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="education_title  cf">
        <div class="container">
            <div class="row dl-title">
                <div class="col-lg-5">
                    <div class="transform_img">
                        <img src="{{asset('frontend/img/Comp 1.gif')}}">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="education_aside ps-lg-5 ">
                        <div class="edu_as">
                            <h3 class="fw-bold">Migration</h3>
                            <h4 class="text-black fw-medium">Your migration journey, our migration expertise. </h4>
                            <p class="text-black fw-normal">
                                Migration is a transformative journey, and with the right guidance, it can open doors to new opportunities
                                and a brighter future. Whether you're seeking a fresh start, advancing your career, or reuniting with loved ones,
                                our migration expertise ensures that your path is clear and supported every step of the way. </p>
                            <div class="all_btns d-none d-sm-block">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Study Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Internship
                                    /Training
                                    Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3 pv">Student Dependent Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3 pv">Business Visa</button>

                            </div>

                            <div class="all_btns text-center mt-5 d-block d-sm-none">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Student Dependent Visa</button>
                                <button class="border-0 text-white fw-light rounded pgo p-2  px-3">Business Visa</button>

                            </div>
                            <div class="all_btns text-center mt-3 d-block d-sm-none">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Tourist Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2 pgo  px-3">Visitor Visa</button>

                            </div>

                            <div class="all_btns text-center mt-3 d-block d-sm-none">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Family Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Temporary Activity
                                    Visa</button>
                                <button class="border-0 text-white fw-light rounded pgo p-2  px-3">Visitor Visa</button>
                            </div>

                            <div class="all_btns text-center mt-3 d-block d-sm-none">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Business
                                    Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3 ">Protection
                                    Visa</button>

                            </div>
                            <div class="bts2 d-block d-sm-none text-center">
                                <button class=" border border-primary p-2 px-3 mt-3 rounded">Know More</button>
                            </div>

                            <div class="all_btns mt-3 d-none d-sm-block ">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Tourist Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Visitor Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Family Visa</button>
                                <button class="border-0 text-white fw-light rounded p-2  px-3 pv">Temporary Activity Visa</button>

                            </div>
                            <div class="all_btns mt-3 d-none d-sm-block">
                                <button class="border-0 text-white fw-light rounded p-2  px-3">Employer Sponsor Visa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="text_heading_mobile d-block d-sm-none mt-4 container d-none d-sm-block">
        <h4 class="fw-bold px-4 text-center">We Support the Entire Sector with Student
            Guidance and Thought Leadership</h4>
    </div>
</section>

<section>
    <div class="partner_title mt-5 pt-4 ">
        <div class="">
            <div class="partner_title_head">
                <h3 class="fw-bold text-center ">What Our Students Say</h3>
            </div>
            <div class="anot_int text-center mt-4">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-students-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-students" type="button" role="tab" aria-controls="pills-students"
                            aria-selected="true">Students</button>
                    </li>

                </ul>
                <!-- HTML Structure -->
                <!-- <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-students" role="tabpanel" aria-labelledby="pills-students-tab">
                        <div class="all_images_circle mt-5">
                            <div class="al_img_most_title student-video-container">
                                <div class="row justify-content-center">
                                    @foreach ($feedback_video->where('category', 'Students')->take(5) as $item)
                                    <div class="col-sm-6 col-md-4 col-lg mb-4">
                                        <div class="circle_video_top text-center">
                                            <video class="cl{{ $loop->index + 1 }} students-video" data-aos="fade-up" controls>
                                                <source src="{{ asset('video/' . $item->video_url) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-partners" role="tabpanel" aria-labelledby="pills-partners-tab">
                        <div class="all_images_circle mt-5">
                            <div class="al_img_most_title student-video-container">
                                <div class="row justify-content-center">
                                    @foreach ($feedback_video->where('category', 'Recruitment Partners')->take(6) as $item)
                                    <div class="col-sm-6 col-md-4 col-lg mb-4">
                                        <div class="circle_video_top student-video-wrapper {{ $loop->index == 0 ?  : ($loop->index == 1 ?  : ($loop->index == 4 ?  : ($loop->index == 5 ?  : ''))) }}">
                                            <video class="cl{{ $loop->index + 1 }} students-video" data-aos="fade-up" controls loop>
                                                <source src="{{ asset('video/' . $item->video_url) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-institutions" role="tabpanel" aria-labelledby="pills-institutions-tab">
                        <div class="all_images_circle mt-5">
                            <div class="al_img_most_title student-video-container">
                                <div class="row justify-content-center">
                                    @foreach ($feedback_video->where('category', 'Partner Institutions')->take(6) as $item)
                                    <div class="col-sm-6 col-md-4 col-lg mb-4">
                                        <div class="circle_video_top student-video-wrapper {{ $loop->index == 0 ?  : ($loop->index == 1 ?  : ($loop->index == 4 ?  : ($loop->index == 5 ?  : ''))) }}">
                                            <video class="cl{{ $loop->index + 1 }} students-video" data-aos="fade-up" controls loop>
                                                <source src="{{ asset('video/' . $item->video_url) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="slider-tap pt-4">
                    <div class="slidercontrols" id="slider">
                      
                        @php
                            $studentVideos = $feedback_video->where('category', 'Students')->take(20);
                        @endphp

                        @foreach ($studentVideos as $item)
                            @if ($item->youtube_link)
                                <div class="circle_video_top">
                                    <!-- <video loop controls preload="metadata" width="100%" height="auto">
                                    <source src="{{ asset('video/' . $item->video_url) }}" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video> -->

                                   
                                <iframe 
                                    width="100%" 
                                    height="auto" 
                                    src="{{ str_replace('watch?v=', 'embed/', $item->youtube_link) }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                                </div>
                            @endif
                        @endforeach
                    </div>
              </div>

            </div>
        </div>
    </div>
</section>

<section>
    <div class="main_sl">
        <div class="logo-slider d-block d-sm-none">
            <div class="logos-slidef slider-max d-none">
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 1">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 2">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 1">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 2">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 1">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 2">

                </div>
                <div class="slided">
                    <img src="{{asset('frontend/img/Component 8.png')}}" alt="Image 1">

                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="coures_head text-center  d-block d-sm-none mt-4">
        <h3 class="fw-bold">Most Viewed Courses</h3>
    </div>
</section>
<section>
    <div class="main_cl mt-5">
        <div class="text_heading_slide text-black  text-center  pt-5 d-none d-sm-block">
            <h3 class="fw-bold">Explore, Dream, Succeed: Your Gateway to Global Education</h3>
            <p>We provide Comprehensive Student Support and Industry Expertise for Global Education.</p>
        </div>
        <div class="logo-slider d-none d-sm-block">
            <div class="logos-slide">
                @foreach ($ads as $item)
                <div class="slide logos img">
                    <img src="{{ asset($item->image) }}" style="width:280px;height:280px" alt="{{$item->title}}" class="img-name">
                </div>
                @endforeach

                <!-- Duplicate slides to create infinite effect -->
                @foreach ($ads as $item)
                <div class="slide logos img">
                    <img src="{{ asset($item->image) }}" style="width:280px;height:280px" alt="{{$item->title}}" class="img-name">
                </div>
                @endforeach
            </div>
        </div>

        <div class="courses_view_title mt-md-5 ">
            <div class="coures_head text-center  d-none d-sm-block">
                <h3 class="fw-bold">Most Viewed Courses</h3>
            </div>
            <div class="logo-slider slide-mx-slide">
                <div class="logos-slide logos-max dm-pop">
                    @foreach ($programs as $item)
                    <div class="slide slide-t mx-2">
                        <div class="rm-int">
                            <img src="{{asset($item->university_name->banner ?? null)}}" alt="{{$item->alt_tag ?? 'Overseas'}}" class="img-name" width="100%">
                        </div>
                        <div class="course_name mt-4">
                            <span class="fw-light">{{$item->university_name->country_name->name ?? null}}</span>
                            <h4 class="fw-bold">{{substr($item->name , 0, 30)}}</h4>
                            <p>Application Fees:{{($item->application_fee == 0) ? 'Free' : $item->application_fee}}</p>
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{asset('frontend/img/Vector.png')}}">
                                        <span>{{substr($item->university_name->university_name ?? null, 0,25)}}</span>{{$item->university_name->country_name->name ?? null}}</a>
                                </li>
                            </ul>
                            <div class="right_click d-flex justify-content-between align-items-center  ">
                                <div class="king">
                                    <!-- <span>Kingdom</span> -->
                                </div>
                                <div class="details">
                                    <a href="{{route('course-details',$item->id)}}">View Details</a><i class="fa-solid fa-arrow-right mx-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="google_title ">
                <div class="container-fluid px-md-5">
                    <div class="row ">
                        <div class="col-lg-4 d-flex align-items-center justify-content-center mt-md-5">
                            <div class="row">
                                <div class="google_img">
                                    <img src="{{asset('frontend/img/Google-Review-Logo 1.png')}}" alt="google_img">
                                    <div class="sign_img">
                                        <span>Win up to ₹ 3,00,000* to study in the UK, Canada &amp; US.</span>
                                        <img src="{{asset('frontend/img/Group (1).png')}}" alt="sign">
                                    </div>
                                </div>
                                <div class="all_btns">
                                    <a href="{{url('contact-us')}}">
                                        <button class=" bd border-0 text-white fw-light rounded px-4 py-2">Apply now</button>
                                    </a>
                                    <a href="https://g.page/r/CUAQxHMudnKuEAE/review">
                                        <button class="bts23 border border-primary p-2 mt-3 rounded">Give us a Review</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <!-- new-look slider -->
                            <div class="testimonial-container mt-5 pt-5">
                                <div class="testimonial-grid">
                                    <div class="image-container" id="image-container"></div>
                                    <div class="testimonial-content">
                                        <div>
                                            <h3 class="name" id="name"></h3>
                                            <h4 class="location" id="location"></h4>
                                            <h5><i class="university-name" id="university"></i></h5>
                                            <p class="designation" id="designation"></p>
                                            <p class="quote" id="quote"></p>
                                            <a href="" id="review_link">Read More</a>
                                           
                                        <br>
                                        </div>
                                        <div class="arrow-buttons mt-4" >
                                            <button class="arrow-button prev-button" id="prev-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                                                </svg>
                                            </button>
                                            <button class="arrow-button next-button" id="next-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- new look slider -->


                        </div>
                    </div>

                    <div class="category_title mt-5">
                        <div class="container">
                            <div class="row ">
                                <div class="col-lg-4 ">
                                    <div class="heading_text_ht  d-none d-sm-block">
                                        <h4> Programs Category</h4>
                                        <div class="category_section d-flex mt-5">
                                            <div class="ex_div_cop d-flex gap-3 ">

                                                <div class="all_design_btn bg d-flex gap-3 flex-column">
                                                    <a href="{{route('programs')}}"><button>ART DESIGN</button></a>
                                                    <a href="{{route('programs')}}"><button>COMPUTER SCIENCE</button></a>
                                                    <a href="{{route('programs')}}"><button>HUMANITIES</button></a>
                                                    <a href="{{route('programs')}}"><button>TOURISM HOSPITALITY</button></a>
                                                </div>

                                                <div class="all_design_btn bg d-flex gap-3 flex-column">
                                                    <a href="{{route('programs')}}"><button>MEDIA</button></a>
                                                    <a href="{{route('programs')}}"><button>ENGINEERING</button></a>
                                                    <a href="{{route('programs')}}"><button>GENERAL STUDIES</button></a>
                                                    <a href="{{route('programs')}}"><button>MEDICINE &amp; HEALTH</button></a>
                                                </div>

                                                <div class="all_design_btn bg d-flex gap-3 flex-column">
                                                    <a href="{{route('programs')}}"><button>LAW</button></a>
                                                    <a href="{{route('programs')}}"><button>MEDIA</button></a>
                                                    <a href="{{route('programs')}}"><button>SCIENCE</button></a>
                                                    <a href="{{route('programs')}}"><button>LANGUAGE</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="lady_img d-none d-sm-block">
                                        <img src="{{asset('/frontend/img/ub.png')}}" alt="untiled">
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="gt_gh d-none d-sm-block">
                                        <h4> Programs level</h4>

                                        <div class="ex_div_cop d-flex bg  gap-3 mt-5">
                                            <div class="all_design_btn gap-3 d-flex flex-column">
                                                <a href="{{route('programs')}}"><button>BACHELOR DEGREE</button></a>
                                                <a href="{{route('programs')}}"><button>MASTER DEGREE</button></a>
                                                <a href="{{route('programs')}}"><button>DOCTORATE / PHD</button></a>

                                            </div>

                                            <div class="all_design_btn gap-3 bg d-flex flex-column">
                                                <a href="{{route('programs')}}"><button>GRADUATE DEGREE</button></a>
                                                <a href="{{route('programs')}}"><button>DIPLOMA / CERTIFICATE</button></a>
                                                <a href="{{route('programs')}}"><button>SUMMER / SHORT COURSE</button></a>

                                            </div>

                                            <div class="all_design_btn gap-3 bg d-flex flex-column">
                                                <a href="{{route('programs')}}"><button>MBA</button></a>
                                                <a href="{{route('programs')}}"><button>ASSOCIATE DEGREE</button></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="lady_img d-block d-sm-none">
                                        <img src="{{asset('frontend/img/ub.png')}}" alt="untiled">
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="heading_text_ht  d-block d-sm-none">
                                        <h4 class="text-uppercase px-3">Programs Category
                                        </h4>

                                        <div class="category_section  mt-5 py-4 px-3">
                                            <div class="ex_div_cop gap-1 ">

                                                <div class="all_design_btn  d-flex gap-3">
                                                    <a href="{{route('programs')}}"><button>ART & DESIGN</button></a>
                                                    <a href="{{route('programs')}}"><button>MEDIA</button></a>
                                                    <a href="{{route('programs')}}"><button>ENGINEERING</button></a>
                                                    <a href="{{route('programs')}}"><button>LOW</button></a>
                                                </div>
                                                <div class="all_design_btn  d-flex mt-3 gap-3">
                                                    <a href="{{route('programs')}}"><button>COMPUTER SCIENCE</button></a>
                                                    <a href="{{route('programs')}}"><button>GENERAL STUDIES</button></a>
                                                    <a href="{{route('programs')}}"><button>MEDIA</button></a>
                                                </div>
                                                <div class="all_design_btn  d-flex mt-3 gap-3 justify-content-center">
                                                    <a href="{{route('programs')}}"><button>HUMANITIES</button></a>
                                                    <a href="{{route('programs')}}"><button>SCIENCE</button></a>
                                                    <a href="{{route('programs')}}"><button>LANGUAGE</button></a>
                                                </div>
                                                <div class="all_design_btn  d-flex mt-3 gap-3 justify-content-center">
                                                    <a href="{{route('programs')}}"><button>TOURISM HOSPITALITY </button></a>
                                                    <a href="{{route('programs')}}"><button>MADICINE &amp; HEALTH</button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="gt_gh d-block d-sm-none">
                                        <h4 class="text-uppercase px-3">Programs level
                                        </h4>

                                        <div class="ex_div_cop  justify-content-center px-3 mt-5 py-4">
                                            <div class="all_design_btn gap-3 d-flex ">
                                            <a href="{{route('programs')}}"><button class="pm">SUMMER/SHORT COURSE</button></a>

                                                <a href="{{route('programs')}}"><button>BACHELOR DEGREE</button></a>
                                                <a href="{{route('programs')}}"><button>GRADUATE DEGREE</button></a>

                                            </div>

                                            <div class="all_design_btn gap-3 d-flex mt-3 ">
                                                <a href="{{route('programs')}}"><button class="pm">ASSOCIATE DEGREE</button></a>
                                                <a href="{{route('programs')}}"><button class="pm">MASTER'S DEGREE</button></a>

                                                <a href="{{route('programs')}}"><button>MBA</button></a>

                                            </div>

                                            <div class="all_design_btn gap-3 d-flex mt-3">
                                                <a href="{{route('programs')}}"><button>DIPLOMA/CERTIFICATE</button></a>

                                                <a href="{{route('programs')}}"><button class="pm">GRADUATE DIPLOMA</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="growing_title mt-5">
                        <div class="growing_title_text text-center fw-light ">
                            <!-- <span> University Partners</span> -->
                            <h3 class="fw-bold">Partner Universities</h3>
                        </div>
                        <div class=" containers h-100 mt-5">
                            <div class="row align-items-center h-100">
                                <div class="container rounded bh-cp">
                                    <div class="slider">
                                        <div class="logos">

                                            @foreach($universitiesrtl as $value )
                                            <img src="{{asset($value->logo)}}" alt="image">
                                            @endforeach
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="advantages_title d-none d-sm-block">
                        <div class=" ">
                            <div class="multi_ad ">

                                <div class="choose_title text-center container px-lg-5">
                                    <h3 class="fw-bold cs fw-medium text-center">Your Gateway to a Global Education: Discover the World</h3>
                                    <p class="text-black text-center">Unlock the world! Explore your academic journey through 900+ leading universities across 34 countries, each offering unique opportunities and experiences. Whether you're seeking cutting-edge research, cultural immersion, or international networks, our diverse global partnerships offer endless possibilities tailored to your aspirations.</p>
                                </div>
                                <div class="world_fm pb-5 ">
                                    <div class="scale_map ">
                                        <div class="sc_map  ">
                                            <img src="{{asset('/frontend/img/shape-2-5 12.png')}}" alt="shape">
                                        </div>
                                        <div class="d-flex fg">
                                            <div class="world_famous mt-5">
                                                <h4 class="fw-normal">The World is your Campus!</h4>
                                                <p>Chart your personalized academic path by choosing the destination that aligns with your goals. Embrace diversity, grow beyond borders, and make the world your classroom!
                                                </p>
                                                <div class="explore_right">
                                                    <a href="https://www.overseaseducationlane.com/universities">Explore Countries</a><i class="fa-solid fa-arrow-right mx-2"></i>
                                                </div>
                                            </div>
                                            <div class="rigt_img ">
                                                <img src="{{asset('/frontend/img/cam1.png')}}" alt="image">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>


<section>
    <div class="advantages_title  d-block d-sm-none">
        <div class="">
            <div class="multi_ad">
                <h3 class="fw-bold text-center">Your Gateway to a Global Education: Discover the World
                </h3>
            </div>
            <div class="world_fm pb-5 ">
                <div class="scale_map ">
                    <!-- <div class="sc_map  ">
                        <img src="{{asset('frontend/img/shape-2-5 12.png')}}" alt="shape">
                    </div> -->
                    <div class="d-flex fg text-center">
                        <div class="world_famous ">
                            <h4 class="fw-normal">The World is your Campus!</h4>
                            <p>Unlock the world! Explore your academic journey through 900+ leading universities across 34 countries, each offering unique opportunities and experiences. Whether you're seeking cutting-edge research, cultural immersion, or international networks, our diverse global partnerships offer endless possibilities tailored to your aspirations.


                            </p>
                            <div class="explore_right">
                                <a href="">Explore Countries</a><i class="fa-solid fa-arrow-right mx-2"></i>
                            </div>
                        </div>
                        <div class="rigt_img ">
                            <img src="{{asset('frontend/img/cam1.png')}}" alt="image">
                            <!-- <div class="poly_h ">
                                <img src="{{asset('frontend/img/Polygon 1.png')}}" alt="polygon">
                            </div> -->
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@include('frontend.contact_form')
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    let counter = document.querySelectorAll(".counter")
    let arr = Array.from(counter)

    arr.map((item) => {
        let count = 0

        function CounterUp() {
            count++
            item.innerHTML = count
            if (count == item.dataset.number) {
                clearInterval(stop);
            }
        }
        let stop = setInterval(
            function() {
                CounterUp();
            }, 100 / item.dataset.speed
        );
    })
</script>
<script>
    jQuery(document).ready(function($) {
        jQuery(document).on('click', '.iconInner', function(e) {
            jQuery(this).parents('.botIcon').addClass('showBotSubject');
            $("[name='msg']").focus();
        });

        jQuery(document).on('click', '.closeBtn, .chat_close_icon', function(e) {
            jQuery(this).parents('.botIcon').removeClass('showBotSubject');
            jQuery(this).parents('.botIcon').removeClass('showMessenger');
        });

        jQuery(document).on('submit', '#botSubject', function(e) {
            e.preventDefault();

            jQuery(this).parents('.botIcon').removeClass('showBotSubject');
            jQuery(this).parents('.botIcon').addClass('showMessenger');
        });

        /* Chatboat Code */
        $(document).on("submit", "#messenger", function(e) {
            e.preventDefault();

            var val = $("[name=msg]").val().toLowerCase();
            var mainval = $("[name=msg]").val();
            name = '';
            nowtime = new Date();
            nowhoue = nowtime.getHours();

            function userMsg(msg) {
                $('.Messages_list').append('<div class="msg user"><span class="avtr"><figure style="background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)"></figure></span><span class="responsText">' + mainval + '</span></div>');
            };

            function appendMsg(msg) {
                $('.Messages_list').append('<div class="msg"><span class="avtr"><figure style="background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)"></figure></span><span class="responsText">' + msg + '</span></div>');
                $("[name='msg']").val("");
            };


            userMsg(mainval);
            if (val.indexOf("hello") > -1 || val.indexOf("hi") > -1 || val.indexOf("good morning") > -1 || val.indexOf("good afternoon") > -1 || val.indexOf("good evening") > -1 || val.indexOf("good night") > -1) {
                if (nowhoue >= 12 && nowhoue <= 16) {
                    appendMsg('good afternoon');
                } else if (nowhoue >= 10 && nowhoue <= 12) {
                    appendMsg('hi');
                } else if (nowhoue >= 0 && nowhoue <= 10) {
                    appendMsg('good morning');
                } else {
                    appendMsg('good evening');
                }

                appendMsg("what's you name?");

            } else if (val.indexOf("i have problem with") > -1) {
                if (val.indexOf("girlfriend") > -1 || val.indexOf("gf") > -1) {

                    appendMsg("take out your girlfriend, for dinner or movie.");
                    appendMsg("is it helpful? (yes/no)");

                } else if (val.indexOf("boyfriend") > -1 || val.indexOf("bf") > -1) {
                    appendMsg("bye something for him.");
                    appendMsg("is it helpful? (yes/no)");
                } else {
                    appendMsg("sorry, i'm not able to get you point, please ask something else.");
                }
            } else if (val.indexOf("yes") > -1) {

                var nowtime = new Date();
                var nowhoue = nowtime.getHours();
                appendMsg("it's my pleaser that i can help you");

                saybye();
            } else if (val.indexOf("no") > -1) {

                var nowtime = new Date();
                var nowhoue = nowtime.getHours();
                appendMsg("it's my bad that i can't able to help you. please try letter");

                saybye();
            } else if (val.indexOf("my name is ") > -1 || val.indexOf("i am ") > -1 || val.indexOf("i'm ") > -1 || val.split(" ").length < 2) {
                /*|| mainval != ""*/
                // var name = "";
                if (val.indexOf("my name is") > -1) {
                    name = val.replace("my name is", "");
                } else if (val.indexOf("i am") > -1) {
                    name = val.replace("i am", "");
                } else if (val.indexOf("i'm") > -1) {
                    name = val.replace("i'm", "");
                } else {
                    name = mainval;
                }

                // appendMsg("hi " + name + ", how can i help you?");
                appendMsg("hi " + name + ", how can i help you?");
            } else {
                appendMsg("sorry i'm not able to understand what do you want to say");
            }

            function saybye() {
                if (nowhoue <= 10) {
                    appendMsg(" have nice day! :)");
                } else if (nowhoue >= 11 || nowhoue <= 20) {
                    appendMsg(" bye!");
                } else {
                    appendMsg(" good night!");
                }
            }

            var lastMsg = $('.Messages_list').find('.msg').last().offset().top;
            $('.Messages').animate({
                scrollTop: lastMsg
            }, 'slow');
        });
        /* Chatboat Code */
    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.read-more-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let parentDiv = btn.closest('.confusion');
                let shortContent = parentDiv.querySelector('.short-content');
                let fullContent = parentDiv.querySelector('.full-content');

                if (fullContent.style.display === 'none') {
                    fullContent.style.display = 'block';
                    shortContent.style.display = 'none';
                    btn.textContent = 'Read Less';
                } else {
                    fullContent.style.display = 'none';
                    shortContent.style.display = 'block';
                    btn.textContent = 'Read More';
                }
            });
        });
    });
</script>

<script>
    const slider = document.getElementById("slider");
    const videos = slider.querySelectorAll("video");

    videos.forEach(video => {
        video.addEventListener("mouseenter", () => {
            slider.style.animationPlayState = "paused";
        });

        video.addEventListener("mouseleave", () => {
            slider.style.animationPlayState = "running";
        });
    });
</script>

<script>
  
    let testimonials = [];
let activeIndex = 0;

const imageContainer = document.getElementById("image-container");
const nameElement = document.getElementById("name");
const designationElement = document.getElementById("designation");
const quoteElement = document.getElementById("quote");
const locationElement = document.getElementById("location");
const universityElement = document.getElementById("university");
const reviewlinkElement = document.getElementById("review_link");

const prevButton = document.getElementById("prev-button");
const nextButton = document.getElementById("next-button");

function calculateGap(width) {
    const minWidth = 1024;
    const maxWidth = 1456;
    const minGap = 60;
    const maxGap = 86;

    if (width <= minWidth) return minGap;
    if (width >= maxWidth)
        return Math.max(minGap, maxGap + 0.06018 * (width - maxWidth));

    return minGap + (maxGap - minGap) * ((width - minWidth) / (maxWidth - minWidth));
}

function updateTestimonial(direction = 0) {
    if (testimonials.length === 0) return;

    activeIndex = (activeIndex + direction + testimonials.length) % testimonials.length;
    const containerWidth = imageContainer.offsetWidth;
    const gap = calculateGap(containerWidth);
    const maxStickUp = gap * 0.8;

    testimonials.forEach((testimonial, index) => {
        let img = imageContainer.querySelector(`[data-index="${index}"]`);
        if (!img) {
            img = document.createElement("img");
            img.src = testimonial.src;
            img.alt = testimonial.name;
            img.classList.add("testimonial-image");
            img.dataset.index = index;
            imageContainer.appendChild(img);
        }

        const offset = (index - activeIndex + testimonials.length) % testimonials.length;
        const zIndex = testimonials.length - Math.abs(offset);
        const opacity = index === activeIndex ? 1 : 0.5;
        const scale = index === activeIndex ? 1 : 0.85;

        let translateX, translateY, rotateY;
        if (offset === 0) {
            translateX = "0%";
            translateY = "0%";
            rotateY = "0deg";
        } else if (offset === 1 || offset === -2) {
            translateX = "20%";
            translateY = `-${(maxStickUp / img.offsetHeight) * 100}%`;
            rotateY = "-15deg";
        } else {
            translateX = "-20%";
            translateY = `-${(maxStickUp / img.offsetHeight) * 100}%`;
            rotateY = "15deg";
        }

        img.style.zIndex = zIndex;
        img.style.opacity = opacity;
        img.style.transform = `translate(${translateX}, ${translateY}) scale(${scale}) rotateY(${rotateY})`;
    });

    const current = testimonials[activeIndex];
    nameElement.textContent = current.name;
    reviewlinkElement.href = current.review_link;
    designationElement.textContent = current.university; // Using university in place of designation
    locationElement.textContent = current.location || '';
    
    // Animate words in quote
    const quoteWords = current.quote
        .split(" ")
        .map(word => `<span class="word">${word}</span>`)
        .join(" ");
    quoteElement.innerHTML = quoteWords;

    animateWords();
}

function animateWords() {
    const words = quoteElement.querySelectorAll(".word");
    words.forEach((word, index) => {
        word.style.opacity = "0";
        word.style.transform = "translateY(10px)";
        word.style.filter = "blur(10px)";
        setTimeout(() => {
            word.style.transition =
                "opacity 0.2s ease-in-out, transform 0.2s ease-in-out, filter 0.2s ease-in-out";
            word.style.opacity = "1";
            word.style.transform = "translateY(0)";
            word.style.filter = "blur(0)";
        }, index * 20);
    });
}

function handleNext() {
    updateTestimonial(1);
}
function handlePrev() {
    updateTestimonial(-1);
}

prevButton.addEventListener("click", handlePrev);
nextButton.addEventListener("click", handleNext);

window.addEventListener("resize", () => updateTestimonial(0));

// 👇 Fetch testimonials and only call updateTestimonial after data is loaded
fetch('{{url("/get-testimonials")}}')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        testimonials = data.map(item => {
            // Remove any HTML tags
            const plainText = item.testimonial_desc.replace(/<[^>]*>/g, '');
            // Limit to 20 characters
            const shortQuote = plainText.length > 200 ? plainText.substring(0, 200) + '...' : plainText;

            return {
                quote: shortQuote,
                name: item.name,
                designation: item.designation,
                location: item.location,
                university: item.university,
                review_link: item.review_link,

                src: 'https://www.overseaseducationlane.com/public/imagesapi/' + item.profile_picture
            };
        });

        updateTestimonial(0); // Initial display after data is ready
    })
    .catch(error => console.error('Error fetching testimonials:', error));


// Autoplay functionality
let autoplayInterval = setInterval(handleNext, 5000);
[prevButton, nextButton].forEach(button => {
    button.addEventListener("click", () => {
        clearInterval(autoplayInterval);
    });
});

</script>




@endsection