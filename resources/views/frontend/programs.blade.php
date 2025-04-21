@extends('frontend.layouts.main')
@section('title', 'Programs')
@section('content')
<style>
    /* .program_title_honors{
        margin-top: 30px;
    } */

    .program_title_honors {
    /* height: 600px; */
    height: 100% !important;
}
</style>
    <section>
        <div class="university_title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-mg-12 col-xs-12 col-sm-12">
                        <div class="university_airplane d-flex justify-content-center">
                            <!--<img src="{{asset('frontend/img/gif in blue (1)_1 1.png')}}" alt="gif">-->
                        </div>
                        <div class="universities_heading text-center">
                            <h1 class="fw-bold"> Find your Program
                           </h1>
                        </div>
                    </div>
                    <form  action="{{route('programs')}}" method="get" >
                          <div class="search_dropdown d-flex justify-content-around mt-5">
                            <div class="dropdown_skb_oel">

                                <!-- <select class="form-select"  name="country" aria-label="Default select example"> -->

                               <select class="js-example-placeholder-single form-select js-states form-control" name="country" id="country_search">


                                    <option value="">--Select Country--</option>
                                    @foreach ($country as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown_skb_oel">
                                <!-- <select class="form-select"  name="university_id" aria-label="Default select example"> -->
                                <select class="js-example-placeholder-single form-select js-states form-control" name="university_id" id="university_search">


                                    <option value="">--Select University--</option>
                                    @foreach ($universities as $item)
                                    <option value="{{$item->id}}">{{ Str::limit($item->university_name, 15, '...')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown_skb_oel">
                                <!-- <select class="form-select" name="program_id" aria-label="Default select example"> -->

                               <select class="js-example-placeholder-single form-select js-states form-control" name="program_id" id="program_search">

                                <option value="">--Select Programs--</option>
                                    @foreach ($program_name as $item)
                                    <option value="{{$item->name}}">{{Str::limit($item->name, 20, '...')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown">
                                <button class="serch_btn border-0 text-white rounded">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="program_title my-5">
            <div class="container">
                <div class="row h-100 gy-4" id="program-data">
                </div>
                <div class="ajax-load text-center" style="display:none">
                    <i class="fa fa-spinner"></i> Loading ...
                 </div>
                 <div class="no-data text-center mb-4" style="display:none">
                     <b>No data - last page</b>
                 </div>
            </div>
        </div>

    </section>
@endsection
@section('javascript_section')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        function csrf() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        let pages = 2;
        let current_page = 0;
        let bool = false;
        $(window).scroll(function() {
            let height = 1500;
            if ($(window).scrollTop() + $(window).height() >= height && bool == false) {
                bool = true;
                $('.ajax-load').show();
                lazyLoad(pages)
                    .then(() => {
                        bool = false;
                        pages++;
                        // $('.no-data').show();
                    })
            }
        })

        function getParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.toString();
        }

        function lazyLoad(page) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: `?page=${page}&${getParams()}`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.ajax-load').show();
                    },
                    success: function(response) {
                        $('.ajax-load').hide();
                        let html = '';
                        if (response.data.data.length == 0) {

                            $('.ajax-load').hide();
                            $('.no-data').show();
                            return;
                        }
                        $.each(response.data.data, function(index, item) {
                            var url_param = getParams();
                            console.log(item);
                            var assetBaseUrl = "{{ asset('') }}/";
                            html += `
                                <div class="col-lg-4">
                                    <div class="program_title_honors p-3">
                                        <div class="main_ors_title d-flex gap-3">
                                            <div class="foundation_ttile">
                                                <img src="${assetBaseUrl}${item.university_name?.logo}"  alt="link">
                                            </div>
                                            <div class="low_title fw-bold">
                                                <h2 class="fw-bold">${item.name}</h2>
                                                <span class="fw-medium">${item.university_name?.university_name}</span>
                                            </div>
                                        </div>
                                        <div class="fees_structure mt-4">
                                            <ul>
                                                <li><img src="${assetBaseUrl}frontend/img/1.png"><a href=""> <span span class="mx-2">Level ${item.program_level?.name}</></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/1.png" ><a href=""><span span class="mx-4">Duration ${item.length} month</ ></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/2.png" ><a href=""><span class="mx-3">Application Fees ${item.application_fee}</span></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/3.png" ><a href=""><span class="mx-3">1st Year Tuition Fees ${item.currency}  ${item.tution_fee}</span></a></li>
                                                <li class="border-bottom-0"><img src="${assetBaseUrl}frontend/img/4.png" ><a href=""><span class="mx-4">Exams Required ${item.university_name?.testrequired}</span></a></li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="last_law_time">
                                            <p>fees may vary according to university current structure and
                                                policy</p>
                                        </div>
                                        <hr>
                                        <div class="uni_king">
                                            <img src="${assetBaseUrl}frontend/img/Icon45.png" alt="icon">
                                            <span>${item.university_name?.country_name?.name} - ${item.programType}</span>
                                            <div class="deatils_view mt-2">
                                                <a href="{{ url('course-details') }}/${item.id}">View Details <i class="fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#program-data').append(html);
                        resolve();
                    }
                });
            })
        }
        loadData(1);

        function loadData(page) {
            $.ajax({
                url: `?page=${page}&${getParams()}`,
                type: 'GET',
                beforeSend: function() {
                    $('.ajax-load').show();
                },
                success: function(response) {
                    console.log(response);
                    $('.ajax-load').hide();
                    let html = '';
                    if (response.data.data.length == 0) {
                        $('.ajax-load').hide();
                        $('.no-data').show();
                        return;
                    }
                    $.each(response.data.data, function(index, item) {
                        var url_param = getParams();
                        console.log(item);
                        var assetBaseUrl = "{{ asset('') }}/";
                        html += `
                                <div class="col-lg-4">
                                    <div class="program_title_honors p-3">
                                        <div class="main_ors_title d-flex gap-3">
                                            <div class="foundation_ttile">
                                                <img src="${assetBaseUrl}${item.university_name?.logo}"  alt="link">
                                            </div>
                                            <div class="low_title fw-bold">
                                                <h2 class="fw-bold">${item.name}</h2>
                                                <span class="fw-medium">${item.university_name?.university_name}</span>
                                            </div>
                                        </div>
                                        <div class="fees_structure mt-4">
                                            <ul>
                                                <li><img src="${assetBaseUrl}frontend/img/2.png"><a href=""> <span span class="mx-2">Level ${item.program_level?.name}</></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/1.png" ><a href=""><span span class="mx-4">Duration ${item.length} month</ ></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/2.png" ><a href=""><span class="mx-3">Application Fees ${item.application_fee}</span></a></li>
                                                <li><img src="${assetBaseUrl}frontend/img/3.png" ><a href=""><span class="mx-3">1st Year Tuition Fees ${item.currency}  ${item.tution_fee}</span></a></li>
                                                <li class="border-bottom-0"><img src="${assetBaseUrl}frontend/img/4.png" ><a href=""><span class="mx-4">Exams Required ${item.university_name?.testrequired}</span></a></li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="last_law_time">
                                            <p>fees may vary according to university current structure and
                                                policy</p>
                                        </div>
                                        <hr>
                                        <div class="uni_king">
                                            <img src="${assetBaseUrl}frontend/img/Icon45.png" alt="icon">
                                            <span>${item.university_name?.country_name?.name} - ${item.programType}</span>
                                            <div class="deatils_view mt-2">
                                                <a href="{{ url('course-details') }}/${item.id}">View Details <i class="fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                    });
                    $('#program-data').append(html);
                }
            });
        }
    });


    $("#country_search").select2({
            placeholder: "Select Country",
            allowClear: true
     });
    $("#university_search").select2({
            placeholder: "Select university",
            allowClear: true
     });

     $("#program_search").select2({
            placeholder: "Select Program",
            allowClear: true
     });
</script>
@endsection


