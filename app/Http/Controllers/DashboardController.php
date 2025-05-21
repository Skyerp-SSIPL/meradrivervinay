<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Models\{
    User,
    Student,
    StudentByAgent,
    MasterLeadStatus,
    ProgramPaymentCommission,
    Caste,
    Subject,
    Country,
    Currency,
    Province,
    Setting,
    Pincode,
    UserFollowUp,
    EducationHistory,
    Source,
    EducationLevel,
    PaymentsLink,
    Intrested,
    Fieldsofstudytype,
    University,
    Program,
    ApplicationsApplied,
    StudentScholorship,
    Exam
};

use App\Mail\FranchiseCreatedStudentProfileMail;
use App\Mail\StudentProfileCreatedMail;
use App\Mail\NewLeadAssignedMail;
use App\Mail\StudentPaymentMail;

use App\Jobs\SendOTPJob;
use App\Models\Agent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:dashboard.view', ['only' => ['index']]);
       
        view()->share('page_title', 'Dashboard');
    }

    public function index( Request $request)
    {
        
        $id = Auth::user()->id;
        $users = User::WHERE('id', $id)->first();
        $user_type = $users->admin_type;
        $user_ids = $users->id;
        $total_leads = 0;
        if ($user_type == 'Administrator') {
            $total_leads = StudentByAgent::count();
        } else if ($user_type == 'Franchise') {
            $total_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orwhere('user_id',$user_ids)->orWhere('assigned_to', $user_ids);
            })->count();
        } else if ($user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_leads = StudentByAgent::where("assigned_to", $user_ids)->orwhere('user_id',$user_ids)->count();
        }
        // Total Assigned Leads --
        $total_assigned_leads = 0;
        if ($user_type == 'Administrator') {
            $total_assigned_leads = StudentByAgent::whereNotNull("assigned_to")->count();
        } else if ($user_type == 'Franchise' || $user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_assigned_leads = StudentByAgent::where("assigned_to", $user_ids)->count();
        }
        // Total non-allocated Leads --
        $total_non_allocated_leads = 0;
        if ($user_type == 'Administrator') {
            $total_non_allocated_leads = StudentByAgent::whereNull('assigned_to')->count();
        } else if ($user_type == 'Franchise' || $user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_non_allocated_leads = StudentByAgent::where('user_id',$user_ids)->whereNull('assigned_to')->count();
        }
        // Total Members
        if ($user_type == 'Administrator') {          
            $total_members = User::whereNotIn('admin_type', ['Driver'])->count();
            $total_student = Student::where('profile_complete', 1)->count();
            $total_student_id =Student::pluck('user_id');
            $total_school_manager = User::where('admin_type', 'school_manager')->count();
            $total_frenchise =  User::where('admin_type', 'Franchise')->count();
            $total_active_frenchise = Agent::where('is_active', 1)->count();
            $total_inactive_frenchise = Agent::whereNull('is_active')->orwhere('is_active', 0)->count();
            $total_approve_frenchise = Agent::where('is_approve', 1)->count();
            $total_unapprove_frnchise = Agent::where('is_approve', 0)->count();
            $total_sub_agent = User::where('admin_type', 'sub_agent')->count();
            $total_verification = User::where('admin_type', 'Verification')->count();
            $total_sells = User::where('admin_type', 'Sales')->count();
            $total_digital_marketing = User::where('admin_type', 'Digital Marketing')->count();
            $total_data_collection = User::where('admin_type', 'Data Collection')->count();
            $total_operational = User::where('admin_type', 'Operational')->count();
        } 
        
        else {
            $total_members = User::where('added_by', $user_ids)->count();
            $total_student = Student::where('added_by', $user_ids)->where('profile_complete', 1)->count();
            $authuser = Auth::user();
            if (($authuser->hasRole('Franchise'))) {
                $userId = Auth::id();
                $usersId=User::where('added_by',$userId)->whereNotIn('admin_type',['student'])
                          ->pluck('id')->toArray();

                         
                if (!empty($usersId)) {
                    array_push($usersId, $authuser->id);
                }
            }else{
                $usersId = [$authuser->id];
            }
            $total_student_id = Student::whereIn('added_by', $usersId)->pluck('user_id');

            $total_school_manager = User::where('admin_type', 'school_manager')->where('added_by', $usersId)->count();
            $total_frenchise =  User::where('admin_type', 'Franchise')->where('id', $usersId)->count();
            $total_active_frenchise = Agent::where('is_active', 1)->where('id', $usersId)->count();
            $total_inactive_frenchise = Agent::where('user_id', $user_ids)->where(function ($query) {
                                            $query->whereNull('is_active')
                                                ->orWhere('is_active', 0);
                                         })
                                        ->count();
            $total_approve_frenchise = Agent::where('is_approve', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_frnchise = Agent::where('is_approve', 0)->where('user_id', $user_ids)->count();
            $total_sub_agent = User::where('admin_type', 'sub_agent')->where('added_by', $user_ids)->count();
        }
        if ($user_type == 'Administrator') {
            $total_university = University::count();
            $total_program = Program::count();
            $total_application = ApplicationsApplied::count();
            $total_unapprove_universties = University::where(function ($query) {
                                            $query->whereNull('is_approved')->orWhere('is_approved',0);
                                        })->count();
            $total_approve_universties = University::where('is_approved', 1)->count();
            $total_unapprove_program = Program::where(function ($query) {
                                    $query->whereNull('is_approved')->orWhere('is_approved',0);
                                })->count();
            $total_approve_program=Program::where('is_approved', 1)->count();
            $total_unapprove_counceler = User::where('admin_type', 'counselor')->where('profile_verify_for_agent', 0)->count();
            $total_approve_counceler = User::where('admin_type', 'counselor')->where('profile_verify_for_agent', 1)->count();
        }else{
            $total_university = University::where('user_id', $user_ids)->count();
            //$total_program = Program::where('user_id', $user_ids)->count();
            $total_program = Program::count();
            $total_application = ApplicationsApplied::count();
            $total_unapprove_universties = University::where(function ($query) {
                                            $query->whereNull('is_approved')->orWhere('is_approved',0);
                                        })->where('user_id', $user_ids)->count();
            $total_approve_universties = University::where('is_approved', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_program = Program::where(function ($query) {
                                        $query->whereNull('is_approved')->orWhere('is_approved',0);
                                    })->where('user_id', $user_ids)->count();
            $total_approve_program=Program::where('is_approved', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_counceler = User::where('admin_type', 'counselor')->where('added_by', $user_ids)->where('profile_verify_for_agent', 0)->count();
            $total_approve_counceler = User::where('admin_type', 'counselor')->where('added_by', $user_ids)->where('profile_verify_for_agent', 1)->count();
     
     
        }

        if($user_type == 'Driver') {
            $student_user =Auth::user();
            $student_id=Student::where('user_id',$student_user->id)->first();
            if(empty($student_id)) {
                abort(404);
            }

            $program_applied = PaymentsLink::with([
                'program:id,name,school_id',
                'program.university_name:id,university_name',
                'payments'
            ])
            ->when(auth()->user()->role == 'student', function ($query) {
                $query->orWhere('payment_type_remarks', 'applied_program_pay_later')
                      ->orWhere('payment_type_remarks', 'applied_program');
            })
            ->where('user_id', $student_id->user_id)
            ->get() // Retrieve all records
            ->unique('program_id') // Get unique program_id values
            ->count(); // Count the unique programs



               
        }else{
            $program_applied = null;
        }
      
                       
        
        $data = array(
            // "user_follow_up"=>$user_follow_up,
            "program_applied"=>$program_applied,
            // "total_program_applied"=>$total_program_applied,
            "total_leads" => $total_leads,
            "total_assigned_leads" => $total_assigned_leads,
            "total_non_allocated_leads" => $total_non_allocated_leads,
            "total_members" => $total_members,
            "total_student" => $total_student,
            "total_school_manager" => $total_school_manager,
            "total_frenchise" => $total_frenchise,
            "total_active_frenchise" => $total_active_frenchise,
            "total_inactive_frenchise" => $total_inactive_frenchise,
            "total_approve_frenchise" => $total_approve_frenchise,
            "total_approve_universties"=>$total_approve_universties,
            "total_unapprove_frnchise" => $total_unapprove_frnchise,
            "total_sub_agent" => $total_sub_agent,
            "total_university" => $total_university,
            "total_program" => $total_program,
            "total_application" => $total_application,
            "total_unapprove_universties" => $total_unapprove_universties,
            "total_unapprove_program" => $total_unapprove_program,
            "total_approve_program" => $total_approve_program,
            "total_unapprove_counceler" => $total_unapprove_counceler,
            "total_approve_counceler" => $total_approve_counceler,
            "total_verification" =>  $total_verification,
            "total_data_collection" => $total_data_collection,
            "total_sells" =>  $total_sells,
            "total_digital_marketing" => $total_digital_marketing,
            "total_data_collection" =>  $total_data_collection,
            "total_operational" =>  $total_operational,


        );


        return view('dashboard', compact('data'));
    }
    public function dashboard_data(Request $request)
    {

        if ($request->key == 'total-members') {
           $total_members = User::paginate(12);
           $dash_name = 'Total Members';
        }
        $dash_data = [

            'dash' => $total_members,
            'dash_name' => $dash_name,
        ];
       
       return view('dashboard-data', compact('dash_data'));
    }
}
