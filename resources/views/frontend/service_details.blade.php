@extends('frontend.layouts.main')
@section('title', 'CBon Voyage')
@section('content')

<section>
    <div class="canva-title py-5 container" id="canva-title">
        <div class="canva-heading mt-lg-5 mb-lg-5">
            <h1 class="text-center fw-bold">{{ $service_detials[0]->main_title}}  <br>
                </h1>
        </div>
        <div class="section-canva">
            <div class="row">
                <div class="col-lg-8 pe-lg-5">
                    <div class="Destination-title">
                        <h2 class="fw-bold">
                            {{ strip_tags($service_detials[0]->sub_name)}}
                        </h2>
                        <!-- <li class="mt-lg-4 mb-lg-4 fw-bold">How to Choose the Right Destination and
                            Course?</li> -->
                    </div>
                    <div class=" dilemmas-title">
                        <p>{{ strip_tags($service_detials[0]->content)}}</p>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="dt-canva">
                        <img src="{{asset('imagesapi/'.$service_detials[0]->image_one)}}" alt="see">
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <div class="dt-canva">
                        <img src="{{asset('imagesapi/'.$service_detials[0]->image)}}" alt="see">
                    </div>
                </div>
                <div class="col-lg-8 ps-lg-5 mt-5">
                    <div class="Destination-title">
                        <h2 class="fw-bold">
                        {{ strip_tags($service_detials[0]->sub_name_one)}}
                        </h2>
                        <p>{{ strip_tags($service_detials[0]->content_one)}}</p>
                    </div>
                   
                </div>
              
             

            </div>
        </div>
    </div>
</section>
@endsection