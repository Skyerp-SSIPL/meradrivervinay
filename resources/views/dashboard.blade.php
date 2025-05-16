@extends('admin.include.app')
@section('main-content')
    <div class="main-content">
        <div class="row">
            <div class="card card-buttons mt-md-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <ol class="breadcrumb text-muted mb-0">
                                <li class="breadcrumb-item">
                                    <a href="#"> Welcome</a>
                                </li>
                                <li class="breadcrumb-item text-muted">Admin Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-3">
                            <p class="subheader_left"> Mera Driver</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        @can('total_member.total_member_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <small>Total Members</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_members'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('admin-management/users')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                         
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan
        @php
            $user = Auth::user();
            $user->hasRole('student')
        @endphp
        @if($user->hasRole('student'))
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 mx-auto">
            <div class="card dash-widget text-center">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Total Driver Job Applications</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['program_applied'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('applied-program')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                           
                       
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
        <!-- @can('total_student.total_student_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total Registered Drivers</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_student'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('student-list')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan -->
        {{-- @can('total_school_manager.total_school_manager_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Total Fleet Managers</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_school_manager'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endcan --}}
        @can('total_franchise.total_franchise_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Total Franchises</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_frenchise'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{url('admin-management/users?roles=Franchise')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        @endcan
        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Total Sales User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_sells'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                         
                                <a href="{{url('admin-management/users?roles=Sales')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Total Verification User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_verification'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                            
                                <a href="{{url('admin-management/users?roles=Verification')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small> Collection User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_data_collection'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                            
                                <a href="{{url('admin-management/users?roles=Collection')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small> Operations User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_operational'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                           
                                <a href="{{url('admin-management/users?roles=Operational')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small> Digital Marketing User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_digital_marketing'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                           
                                <a href="{{url('admin-management/users?roles=Digital Marketing')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('total_agent.total_agent_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                           <small>Data Collection User</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_data_collection'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                             @php
                                 $user=Auth::user();
                             @endphp
                           
                                <a href="{{url('admin-management/users?roles=Data Collection')}}">
                                    <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                                </a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
       
      
    
   
    
    
  
      
   
     

      
        @can('total_leads.total_leads_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                        <small>Driver Data</small>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_leads'] }}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('leads-filter')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                           
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
      
   
        @php
            $user = Auth::user();
            $user->hasRole('Administrator')
        @endphp
       
        @if($user->hasRole('Application Punching'))
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Driver Application Submissions</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            @php
                                $total_application_punching =  DB::table('tbl_three_sixtee')->where('application_punching',1)->where('added_by', $user->id)->count();
                           
                           
                           
                                @endphp
                            <h5>
                                <i class="la la-user clruser"></i>{{$total_application_punching}}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('oel_360')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($user->hasRole('visa') )
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Driver Visa Processing</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                                       @php      
                                        $studentData = \App\Models\Student::query()
                                        ->join('users', 'users.id', '=', 'student.added_by')
                                        ->join('driver_data', 'driver_data.student_user_id', '=', 'student.user_id')
                                        ->join('payments', 'payments.customer_email', '=', 'student.email')
                                        ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
                                        ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
                                        ->where('student.status_threesixty', 1)
                                        ->where('student.profile_complete', 1)
                                        ->where('tbl_three_sixtee.visa_application', 'Accepted')
                                        ->select(
                                            'student.email',
                                            'student.user_id',
                                            'student.first_name',
                                            'student.last_name',
                                            'student.status_threesixty',
                                            'student.profile_complete',
                                            DB::raw('MAX(users.name) as added_by_name'),
                                            DB::raw('MAX(users.email) as added_by_email'),
                                            DB::raw('MAX(payments.id) as payment_id'),
                                            DB::raw('MAX(payments.amount) as payment_amount'),
                                            DB::raw('MAX(payments.payment_status) as payment_status'),
                                            DB::raw('MAX(tbl_three_sixtee.visa_application) as visa_application')
                                        )
                                        ->groupBy(
                                            'student.email',
                                            'student.user_id',
                                            'student.first_name',
                                            'student.last_name',
                                            'student.status_threesixty',
                                            'student.profile_complete'
                                        )
                                        ->get();
                                        $total_visa_punching = count($studentData);                                   
                           
                                       @endphp
                            <h5>
                                <i class="la la-user clruser"></i>{{$total_visa_punching}}
                            </h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="submit-section btnpr">
                            <a href="{{route('oel_360')}}">
                                <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        @endif

    


     
  
@endsection
