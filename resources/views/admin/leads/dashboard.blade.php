@extends('admin.include.app')
@section('main-content')
    <!-- Page Header -->
    <div class="page-header">
       <div class="row">
          <div class="card card-buttons">
             <div class="card-body">
                <div class="row">
                   <div class="col-md-9">
                      <ol class="breadcrumb text-muted mb-0">
                         <li class="breadcrumb-item">
                            <a href="#"> Welcome</a>
                         </li>
                         <li class="breadcrumb-item text-muted">Lead Dashboard</li>
                      </ol>
                   </div>
                   <div class="col-md-3">
                      <p class="subheader_left"> Overseas Education Lane</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                
                <div clas="col-md-12">
                   <div class="totalno">
                    
                      <small>Total Drivers</small>

                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_leads']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                   </div>
                </div>
             </div>

          </div>
       </div>
     
      
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                       
                        <small>Verified</small>

                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['verified']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?driver_category=1')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                       
                        <small>Non-verified
                        </small>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['unverified']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?driver_category=2')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                       
                     <small>Blocklisted</small>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['blocked']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?driver_category=3')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>

    
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                       
                        <small>Partial verified (k)</small>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['kyc_done']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?driver_category=6')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                       
                        <small>Partial verified  (p)
                        </small>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['payment_done']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        
                        <a href="{{ url('admin/leads-lists?driver_category=4')}}">
                            <button type="button" class="btn btn-outline-primary"><small><small>Read More</small></small></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    
@endsection


