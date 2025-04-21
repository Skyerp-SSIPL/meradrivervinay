@extends('admin.include.app')
@section('main-content')
<div class="main-content">
   <!--card section check from here-->
   <section class="college-detail-page loaded">
      <div class="my-5 ">
         <div class="row mb-2">
            <div class="col-12">
               <div class="c-detail-right">
                  <div class="row">
                     <div class="col-md-12 my-4" id="financials">
                        <div class="r-w-s">
                           <h3 class="mb-20 c-desc-t-h-r">Applied Program List</h3>
                           <div class="row">
                              <div class="col-md-12 table-responsive">
                                 <table class="table table-hover">
                                    <thead>
                                       <tr>
                                          @php
                                          $user = Auth::user();
                                          $users = App\Models\User::where('id', $user->id)->first();
                                          @endphp
                                          <th>Application Id</th>
                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <th>Applied On</th>
                                          @endif

                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <th>Created By</th>
                                          @endif
                                         
                                          <th>Student Name</th>

                                          <th>University Name</th>
                                          <th>Program Name</th>
                                          <th>Payment Status</th>
                                          <th> Status</th>
                                          <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($program_applied as $index => $item)
                                      
                                       <tr>
                                          <td><a href="">{{$item->app_id}}</a></td>
                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <td>{{$item->created_at}}</td>
                                          @endif
                                          @php
                                          $users =Auth::User();
                                          $user = App\Models\User::where('id',$item->assigned_to)->pluck('email')->first();
                                          $frenchise = App\Models\User::where('id',$item->added_by_agent_id)->pluck('email')->first();
                                          @endphp

                                          @if (($users->hasRole('agent')) || ($users->hasRole('Administrator')))
                                          <td>
                                             @if(!empty($item->assigned_to))
                                             @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                             @if($item->assigned_to == $item->added_by_agent_id)
                                             {{$frenchise ?? ''}} <br>
                                             @else
                                             Frenchise: {{$frenchise ?? ''}} <br>
                                             Sub Agent : {{$user ?? ''}}
                                             @endif
                                             @endif
                                             @endif
                                          </td>
                                          @endif
                                          <td> {{$item->name}}</td>
                                          <td><a class="text-success" href="{{url('university_details')}}/{{$item->program->university_name->id ?? null}}">{{$item->program->university_name->university_name ?? null}}</a></td>
                                          <td><a class="text-info" href="{{route('course-details')}}/{{$item->program->id ?? null}}">{{$item->program->name ?? null}}</a> </td>
                                          <td>
                                             @if((!empty($item->payments->payment_status) == 'success'))
                                             {{'Success'}}
                                             @else
                                             {{'Pending'}}
                                             @endif
                                          </td>

                                          @php
                                          $application_status = "";
                                          $visa_application = "";
                                          $program_ids = "";
                                          $i = 0;


                                          $table_data = DB::table('tbl_three_sixtee')
                                          ->where('user_id', $item->user_id)
                                          ->select('application', 'visa_application', 'cource_details')
                                          ->first();

                                          $application_details = [];

                                          if (!empty($table_data)) {

                                          $jsondecode = json_decode($table_data->application, true); // Decode application field

                                          $program_ids = isset($jsondecode['program_ids']) ? $jsondecode['program_ids'] : [];

                                          $visa_application = $table_data->visa_application; // This is already the correct value

                                          foreach ($program_ids as $program_id) {
                                          $application_details[$program_id] = [
                                          'status' => isset($jsondecode["{$program_id}_application_status"]) ? $jsondecode["{$program_id}_application_status"] : null,
                                          'remarks' => isset($jsondecode["remarks_{$program_id}"]) ? $jsondecode["remarks_{$program_id}"] : null
                                          ];
                                          $i++;
                                          }

                                          }
                                          @endphp

                                          @if(!empty($application_details))
                                          <td>
                                             <ul style="list-style-type: none;">
                                                @foreach ($application_details as $program_id => $details)

                                                @if(!isset($displayed[$program_id])) <!-- Check if the program_id has already been displayed -->
                                                <li>
                                                   @if($details['status'] == "accepted")
                                                   <div class="badge bg-success">Application Status - {{ $details['status'] ?? '...' }}</div>
                                                   @endif
                                                </li>
                                                <li>
                                                   @if(!empty($visa_application) && $program_id == $table_data->cource_details)
                                                   <div class="badge bg-info mt-2">Visa Status - {{ $visa_application ?? 'Not Available' }}</div>
                                                   @endif
                                                </li>
                                                @elseif($details['status'] == "inprogress")
                                                <li>
                                                   <div class="badge bg-warning">Application Status - {{ $details['status'] ?? '...' }}</div>
                                                </li>
                                                @elseif($details['status'] == "rejected")
                                                <li>
                                                   <div class="badge bg-danger">Application Status - {{ $details['status'] ?? '...' }}</div>
                                                </li>
                                                @php
                                                $displayed[$program_id] = true;
                                                @endphp
                                                @endif
                                                @endforeach
                                             </ul>
                                          </td>
                                          @else
                                          <td>
                                             <ul style="list-style-type: none;">
                                                @if(!empty($visa_application))
                                                <li>
                                                   <div class="badge bg-info">Visa Status - {{ $visa_application ?? 'Not Available' }}</div>
                                                </li>
                                                @endif
                                             </ul>
                                          </td>
                                          @endif
                                          <td>
                                             <a class="btn btn-info" href="{{route('delete-program',[$item->id])}}" style="margin-top:5px;"><i class="fa-solid fa-trash"></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                                       {{$program_applied->withQueryString()->links()}}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--nus-->
         </div>
      </div>
   </section>
</div>
@endsection