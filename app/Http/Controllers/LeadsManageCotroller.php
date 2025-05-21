<?php

namespace App\Http\Controllers;

use App\Exports\LeadExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\LeadsExcelSheetImport;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Models\User;
use App\Models\DriverCategoryStatus;

use App\Models\MasterService;
use App\Models\VisaType;
use App\Models\EducationLane;
use App\Models\Specialisations;
use App\Models\LicenseType;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\MasterLeadStatus;
use App\Models\ProgramPaymentCommission;
use Spatie\Permission\Models\Role;
use App\Models\Caste;
use App\Models\DriversList;

use App\Models\VisaSubDocument;
use App\Models\LeadStatusQuality;
use App\Models\DocumentType;
use App\Models\Subject;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use App\Models\Payment;
use App\Models\Source;
use App\Models\EducationLevel;
use App\Models\PaymentsLink;
use App\Models\Intrested;
use App\Models\Fieldsofstudytype;
use App\Models\University;
use App\Models\Program;
use App\Mail\StudentRegistraionMail;
use App\Mail\ApplyOel360Offer;

use App\Models\ApplicationsApplied;
use Validator;
use App\Models\StudentScholorship;
use App\Models\Exam;
use App\Mail\FranchiseCreatedStudentProfileMail;
use App\Mail\StudentProfileCreatedMail;
use App\Mail\ApplyOel360Email;
use App\Mail\NewLeadAssignedMail;
use App\Mail\StudentPaymentMail;
use App\Mail\StudentPraposelMail;

use App\Jobs\SendOTPJob;
use App\Mail\assignLeadsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentLinkEmail;
use App\Models\DriverType;
use App\Models\ExpectedSalary;
use App\Models\JobType;
use App\Models\LeadQuality;
use App\Models\ProgramLevel;
use App\Models\VisaDocument;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use PhpParser\Node\Expr\FuncCall;
use Razorpay\Api\Api;


class LeadsManageCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:dashboard.view', ['only' => ['index']]);
        $this->middleware('role_or_permission:leads_lists.view', ['only' => ['lead_list']]);
        $this->middleware('role_or_permission:leads_dashboard.view', ['only' => ['leadsDashboard']]);
        $this->middleware('role_or_permission:add_leads.view', ['only' => ['create_new_lead']]);
        $this->middleware('role_or_permission:assigned_lead.view', ['only' => ['assigned_leads']]);
        $this->middleware('role_or_permission:pending_lead.view', ['only' => ['pending_leads']]);
        $this->middleware('role_or_permission:oel_360.view', ['only' => ['oel_360']]);
        $this->middleware('role_or_permission:oel_apply.view', ['only' => ['aply_360']]);
        view()->share('page_title', 'Dashboard');
    }
    public function lead_dashboard_data(Request $request)
    {
        $next_leads = null;
        $id = Auth::user()->id;
        $users = DB::table('users')->WHERE('id', $id)->first();
        $currentDateTime = Carbon::now()->toDateString();
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $next_leads = StudentByAgent::where('next_calling_date', '>=', date('Y-m-d\TH:i:s', strtotime('created_at')))->where('next_calling_date', '>', $currentDateTime)
                ->paginate(12);
        } else if ($user->hasRole('Franchise') || $user->hasRole('sub_agent') || $user->hasRole('visa')) {
            $next_leads = StudentByAgent::where('next_calling_date', '>=', date('Y-m-d\TH:i:s', strtotime('created_at')))
                ->where('user_id', Auth::user()->id)->where('next_calling_date', '>', $currentDateTime)
                ->paginate(12);
        }
        return $next_leads;
    }

    public function leadsDashboard(Request $request)
    {

        $id = Auth::user()->id;
        $users = DB::table('users')->WHERE('id', $id)->first();
        $user_type = $users->admin_type;
        $user_ids = $users->id;

        $verified = 'Verified (KYC & Payment done)';
        $unverified = 'Unverified (KYC & Payment not done)';
        $blocked = 'Blocked';
        $high_rated = 'High Rated Driver (5*)';
        $payment_done = 'Verified (Payment done & KYC not done)';
        $kyc_done = 'Verified (KYC done & Payment not done)';
        
        $total_leads = 0;
        if ($user_type == 'Administrator') {
            $total_leads = StudentByAgent::count();
         
        } 
        else if ($user_type == 'Franchise') {
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $total_leads = $query->get();
            $total_leads = count($total_leads);
           

        } else if ($user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_leads = StudentByAgent::where("assigned_to", $user_ids)->orwhere('user_id', $user_ids)->count();
        }
        // Cold Lead
        $lead_status = DriverCategoryStatus::where("name", "Verified (KYC & Payment done)")->first();
        $lead_status_id = $lead_status ? $lead_status->id : null;
        $verified = 0;
        if ($user_type == 'Administrator') {
            $verified = StudentByAgent::where('driver_category_status', $lead_status_id)->count();
        } else if ($user_type == 'Franchise') {

            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_id)->get();
            $verified =  $query->count();

         
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $verified = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        }

        // Hot Lead
        $lead_status = DriverCategoryStatus::where("name", "Unverified (KYC & Payment not done)")->first();
        $lead_status_hot_id = $lead_status ? $lead_status->id : null;
        $unverified = 0;
        if ($user_type == 'Administrator') {
            $unverified = StudentByAgent::where('driver_category_status', $lead_status_hot_id)->count();
        } else if ($user_type == 'Franchise') {

            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_hot_id)->get();
            $unverified =  $query->count();

        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $unverified = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_hot_id)->count();
        }
        // Future Lead
        $lead_status = DriverCategoryStatus::where("name", "Blocked")->first();
        $lead_status_future_id = $lead_status ? $lead_status->id : null;
        $blocked = 0;
        if ($user_type == 'Administrator') {
            $blocked = StudentByAgent::where('driver_category_status', $lead_status_future_id)->count();
        } else if ($user_type == 'Franchise') {
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_future_id)->get();
            $blocked =  $query->count();

        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $blocked = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_future_id)->count();
        }
        // New Lead
        $lead_status = DriverCategoryStatus::where("name", "High Rated Driver (5*)")->first();
        $lead_status_new_id = $lead_status ? $lead_status->id : null;
       
        $high_rated = 0;
        if ($user_type == 'Administrator') {
            $high_rated = StudentByAgent::where('driver_category_status', $lead_status_new_id)->count();
        } else if ($user_type == 'Franchise') {
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;


            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_new_id);
            $high_rated = $query->get();

            $high_rated = count($high_rated);

            // dd($high_rated);
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $high_rated = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_new_id)->count();
        }
        $lead_status = DriverCategoryStatus::where("name", "Verified (Payment done & KYC not done)")->first();
        $lead_status_not_userful_id = $lead_status ? $lead_status->id : null;
        
        $payment_done = 0;
        if ($user_type == 'Administrator') {
            $payment_done = StudentByAgent::where('driver_category_status', $lead_status_not_userful_id)->count();
        } else if ($user_type == 'Franchise') {

            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_not_userful_id)->get();
            $payment_done =  $query->count();


        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $payment_done = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_not_userful_id)->count();
        }
        // Warm Lead
        $lead_status = DriverCategoryStatus::where("name", "Verified (KYC done & Payment not done)")->first();
        $lead_status_warm_id = $lead_status ? $lead_status->id : null;
        
        $kyc_done = 0;
        if ($user_type == 'Administrator') {
            $kyc_done = StudentByAgent::where('driver_category_status', $lead_status_warm_id)->count();
        } else if ($user_type == 'Franchise') {


            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_warm_id)->get();
            $kyc_done =  $query->count();


        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $kyc_done = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_warm_id)->count();
        }
        // Closed Leads
        $lead_status = DriverCategoryStatus::where("name", "Closed")->first();
        $lead_status_closed_id = $lead_status ? $lead_status->id : null;
        $total_closed_leads = 0;
        if ($user_type == 'Administrator') {
            $total_closed_leads = StudentByAgent::where('driver_category_status', $lead_status_closed_id)->count();
        } else if ($user_type == 'Franchise') {


            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('driver_category_status', $lead_status_closed_id)->get();
            $total_closed_leads =  $query->count();

        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_closed_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("assigned_to", $user_ids)
                    ->orWhere('user_id', $user_ids);
            })->where('driver_category_status', $lead_status_closed_id)->count();
        }

        // Total Assigned Leads --
        $total_assigned_leads = 0;
        if ($user_type == 'Administrator') {
            $total_assigned_leads = StudentByAgent::whereNotNull("assigned_to")->count();
        } else if ($user_type == 'Franchise') {


            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->whereNotNull("assigned_to")->get();
            $total_assigned_leads =  $query->count();

            // $total_assigned_leads = StudentByAgent::where("assigned_to", $user_ids)->count();

        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_assigned_leads = StudentByAgent::where("assigned_to", $user_ids)->count();
        }

        // Total non-allocated Leads --
        $total_non_allocated_leads = 0;
        if ($user_type == 'Administrator') {
            $total_non_allocated_leads = StudentByAgent::whereNull('added_by_agent_id')->count();
        } else if ($user_type == 'Franchise') {

            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->whereNull("added_by_agent_id")->get();
            $total_non_allocated_leads =  $query->count();


            // $total_non_allocated_leads = StudentByAgent::where('assigned_to', $user_ids)->whereNull('added_by_agent_id')->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_non_allocated_leads = StudentByAgent::where('assigned_to', $user_ids)->whereNull('added_by_agent_id')->count();
        }

        // Next Leads
        $next_leads = [];
        $currentDateTime = now()->toDateTimeString(); // Get current date and time in 'YYYY-MM-DD HH:MM:SS' format

        if ($user_type == 'Administrator') {

            $next_leads_query = StudentByAgent::where(DB::raw('next_calling_date'), '>', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->orderBy('next_calling_date', 'asc');
       
        } 
        else if ($user_type == 'Franchise' || $user_type == 'Verification') {

            // dd($user_type);
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            // $next_leads_query = StudentByAgent::whereRaw("assigned_to IN($user)")->where(DB::raw('next_calling_date'), '>', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->orderBy('next_calling_date', 'asc');
            $next_leads_query = StudentByAgent::first();
       
            // dd($next_leads_query);
       
        } 
        elseif ($user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $next_leads_query = StudentByAgent::where(DB::raw('next_calling_date'), '>', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->Where('assigned_to', $user_ids)->orderBy('next_calling_date', 'asc');
        }

        $next_leads = $next_leads_query->paginate(10, ['*'], 'upcoming_lead_page');
        $total_upcoming_leads = $next_leads_query->count();

        // miss leads
        if (Auth::user()->hasRole('Administrator')) {
            $next_leads_missed = StudentByAgent::where(DB::raw('next_calling_date'), '<', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->orderBy('next_calling_date', 'asc')
                ->get();



        } elseif ($user_type == 'Franchise' || $user_type == 'Verification') {
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_ids");
            $commaList = null;
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;

                
            $next_leads_missed = StudentByAgent::whereRaw("assigned_to IN($user)")->where(DB::raw('next_calling_date'), '<', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->orderBy('next_calling_date', 'asc')
                ->get();
        } elseif ($user_type == 'sub_agent') {
            $next_leads_missed = StudentByAgent::where(DB::raw('next_calling_date'), '<', $currentDateTime)->where('lead_status', '<>', '5')->where('lead_status', '<>', '7')->Where('assigned_to', Auth::user()->id)->orderBy('next_calling_date', 'asc')
                ->get();
        }
        $count_next_leads_miss = $next_leads_missed->count();
        $baseQuery = StudentByAgent::orderBy('id', 'desc');

        // Apply role-based filtering to base query
        if ($user_type == 'Administrator') {
            // No filter needed
        } elseif ($user_type == 'Franchise') {
            $agents = DB::table('users')->where('added_by', $user_ids)->pluck('id')->toArray();
            $agents[] = $user_ids;
            $baseQuery->whereIn('assigned_to', $agents);
        } elseif ($user_type == 'sub_agent') {
            $baseQuery->where('assigned_to', $user_ids);
        }
        
        // Define quality levels
        $lowLimit = 5;
        $mediumLimit = 7.5;
        
        // Clone and apply filters for each quality
        $counts_quality_low = (clone $baseQuery)->whereHas('leadStatusQuality', function ($q) use ($lowLimit) {
            $q->where('total_status', '<=', $lowLimit);
        })->count();
        
        $counts_quality_medium = (clone $baseQuery)->whereHas('leadStatusQuality', function ($q) use ($lowLimit, $mediumLimit) {
            $q->whereBetween('total_status', [$lowLimit + 0.1, $mediumLimit]);
        })->count();
        
        $counts_quality_high = (clone $baseQuery)->whereHas('leadStatusQuality', function ($q) use ($mediumLimit) {
            $q->where('total_status', '>', $mediumLimit);
        })->count();
        
        $data = array(
            "total_leads" => $total_leads,
            'total_upcoming_leads' => $total_upcoming_leads,
            'count_next_leads_miss' => $count_next_leads_miss,
            "verified" => $verified,
            "unverified" => $unverified,
            "blocked" => $blocked,
            "high_rated" => $high_rated,
            "payment_done" => $payment_done,
            "kyc_done" => $kyc_done,
            "total_closed_leads" => $total_closed_leads,
            "total_assigned_leads" => $total_assigned_leads,
            "total_non_allocated_leads" => $total_non_allocated_leads,
            'Low' => $counts_quality_low,
            'Medium' => $counts_quality_medium,
            'High' => $counts_quality_high,

        );

        return view('admin.leads.dashboard', compact('data', 'next_leads', 'counts_quality_low', 'counts_quality_high'));
    }


    public function create_new_lead()
    {

        $user = auth()->user();
       
        $countries = Country::where('is_active', 1)->get();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $driver_type = DriverType::where("status", 1)->orderBy('name', 'ASC')->get();
        $source=Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $job_type = JobType::where("status", 1)->orderBy('name', 'ASC')->get();
        $driver_type = DriverType::orderBy('name', 'ASC')->get();
        $total_exp = VisaType::orderBy('name', 'ASC')->get();
        $expected_sallery = ExpectedSalary::orderBy('name', 'ASC')->get();
        $licensetype = LicenseType::orderBy('name', 'ASC')->get();
        $documentType =  DocumentType::orderBy('name', 'ASC')->get();
        $driverCtagoryStatus =  DriverCategoryStatus::orderBy('name', 'ASC')->get();
       
        return view('admin.leads.add_lead', compact('documentType','driverCtagoryStatus','expected_sallery', 'countries', 'lead_status', 'source',  'job_type','driver_type','licensetype'));
    }

    public function edit_lead_data(Request $request, $id)
    {

        $user = auth()->user();
       
        $countries = Country::where('is_active', 1)->get();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $driver_type = DriverType::where("status", 1)->orderBy('name', 'ASC')->get();
        $source=Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $studentData = StudentByAgent::where('id', $id)->first();

        // dd($studentData);
        $job_type = JobType::where("status", 1)->orderBy('name', 'ASC')->get();
        $driver_type = DriverType::orderBy('name', 'ASC')->get();
        $total_exp = VisaType::orderBy('name', 'ASC')->get();
        $expected_sallery = ExpectedSalary::orderBy('name', 'ASC')->get();
        $licensetype = LicenseType::orderBy('name', 'ASC')->get();
        $documentType =  DocumentType::orderBy('name', 'ASC')->get();
        $driverCtagoryStatus =  DriverCategoryStatus::orderBy('name', 'ASC')->get();

       
        return view('admin.leads.edit_lead', compact('documentType','driverCtagoryStatus','source','licensetype','studentData', 'expected_sallery',  'countries', 'lead_status',  'job_type','driver_type'));
    }


    public function fetchStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = Province::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }

    public function add_lead_data(Request $request)
    {

        //  dd($request->all());
       
        $users = Auth::user();
        if ($request->tab1) {
            if ($request->id) {
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|regex:/^[a-zA-Z\s]+$/',              
                    'phone_number' => 'required',  
                    'source' => 'required', 
                    'driver_category_status' => 'required',
                    'driver_type' => 'required',            

                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|regex:/^[a-zA-Z\s]+$/',                  
                    'phone_number' => 'required',   
                    'source' => 'required', 
                    'driver_category_status' => 'required',
                    'driver_type' => 'required',                 

                ]);
            }
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $user_id = Auth::user()->id;
            if (!($users->hasRole('Administrator'))) {
                $assined_user = Auth::user()->id;
            }

            $StudentAgent = StudentByAgent::updateOrCreate(
                ['id' => $request->id],
                [
                    "source" => $request->source ?? null,
                    "driver_category_status" => $request->driver_category_status ?? null,
                    "driver_type" => $request->driver_type ?? null,
                    "first_name" => $request->first_name ?? null,
                    "last_name" => $request->last_name ?? null,
                    "father_name" => $request->father_name ?? null,
                    "mother_name" => $request->mother_name ?? null,
                    "email" => $request->email ?? null,
                    "phone_number" => $request->phone_number ?? null,
                    "emergency_no" => $request->emergency_no ?? null,
                    "dob" => $request->dob ?? null,
                    "martial_status" => $request->martial_status ?? null,
                    "gender" => $request->gender ?? null,
                    "passport_number" => $request->passport_number ?? null,
                    "religion" => $request->religion ?? null,
                    "color" => $request->color ?? null,
                    "language" => $request->language ?? null,
                    "age" => $request->age ?? null,
                    "height" => $request->height ?? null,
                    "weight" => $request->weight ?? null,
                    "country_id" => $request->country_id ?? null,
                    "province_id" => $request->province_id ?? null,
                    "zip" => $request->zip ?? null,
                    "address" => $request->address ?? null,
                ]
                
            );
            $data = [
                'id' => $StudentAgent->id,
                'student_agent' => $StudentAgent,
                'tab1' => 'tab1',
                'status' => true,
                'message' => 'Leads Added Successfully',
            ];
            return response()->json($data);
        } elseif ($request->tab2 && $request->id) {
         
            $studentAgent = StudentByAgent::where('id', $request->id)->first();
            $studentAgent->update([
            "education_level" => $request->education_level ?? null,
            "driver_training" => $request->vechile_driver_training ?? null,
            "driver_certificate" => $request->driver_certificate ?? null,
            "eye_vision" => $request->eye_vision ?? null,
         
            "health_insurance_status" => $request->health_insurance_status ?? null,
          
            "blood_group"=> $request->blood_group ?? null,
            
                     
            ]);

            $data = [
                'student_agent' => $studentAgent,
                'tab2' => 'tab2',
                'status' => true,
                'message' => 'Leads Updated Successfully',
            ];
            return response()->json($data);
        } elseif ($request->tab3) {
         
            $studentAgent = StudentByAgent::where('id', $request->id)->first();

                // if ($request->hasFile('document_upload')) {
                //     $file = $request->file('document_upload');
                //     $filename = time() . '_' . $file->getClientOriginalName();
                //     $uploadPath = 'meradriver/documents/' . $filename;
                
                //     // Move file to public path
                //     $file->move(public_path('meradriver/documents/'), $filename);
                
                //     // Check if document already exists
                //      $existingDoc = DB::table('driver_documents')
                //     ->where('driver_id', $studentAgent->id)
                //     ->where('document_type', $request->document_type)
                //     ->first();
                
                //     if ($existingDoc) {
                //         // Delete old file if it exists
                //         $oldPath = public_path($existingDoc->document_path);
                //         if (file_exists($oldPath)) {
                //             unlink($oldPath);
                //         }
                
                //         // Update existing record
                //         DB::table('driver_documents')
                //             ->where('id', $existingDoc->id)
                //             ->update([
                //                 'document_path' => $uploadPath,
                //                 'updated_at' => now(),
                //             ]);

                //     } else {

                //         // Insert new document
                //         DB::table('driver_documents')->insert([
                //             'driver_id' => $studentAgent->id,
                //             'document_type' => $request->document_type,
                //             'document_path' => $uploadPath,
                //             'created_at' => now(),
                //             'updated_at' => now(),
                //         ]);
                //     }
                // }
                
            $studentAgent->update([
                "license_type" => $request->licence_type ?? null,
                "vechicle_type" => $request->vechicle_type ?? null,
                "license_no" => $request->license_no ?? null,
                "license_issue_date" => $request->license_issue_date ?? null,
                "license_exp_date" => $request->license_exp_date ?? null,               
                "pulice_verification_status" => $request->police_verification_status ?? null,          
                "pulice_verification_no" => $request->pulice_verification_no ?? null,        
               
                "job_type" => $request->job_type ?? null,
                "total_exp" => $request->total_experiance ?? null,
                "current_salary" => $request->current_sallery ?? null,
                "expected_salary" => $request->expected_sallery ?? null,                
            ]);

            $data = [
                'student_agent' => $studentAgent,
                'tab3' => 'tab3',
                'status' => true,
                'message' => 'Driver Profile Updated Successfully',
            ];
          
            return response()->json($data);
        } elseif ($request->tab4) {
          
            $studentAgent = StudentByAgent::where('id', $request->id)->first();
            $studentAgent->update([
                "payment_mode" => $request->payment_mode ?? null,
                "amount" => $request->amount ?? null,
                "payment_receipt_date" => $request->payment_receipt_date ?? null,
                "bank_name" => $request->bank_name ?? null,
                "bank_account" => $request->bank_account_no ?? null,
                "ifsc_code" => $request->ifsc_code ?? null,
                "branch_name" => $request->branch_name ?? null,
                "upi_id" => $request->upi_id ?? null,
                "comments" => $request->remarks ?? null,
            ]);
            $data = [
                'student_agent' => $studentAgent,
                'tab4' => 'tab4',
                'status' => true,
                'message' => 'Driver Profile Updated Successfully',
            ];
            return response()->json($data);
        }
    }

    public function filterLeads($request)
    {
        // dd  ($request->all());
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 403);
        }
        $user_id = $user->id;
        $lead_list = StudentByAgent::orderBy('id', 'desc');
        if ($user->hasRole('Franchise') || $user->hasRole('Verification')) {
            $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = ?", [$user_id]);
            $commaList = '';
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user_ids = rtrim($commaList, ',') . ',' . $user_id;
            $lead_list->where(function ($query) use ($user_ids) {
                $query->whereIn('assigned_to', explode(',', $user_ids));
            });
        }
         // Handling different roles
        if ($user->hasRole('visa') || $user->hasRole('Digital Marketing') || $user->hasRole('Application Punching') || $user->hasRole('sub_agent')) {
            $lead_list->where(function ($query) use ($user_id) {
                $query->where('assigned_to', $user_id)
                    ->orWhere('user_id', $user_id);
            });
        }
        // Apply filters from the request
        if ($request->name) {
            $lead_list->where('first_name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $lead_list->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $lead_list->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
        }
        // if ($request->driver_category) {
        //     $lead_list->where('driver_category_status', 'LIKE', '%' . $request->driver_category . '%');
        // }
        if ($request->source) {
            $lead_list->where('source', $request->source);
        }
        if ($request->driver_type) {
            $lead_list->where('driver_type', $request->driver_type);
        }
        if ($request->driver_category) {
            $lead_list->where('driver_category_status', $request->driver_category);
        }
        if ($request->assigned_status) {
            if ($request->assigned_status == 'allocated') {
                $lead_list->whereNotNull('assigned_to');
            } elseif ($request->assigned_status == 'notallocated') {
                $lead_list->whereNull('added_by_agent_id');
            }
        }
       
        if ($request->from_date && $request->to_date) {
            $lead_list->whereBetween('created_at', [
                Carbon::parse($request->from_date)->startOfDay(),
                Carbon::parse($request->to_date)->endOfDay()
            ]);
        }

        $currentDateTime = now()->toDateTimeString(); 
        if ($request->missed_leads) {
            if ($user->hasRole('Administrator')) {
                $lead_list->where(DB::raw('next_calling_date'), '<', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')
                    ->orderBy('next_calling_date', 'asc');
            } elseif ($user->hasRole('Franchise')) {
                $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_id");
                $commaList = null;
                foreach ($agents as $agent) {
                    $commaList .= $agent->id . ',';
                }
                $user = $commaList . $user_ids;


                $lead_list->whereRaw("assigned_to IN($user)")->where(DB::raw('next_calling_date'), '<', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')

                    ->orderBy('next_calling_date', 'asc');
            } elseif ($user->hasRole('sub_agent')) {
                $lead_list->where(DB::raw('next_calling_date'), '<', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')
                    ->where('assigned_to', $user_id)
                    ->orderBy('next_calling_date', 'asc');
            }
        }

         // Handling upcoming leads

        if ($request->uppcoming_leads) {

            if ($user->hasRole('Administrator')) {
                $lead_list->where(DB::raw('next_calling_date'), '>', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')
                    ->orderBy('next_calling_date', 'asc');
            } elseif ($user->hasRole('Franchise')) {

                $agents = DB::select("SELECT id FROM `users` WHERE `added_by` = $user_id");
                $commaList = null;
                foreach ($agents as $agent) {
                    $commaList .= $agent->id . ',';
                }
                $user = $commaList . $user_ids;

                $lead_list->whereRaw("assigned_to IN($user)")->where(DB::raw('next_calling_date'), '>', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')

                    ->orderBy('next_calling_date', 'asc');
            } elseif ($user->hasRole('sub_agent')) {
                $lead_list->where(DB::raw('next_calling_date'), '>', $currentDateTime)
                    ->where('lead_status', '<>', '5')
                    ->where('lead_status', '<>', '7')
                    ->where('assigned_to', $user_id)
                    ->orderBy('next_calling_date', 'asc');
            }
        }
      
        if ($request->low_quality) {
           
            $quality = $request->low_quality; 
            
            $lowLimit = 5;
            $mediumLimit = 7.5;
            $highLimit = 10;
        
           
            // Add quality filter
            if ($quality == 'Low') {
           
                $lead_list->whereHas('leadStatusQuality', function ($q) use ($lowLimit) {
                    $q->where('total_status', '<=', $lowLimit);
                });
            } elseif ($quality == 'Medium') {
                $lead_list->whereHas('leadStatusQuality', function ($q) use ($lowLimit, $mediumLimit) {
                    $q->whereBetween('total_status', [$lowLimit + 0.1, $mediumLimit]);
                });
            } elseif ($quality == 'High') {
                $lead_list->whereHas('leadStatusQuality', function ($q) use ($mediumLimit) {
                    $q->where('total_status', '>', $mediumLimit);
                });
            }
        
            // Role-based filtering
            if ($user->hasRole('Administrator')) {
                // No additional filtering needed
            } elseif ($user->hasRole('Franchise')) {
                $agents = DB::table('users')->where('added_by', $user_id)->pluck('id')->toArray();
                $agents[] = $user_id; // Include own ID
                $lead_list->whereIn('assigned_to', $agents);
            } elseif ($user->hasRole('sub_agent')) {
                $lead_list->where('assigned_to', $user_id);
            }
        }
        

        return $lead_list;
    }


    public function lead_list(Request $request, $export = null)
    {
        
        $lead_list = $this->filterLeads($request);

        if ($request->has('export')) {
            return Excel::download(new LeadExport($lead_list->get()), 'leads.xlsx');
        }
        $lead_list = $lead_list->paginate(20);
        // dd($lead_list);

        $countries = Country::where('is_active', 1)->get();

        $lead_status = MasterLeadStatus::get();
        if ($request->has('action') && $request->input('action') === 'export') {
            return Excel::download(new LeadExport($lead_list), 'leads.xlsx');
        }
        if (Auth::user()->hasRole('Administrator')) {
            $sub_agents = User::where('admin_type', 'sub_agent')->select('id', 'email', 'name')->get();
        } else {
            $sub_agents = User::where('admin_type', 'sub_agent')->select('id', 'email', 'name')->where('added_by', Auth::user()->id)->get();
        }

        $driver_type = DriverType::select('name', 'id')->get();
        $driver_cate_status = DriverCategoryStatus::select('name', 'id')->get();

        $source=Source::where("status", 1)->orderBy('name', 'ASC')->get();
        return view('admin.leads.lead-list', compact('lead_list','driver_cate_status', 'source','driver_type','countries', 'lead_status', 'sub_agents'));
    }

    public function assigned_leads(Request $request)
    {
        $lead_list = $this->filterLeads($request);
        $lead_list = $lead_list->paginate(12);
        $countries = Country::where('is_active', 1)->get();
        $lead_status = MasterLeadStatus::get();
        return view('admin.leads.assigend-leads', compact('lead_list', 'countries', 'lead_status'));
    }

    public function pending_leads(Request $request)
    {
        $lead_list = $this->filterLeads($request);
        $lead_list = $lead_list->whereNull('assigned_to')->paginate(12);
        $countries = Country::where('is_active', 1)->get();
        $lead_status = MasterLeadStatus::get();
        return view('admin.leads.pending-leads', compact('lead_list', 'countries', 'lead_status'));
    }





    public function manage_lead(Request $request, $id)
    {
        $studentAgentData = StudentByAgent::with('country')->findOrFail($id);


        $student_id = $id;
        $masterLeadStatus = MasterLeadStatus::get();
        $master_service = MasterService::select('name', 'id')->get();
        $driverCtagoryStatus =  DriverCategoryStatus::orderBy('name', 'ASC')->get();


        $follow_up_list = DB::table('user_follow_up')
            ->join('driver_data', 'user_follow_up.student_id', '=', 'driver_data.id')
            ->where('student_id', $id)
            ->select('user_follow_up.*', 'driver_data.first_name', 'driver_data.email')
            ->latest()
            ->get();
        return view('admin.leads.manage-leads', compact('studentAgentData','driverCtagoryStatus', 'master_service', 'student_id', 'masterLeadStatus', 'follow_up_list'));
    }
    public function lead_quality(Request $request, $id)
    {
        $studentAgentData = StudentByAgent::with('country')->findOrFail($id);


        $student_id = $id;
        $masterLeadStatus = MasterLeadStatus::get();
        $master_service = MasterService::select('name', 'id')->get();
        $lead_quality = LeadQuality::select('name', 'id', 'status', 'status_one', 'status_to', 'status_three', 'status_four')->get();


        $follow_up_list = DB::table('user_follow_up')
            ->join('driver_data', 'user_follow_up.student_id', '=', 'driver_data.id')
            ->where('student_id', $id)
            ->select('user_follow_up.*', 'driver_data.first_name', 'driver_data.email')
            ->latest()
            ->get();
        return view('admin.leads.leads_quality', compact('studentAgentData', 'lead_quality', 'master_service', 'student_id', 'masterLeadStatus', 'follow_up_list'));
    }

    public function delete_user_follow_up(Request $request)
    {
        if ($request->id) {
            $deleted = DB::table('user_follow_up')->where('id', $request->id)->delete();
            if ($deleted) {
                return redirect()->back()->with('success', 'Follow up deleted successfully.');
            }
        }
        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function generateToken()
    {
        $token = Str::random(60);
        $paymentsLink = PaymentsLink::where('token', $token)->first();
        if ($paymentsLink) {
            $token = $this->generateToken();
        }
        return $token;
    }

    public function uniqidgenrate()
    {
        $uniqueId = uniqid() . bin2hex(random_bytes(5));
        $paymentsLink = Payment::where('fallowp_unique_id', $uniqueId)->first();
        if ($paymentsLink) {
            $uniqueId = $this->uniqidgenrate();
        }
        return $uniqueId;
    }
    public function add_user_follow_up(Request $request)
    {

       

        $uniqueId       = $this->uniqidgenrate();
        if ($request->paymentMode == 'Online') {
            $paymentType  = $request->paymentType;
            $paymentMode  = $request->payment_mode;
            $token           = $this->generateToken();
            $user           = User::select('id', 'email', 'phone_number')->where('id', $request->student_id)->first();
            $studentdata = StudentByAgent::where('id', $request->student_id)->select('email', 'name')->first();

            if ($request->discount || $request->panding) {
                $discount = $request->discount ?? 0;

                $panding = $request->panding ?? 0;
                $amount = $request->amount - $discount - $panding;
            } else {
                $discount = 0;
                $amount = $request->amount;
            }

            $paymentLinkData = [
                'token'                    => $token,
                'user_id'                => $request->student_id ?? $request->user_id,
                'email'                    => $studentdata->email,
                'payment_type'            => $paymentType,
                'sub_service'           => implode(',', $request->sub_service) ?? null,
                'is_discount'            => $request->is_discount ?? 0,
                'discount'                => $request->discount ?? 0,
                'payment_type_remarks'     => "",
                'payment_mode'          => $paymentMode,
                'payment_mode_remarks'     => "",
                'amount'                 => $amount,
                'expired_in'            => date('Y-m-d H:i:s', strtotime('+ 10 days')),
                'fallowp_unique_id' => $uniqueId,
                'due_date' => $request->due_date ?? 0,
                'is_panding' => $request->is_panding ?? 0,
                'panding' => $request->panding ?? 0,
                'master_service' => $paymentMode,
            ];
            $paymentData = [
                'name' => $studentdata->name,
                'payment_link' => url('/pay-now/c?token=' . $token),
                'amount' => $amount * 2.5 / 100 + $amount,
            ];
            PaymentsLink::create($paymentLinkData);

            $attachmentPath = public_path('frontend/studentPraposel.pdf');

            $attachmentName = 'studentPraposel.pdf';


            Mail::to($studentdata->email)->send(new PaymentLinkEmail($paymentData, $attachmentPath, $attachmentName));
        }
        // dd($request->all());
        StudentByAgent::where('id', $request->student_id)->update([
            'next_calling_date' => $request->next_calling_date,
            'driver_category_status' => $request->lead_status,
            // 'lead_status' => $request->lead_status,

            // 'intake' => $request->intake,
            // 'intake_year' => $request->intake_year,
            'student_comment' => $request->comment,
            'updated_at' => now(),
        ]);
        if ($request->paymentMode == 'Cash' || $request->paymentMode == 'Cheque' || $request->paymentMode == 'Bank') {
            if ($request->discount || $request->panding) {
                $discount = $request->discount ?? 0;

                $panding = $request->panding ?? 0;
                $amount = $request->amount - $discount - $panding;
            } else {
                $discount = 0;
                $amount = $request->amount;
            }
            $email = StudentByAgent::where('id', $request->student_id)->pluck('email')->first();
            $name = StudentByAgent::where('id', $request->student_id)->pluck('first_name')->first();

            //  dd(  $email);

            $payments = PaymentsLink::create([
                'token'                    => $this->generateToken() ?? null,
                'user_id'                => $request->student_id ?? null,
                'email'                    => $email ?? null,
                'payment_type'            => $request->payment_type ?? null,
                'sub_service'           => isset($request->sub_service) ? implode(',', $request->sub_service) : null,
                'is_discount'            => $request->is_discount ?? 0,
                'discount'                => $request->discount ?? 0,
                'payment_type_remarks'     => "",
                'payment_mode'          => $request->paymentMode ?? null,
                'master_service'        => $request->paymentType,
                'payment_mode_remarks'     => "",
                'amount'                 => $amount,
                'fallowp_unique_id' => $this->uniqidgenrate(),
                'due_date' => $request->due_date ?? 0,
                'is_panding' => $request->is_panding ?? 0,
                'panding' => $request->panding ?? 0,

            ]);
            $studentData = [
                'name' => $name,

            ];


            $attachmentPath = public_path('frontend/studentPraposel.pdf');

            $attachmentName = 'studentPraposel.pdf';

            // Mail::to($email)->send(new StudentPraposelMail($studentData, $attachmentPath, $attachmentName));

            Payment::create([
                'payment_id' => $payments->id ?? null,
                'payment_method' => $request->payment_mode ?? null,
                'currency' => null,
                'fallowp_unique_id' => $payments->fallowp_unique_id,
                'customer_name' => $request->name ?? null,
                'user_id' => $request->student_id ?? null,
                'customer_email' => $email ?? null,
                'amount' => $amount ?? null,
                'payment_status' => 'success',
                'json_response' => 'null',

            ]);
        }
       
        $data = [
            'student_id' => $request->student_id,
            // 'status' => $request->lead_status ?? null,
            'driver_category_status' => $request->lead_status ?? null,

            'paymentType' => $request->paymentType ?? null,
            'paymentTypeRemarks' => $request->paymentTypeRemarks ?? null,
            'paymentMode' => $request->paymentMode ?? null,
            'paymentModeRemarks' => $request->paymentModeRemarks ?? null,
            // 'intake' => $request->intake ?? null,
            // 'intake_year' => $request->intake_year ?? null,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment ?? null,
            'next_calling_date' => $request->next_calling_date,
            'amount' => $request->amount ?? null,
            'fallowp_unique_id' => isset($payments) ? $payments->fallowp_unique_id : $uniqueId,
            'bankName' => $request->bankName ?? null,
            'accountNo' => $request->accountNo ?? null,
            'ifscCode' => $request->ifscCode ?? null,
            'sub_service'  => isset($request->sub_service) ? implode(',', $request->sub_service) : null,
            'is_discount' => $request->is_discount ?? 0,
            'discount'  => $request->discount ?? 0,
            'created_at' => now(),
            'due_date' => $request->due_date ?? 0,
            'is_panding' => $request->is_panding ?? 0,
            'panding' => $request->panding ?? 0,

        ];
        DB::table('user_follow_up')->insert($data);
        return response()->json(['message' => 'Data Submitted Successfully ']);
    }


    public function payment_view(Request $request)
    {
        $token = $request->token;
        $paymentLink = PaymentsLink::where('token', $token)->first();
        if (!$paymentLink) {
            Session::put('error', 'Token Expired');
            return redirect()->back();
        }
        if (!$paymentLink->user_id) {
            Session::put('error', 'User ID Not Found');
            return redirect()->back();
        }
        $student_name = StudentbyAgent::where('email', $paymentLink->email)->select('name')->first();
        $oamount = round($paymentLink->amount * 2.5 / 100 + $paymentLink->amount);
        $data = [
            'fallowp_unique_id' => $paymentLink->fallowp_unique_id,
            'user_id' => $paymentLink->user_id,
            'email' => $paymentLink->email,
            'amount' => $oamount,
            'name' => $student_name->name
        ];
        // dd($data);
        return view('admin.leads.payment-view', compact('data'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $paymentResponse = $request->input('response', []);
            if (count($paymentResponse) > 0 && empty($paymentResponse['razorpay_payment_id'])) {
                Session::put('error', 'No Payment ID Found');
                return redirect()->back();
            }
            $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
            try {
                $payment = $api->payment->fetch($paymentResponse['razorpay_payment_id']);
                $response = $payment->capture(['amount' => $payment['amount']]);
                // dd($response);
                Payment::create([
                    'payment_id' => $response->id,
                    'payment_method' => $response->method,
                    'currency' => $response->currency,
                    'fallowp_unique_id' => $request->response['fallowp_unique_id'],
                    'customer_name' => $request->response['name'],
                    'user_id' => $request->response['user_id'],
                    'customer_email' => $response->email,
                    'amount' => $response->amount / 100,
                    'payment_status' => 'success',
                    'json_response' => json_encode((array)$response)
                ]);
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Payment successfully recorded']);
            } catch (\Exception $e) {
                Payment::create([
                    'payment_id' => $paymentResponse['razorpay_payment_id'] ?? null,
                    'payment_method' => $response->method,
                    'currency' => $response->currency,
                    'fallowp_unique_id' => $request->response['fallowp_unique_id'],
                    'customer_name' => $request->response['name'],
                    'user_id' => $request->response['user_id'],
                    'customer_email' => $response->email,
                    'amount' => $response->amount / 100,
                    'payment_status' => 'failed',
                    'json_response' => json_encode(['error' => $e->getMessage()])
                ]);
                Session::put('error', 'Payment Failed: ' . $e->getMessage());
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Payment failed to record']);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('PAYMENT_STORE_ERROR: ' . $th->getMessage());
            Session::put('error', 'Internal Server Error');
            return response()->json(['success' => false, 'error' => 'Internal Server Error'], 500);
        }
    }

    public function success()
    {
        return view('admin.leads.success');
    }


    public function failure(Request $request)
    {
        DB::beginTransaction();
        try {
            $responseData = $request->input('response', []);
            $errorData = $responseData['error'] ?? [];
            Payment::create([
                'payment_id' => $errorData->id,
                'payment_method' => $errorData->method,
                'currency' => $errorData->currency,
                'fallowp_unique_id' => $errorData->token,
                'customer_email' => $errorData->email,
                'amount' => $errorData->amount,
                'status' => 'failed',
                'json_response' => json_encode((array) $errorData)
            ]);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Payment failure recorded']);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('PAYMENT_FAILURE_ERROR: ' . $th->getMessage());
            return response()->json(['success' => false, 'error' => 'Internal Server Error'], 500);
        }
    }

    
    public function oel_360(Request $request)
    {
        $studentData = Student::query();
        $user = Auth::user();

        if (Auth::user()->hasRole('Administrator')) {
            $sub_agents = User::where('admin_type', 'sub_agent')->select('id', 'email', 'name')->get();
            $agents = User::where('admin_type', 'Franchise')->select('id', 'email', 'name')->get();
        } else {
            $sub_agents = User::where('admin_type', 'sub_agent')->select('id', 'email', 'name')->where('added_by', Auth::user()->id)->get();
            $agents = User::where('admin_type', 'Franchise')->select('id', 'email', 'name')->where('added_by', Auth::user()->id)->get();
            $visa = User::where('admin_type', 'visa')->select('id', 'email', 'name')->where('added_by', Auth::user()->id)->get();
        }

        if ($user->hasRole('Franchise')) {
            $studentData->where(function ($query) use ($user) {
                $query->Where('student.added_by_agent_id', $user->id)
                    ->orWhere('student.added_by', $user->id);
            });
        }

        if ($user->hasRole('sub_agent')) {
            $studentData->where(function ($query) use ($user) {
                $query->Where('student.added_by', $user->id);
            });
        }


        if ($request->first_name) {
            $studentData->where('student.first_name', 'LIKE', "%$request->first_name%");
        }
        if ($request->email) {
            $studentData->where('student.email', 'LIKE', "%$request->email%");
        }
        if ($request->subagent_id) {
            $studentData->where('student.added_by', '=', $request->subagent_id);  // Exact match for subagent_id
        }
        if ($request->agent_id) {
            $studentData->where('student.added_by', '=', $request->agent_id);  // Exact match for agent_id
        }


        if ($user->hasRole('visa')) {
            // $studentData = Student::query();
            $studentData = $studentData
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
                ->paginate(15);
        } elseif ($user->hasRole('Application Punching')) {
            // $studentData = Student::query();
            $studentData = $studentData
                ->join('users', 'users.id', '=', 'student.added_by')
                ->join('driver_data', 'driver_data.student_user_id', '=', 'student.user_id')
                ->join('payments', 'payments.customer_email', '=', 'student.email')
                ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
                ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
              
                ->where('student.status_threesixty', 1)
                ->where('student.profile_complete', 1)
               
                ->where('tbl_three_sixtee.application_punching' , 1)
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
                    DB::raw('MAX(tbl_three_sixtee.application_punching) as application_punching')
                 

                )
                ->groupBy(
                    'student.email',
                    'student.user_id',
                    'student.first_name',
                    'student.last_name',
                    'student.status_threesixty',
                    'student.profile_complete'
                )
                ->paginate(15);

                // dd($studentData);
        }

        else {
            // $studentData = Student::query();
            $studentData = $studentData
                ->join('users', 'users.id', '=', 'student.added_by')
                ->join('driver_data', 'driver_data.student_user_id', '=', 'student.user_id')
                ->join('payments', 'payments.customer_email', '=', 'student.email')
                ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
                ->where('student.status_threesixty', 1)
                ->where('student.profile_complete', 1)
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
                    DB::raw('MAX(payments.payment_status) as payment_status')
                )
                ->groupBy(
                    'student.email',
                    'student.user_id',
                    'student.first_name',
                    'student.last_name',
                    'student.status_threesixty',
                    'student.profile_complete'
                )
                ->paginate(15);
        }

        $master_service = MasterService::select('name', 'id')->get();
        return view('admin.leads.oel-360', compact('studentData', 'sub_agents', 'master_service', 'agents'));
    }


    public function lead_details(Request $request)
    {

        $leadDetails = StudentByAgent::with('caste_data',  'country', 'state')->where('student_user_id', $request->lead_id)->first();

        $leadDetails = Student::where('user_id', $request->lead_id)->first();


        return response()->json($leadDetails);
    }

    public function aply_360($id = null)
    {

        $user = Auth::user();
        if ($user->hasRole('student')) {
            $studentDetails = Student::where('user_id', $user->id)->first();
        } else {

            $studentDetails = Student::where('user_id', $id)->first();
        }
        if (!$studentDetails) {

            return view('errors.404');
        }

        $leadDetails = StudentByAgent::with('caste_data',  'country', 'state')->orwhere('student_user_id', $id)->first();


        if (!$leadDetails || !$studentDetails) {
            return view('errors.404');
        }
        $university = University::where('is_approved', 1)->get();

        $course = DB::table('program')->where('is_approved', 1)->first();

        $threesixtee = DB::table('tbl_three_sixtee')->Where('user_id', $id)->first();


        $student_course_exit = PaymentsLink::where('payments_link.user_id', $studentDetails->user_id)->join('payments', 'payments.fallowp_unique_id', '=', 'payments_link.fallowp_unique_id')->where('payments.payment_status', 'success')->pluck('program_id')->toArray();
        $student_course_exit = $student_course_exit ?? [];
        $student_university = Program::whereIn('id', $student_course_exit)->where('is_approved', 1)->pluck('school_id')->toArray();

        $uniqueId = PaymentsLink::where('user_id', $studentDetails->user_id)
            ->whereNotNull('fallowp_unique_id')
            ->pluck('fallowp_unique_id')
            ->toArray();
        if ($uniqueId) {
            $about_payment = Payment::with('PaymentLink:id,user_id,fallowp_unique_id,program_id,master_service')
                ->whereIn('fallowp_unique_id', $uniqueId)
                ->where('payment_status', 'success')
                ->get();
            $programIds = [];
            foreach ($about_payment as $payment) {
                $programIds[] = $payment->PaymentLink->program_id;
            }
            $selected_university = Program::whereIn('id', $programIds)->where('is_approved', 1)->pluck('school_id')->toArray();
        } else {
            $programIds = [];
            $selected_university = [];
        }
        $visa_document = VisaDocument::get();
        $visa_sub_document_three = VisaSubDocument::where('id', $threesixtee->visa_sub_document_type ?? null)->first();
        if ($threesixtee) {
            $agent = DB::table('agents')->get();
            $university_id = explode(',', $threesixtee->college);
            $three_course_id = explode(',', $threesixtee->courses);
            $student_course_id = explode(',', $studentDetails->pref_subjects);
            $course_id = array_unique(array_merge($programIds ?? null));
            $university_in_three_sixtee = University::wherein('id', array_merge($selected_university ?? null))->where('is_approved', 1)->get();


            $course_in_three_sixtee = DB::table('program')->wherein('id', $course_id)->get();


            $table_three_sixtee_image = DB::table('tbl_three_sixtee_image')->where('image_type', 'offer')->where('sba_id', $id)->get();
        } else {
            $agent = DB::table('agents')->get();
            $university_id = null;
            $course_id = null;
            $university_in_three_sixtee = University::wherein('id', $selected_university ?? [])->where('is_approved', 1)->get() ?? null;
            $course_in_three_sixtee = DB::table('program')->wherein('id', $student_course_exit ?? [])->get() ?? null;
            $table_three_sixtee_image = null;
        }

        $paymentStatuses = MasterService::pluck('id', 'name');

        $paymentStatusDone = [];

      
        foreach ($paymentStatuses as $masterService => $paymentStatus) {
            // Get the student's email based on the user_id
            $student_email = Student::where('user_id', $studentDetails->user_id)->pluck('email')->first();

            // Check if there are payments linked to this student and the current master service
            $checkPayments = PaymentsLink::where('email', $student_email)
                ->where('master_service', $paymentStatus)
                ->get(); // Get all payments for this master service

            if ($checkPayments->isNotEmpty()) {
                $paymentStatusDone[$masterService] = 'Fail'; // Default status is 'Fail'

                // Iterate through all the payments for the current master service
                foreach ($checkPayments as $checkPayment) {
                    // Retrieve the latest payment record associated with the 'fallowp_unique_id' from the checkPayment
                    $paymentDone = Payment::where('customer_email', $student_email)
                        ->where('fallowp_unique_id', $checkPayment->fallowp_unique_id) // Use the 'fallowp_unique_id' from checkPayment
                        ->select('payment_status')
                        ->latest()  // Get the most recent payment
                        ->first();  // Get the first (most recent) result

                    // If any payment status is 'success', set the overall status to 'Done'
                    if ($paymentDone && $paymentDone->payment_status == 'success') {
                        $paymentStatusDone[$masterService] = 'Done';
                        break; // Exit the loop once we find a successful payment
                    }
                }
            } else {
                // If no matching payment is found, set the status to 'Fail'
                $paymentStatusDone[$masterService] = 'Fail';
            }
        }


        // dd($paymentStatusDone);
        return view('admin.leads.apply_oel_360', compact('visa_document', 'visa_sub_document_three', 'leadDetails', 'studentDetails', 'agent', 'table_three_sixtee_image', 'university', 'paymentStatusDone', 'course', 'threesixtee', 'university_in_three_sixtee', 'course_in_three_sixtee'));
    }


    public function store_lead_360(Request $request)
    {

        $id = Student::where('user_id', $request->sba_id)->value('id');
        $user_id = $request->sba_id;
        $response = null;
        if ($request->tab1) {
            $validator = Validator::make($request->all(), [
                'collegeValues' => 'required',
                'sba_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }

            $college = implode(',', $request->collegeValues);
            $univerty = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            if ($univerty == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'college' => $college,
                    'added_by' => Auth::user()->id,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'college' => $college,
                        'added_by' => Auth::user()->id,
                    ]);
            }
            $university = University::whereIn('id', $request->collegeValues)->where('is_approved', 1)->select('id', 'university_name')->get();
            $data = [
                'success' => true,
                'status' => true,
                'university' => $university,
            ];
            return response()->json($data);
        } elseif ($request->tab2) {
            $validator = Validator::make($request->all(), [
                'courseValues' => 'required',
                'sba_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $course = implode(',', $request->courseValues);
            $table_three_sixtee = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            if ($table_three_sixtee == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'courses' => $course,
                    'selected_program' => $course
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'courses' => $course,
                    ]);
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'selected_program' => $course
                    ]);
            }
            $program = Program::whereIn('id', explode(',', $table_three_sixtee->courses))->where('is_approved', 1)->select('id', 'name')->get();
            $response = true;
            $data = [
                'success' => true,
                'status' => $response,
                'program' => $program,
                'table_three_sixtee' => $table_three_sixtee
            ];
            return response()->json($data);
        } elseif ($request->tab3) {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'application' => json_encode($request->all()),
                    'remarks' => json_encode($request->all()),
                    'selected_program' => implode(',', $request->program_ids)
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'application' => json_encode($request->all()),
                        'remarks' =>  json_encode($request->all()),
                        'selected_program' => implode(',', $request->program_ids)
                    ]);
            }


            $student = StudentByAgent::where('student_user_id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();

            $collegeValues = explode(',', $threesixetee->college);

            $courseValues = explode(',', $threesixetee->courses);

            $universities = University::whereIn('id', $collegeValues)->pluck('university_name')->implode(', ');

            $course_in_three_sixtee = DB::table('course_tags')->wherein('id', $courseValues)->pluck('tag_name')->implode(', ');

            $application = json_decode($threesixetee->application);

            foreach ($application->program_ids as $key => $value) {
                // Get program details for each program id
                $program = Program::where('id', $value)->first();

                // Get application status and remarks for the specific program
                $app_status = $application->{$program->id . '_application_status'};
                $app_remarks = $application->{'remarks_' . $program->id};

                // Build the course name, status, and remarks data
                $programsData[] = [
                    'name' => $program->name,
                    'status' => $app_status,
                    'remarks' => $app_remarks
                ];
            }

            // Prepare the data to send in the email
            $data = [
                'university' => $universities,
                'student' => $student->name,
                'courses' => $programsData, // Array of courses with status and remarks
            ];
            // dd($data);
            // Check if there's data to send
            if ($data) {

                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }

            // Handle the response based on application status
            if ($request->application_status == 'rejected') {
                $response = 'Rejected';
            } else {
                $response = true;
            }

            $acceptedProgramIds = [];
            $programIds = $request->input('program_ids', []);
            foreach ($programIds as $programId) {
                $applicationStatus = $request->input("{$programId}_application_status");

                if ($applicationStatus === "accepted") {
                    $acceptedProgramIds[] = $programId;
                }
            }
            $program = Program::whereIn('id', $acceptedProgramIds)->where('is_approved', 1)->select('id', 'name')->get();
            $data = [
                'success' => true,
                'status' => $response,
                'program' => $program
            ];
            return response()->json($data);
        } elseif ($request->tab == 'tab4') {


            $status = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' =>  $id,
                    'user_id' => $user_id,
                    'joining_date' => $request->joining_date ?? null,
                    'offer_amount' => $request->offer_amount ?? null,
                    'cource_details' => $request->course_details ?? null,
                    'course_details_status' => $request->course_details_status ?? null,
                    'university_details_status' => $request->university_details_status ?? null,

                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id,)
                    ->update([
                        'sba_id' => $id ?? null,
                        'user_id' =>  $user_id ?? null,
                        'joining_date' => $request->joining_date ?? null,
                        'offer_amount' => $request->offer_amount  ?? null,
                        'cource_details' => $request->course_details  ?? null,

                    ]);
            }

            $status = DB::table('tbl_three_sixtee_course_status')->where('sba_id', $id)->where('course_id', $request->course_details_status)->first();
            // dd($request->all());
            if ($status == NULL && $request->course_details_status && $request->university_details_status && $request->offer_amount) {
                DB::table('tbl_three_sixtee_course_status')->insert([
                    'sba_id' =>  $id,
                    'user_id' => $user_id,

                    'course_remarks' => $request->offer_amount ?? null,
                    'course_id' => $request->course_details_status ?? null,
                    'university_id' => $request->university_details_status ?? null,

                ]);
            } else {

                $test = DB::table('tbl_three_sixtee_course_status')
                    ->where('sba_id', $id)
                    ->where('user_id', $user_id)
                    ->where('course_id', $request->course_details_status)
                    ->first();

                if (!is_null($id) && !is_null($user_id) && !is_null($request->course_details_status) && !is_null($request->university_details_status) && !is_null($request->offer_amount)) {
                    if ($test) {
                        DB::table('tbl_three_sixtee_course_status')
                            ->where('sba_id', $id)
                            ->where('user_id', $user_id)
                            ->where('course_id', $request->course_details_status)
                            ->update([
                                'sba_id' => $id,
                                'user_id' => $user_id,
                                'course_remarks' => $request->offer_amount,
                                'course_id' => $request->course_details_status,
                                'university_id' => $request->university_details_status,
                            ]);
                    }
                }
            }



            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $uploadedFile) {
                    // Get the original file name and extension
                    $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                    $fileExtension = $uploadedFile->getClientOriginalExtension();

                    // Define the path where the file will be stored
                    $filePath = 'imagesapi/' . $fileName;

                    // Validate the file type (images and PDFs only)
                    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])) {
                        // Move the uploaded file to the desired directory
                        $uploadedFile->move(public_path('imagesapi/'), $fileName);

                        // Check if the record with the same program_id and offer already exists
                        $existingRecord = DB::table('tbl_three_sixtee_image')
                            ->where('sba_id', $id)
                            ->where('user_id', $user_id)
                            ->where('selected_course', $request->course_details ?? null)
                            ->where('image_type', 'offer') // Check for 'offer' image type
                            ->first();

                        // If a record exists, update it
                        if ($existingRecord) {
                            DB::table('tbl_three_sixtee_image')
                                ->where('id', $existingRecord->id)  // Use the unique record id
                                ->update([
                                    'image' => $filePath,
                                    'selected_course' => $request->course_details ?? null,  // Optional course details
                                ]);
                        } else {
                            // If no record exists, insert a new one
                            DB::table('tbl_three_sixtee_image')->insert([
                                'sba_id' => $id,
                                'user_id' => $user_id,
                                'image' => $filePath,
                                'image_type' => 'offer',
                                'selected_course' => $request->course_details ?? null,  // Optional course details
                            ]);
                        }
                    } else {
                        // Optionally, you can return an error message if the file type is invalid
                        return response()->json(['error' => 'Invalid file type. Only images and PDFs are allowed.'], 400);
                    }
                }
            }
            $student = StudentByAgent::where('student_user_id', $request->sba_id)->select('email', 'name')->first();

            $table_three_sixtee_image = DB::table('tbl_three_sixtee_image')
                ->join('program', 'tbl_three_sixtee_image.selected_course', '=', 'program.id')
                ->select('tbl_three_sixtee_image.*', 'program.name as program_name', 'program.id as program_id', 'tbl_three_sixtee_image.image')
                ->where('sba_id', $id)->get();

            $data = [
                'success' => true,
                'status' => true,
                'student_name' => $student->name,
                'table_three_sixtee_image' => $table_three_sixtee_image
            ];



            if ($data) {

                // Send email with the program name and other data               
                Mail::to($student->email)->send(new ApplyOel360Offer($data));
            }


            return response()->json($data);
        } elseif ($request->tab5 == 'tab5') {
            $three_sixtee = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            if ($three_sixtee == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'visa_document' => $request->visa_document ?? null,
                    'visa_apply_date' => $request->visa_apply_date ?? null,
                    'visa_agent' => $request->visa_agent ?? null,
                    'visa_manual' => $request->visa_manual ?? null,
                    'portal_url' => $request->portal_url ?? null,
                    'portal_email' => $request->portal_email ?? null,
                    'portal_userid' => $request->portal_userid ?? null,
                    'portal_password' => $request->portal_password ?? null,
                    'portal_question' => $request->portal_question ?? null,
                    'portal_answer' => $request->portal_answer ?? null,
                    'visa_document_type' => $request->visa_document_type ?? null,
                    'visa_sub_document_type' => $request->visa_sub_document_type ?? null,
                    'visa_application' => $request->visa_application ?? null
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'visa_document' => $request->visa_document ?? null,
                        'visa_apply_date' => $request->visa_apply_date ?? null,
                        'visa_agent' => $request->visa_agent ?? null,
                        'visa_manual' => $request->visa_manual ?? null,
                        'portal_url' => $request->portal_url ?? null,
                        'portal_email' => $request->portal_email ?? null,
                        'portal_userid' => $request->portal_userid ?? null,
                        'portal_password' => $request->portal_password ?? null,
                        'portal_question' => $request->portal_question ?? null,
                        'portal_answer' => $request->portal_answer ?? null,
                        'visa_document_type' => $request->visa_document_type ?? null,
                        'visa_sub_document_type' => $request->visa_sub_document_type ?? null,
                        'visa_application' => $request->visa_application ?? null
                    ]);
            }


            if ($request->hasFile('lead_document')) {

                // Get the uploaded file
                $uploadedFile = $request->file('lead_document');

                // Generate a unique name for the file
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

                // Determine the file's extension
                $fileExtension = $uploadedFile->getClientOriginalExtension();

                // Define the directory for saving the file
                $filePath = 'imagesapi/' . $fileName;

                // Validate that the file is either an image or a PDF
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])) {
                    // Move the uploaded file to the correct folder
                    $uploadedFile->move(public_path('imagesapi/'), $fileName);

                    // Insert the record into the database
                    DB::table('tbl_three_sixtee_image')->insert([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'image' => $filePath, // Save the file path to the database
                        'visa_document_type' => $request->visa_document_type,
                        'visa_sub_document_type' => $request->visa_sub_document_type,
                        // 'image_type' => $fileExtension == 'pdf' ? 'visa_application_pdf' : 'visa_application_image', // Differentiating between image and PDF
                        'image_type' => 'visa_application_document',

                    ]);
                }

                // else {
                //     // Optionally, return an error response if the file type is not allowed
                //     return response()->json(['error' => 'Invalid file type. Only images and PDFs are allowed.'], 400);
                // }
            }

            $visa_document = DB::table('tbl_three_sixtee_image')
                ->select('tbl_three_sixtee_image.id', 'tbl_three_sixtee_image.user_id', 'tbl_three_sixtee_image.image_type', 'tbl_three_sixtee_image.image', 'visa_documents.name AS visa_document_name', 'visa_sub_documents.name AS visa_sub_document_name')
                ->join('visa_documents', 'tbl_three_sixtee_image.visa_document_type', '=', 'visa_documents.id')
                ->join('visa_sub_documents', 'tbl_three_sixtee_image.visa_sub_document_type', '=', 'visa_sub_documents.id')
                ->where('tbl_three_sixtee_image.user_id', $user_id)
                ->where('tbl_three_sixtee_image.image_type', 'visa_application_document')->get();
            // dd($visa_document);

            $data = [
                'success' => true,
                'status' => true,
                'visa_document' => $visa_document
            ];
            return response()->json($data);
        } elseif ($request->tab == 'tab6') {
            $data = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($data == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'visa_no' => $request->visa_no ?? null,
                    'visa_exp_date' => $request->visa_exp_date ?? null,
                    'visa_remarks' => $request->visa_remarks ?? null,
                    'visa_application' => $request->visa_application ?? null
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'visa_no' => $request->visa_no ?? null,
                        'visa_exp_date' => $request->visa_exp_date ?? null,
                        'visa_remarks' => $request->visa_remarks ?? null,
                        'visa_application' => $request->visa_application ?? null
                    ]);
            }
            $student = StudentByAgent::where('student_user_id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            $data = [
                'visa_no' => $threesixetee->visa_no,
                'visa_exp_date' => $threesixetee->visa_exp_date,
                'remarks' => $threesixetee->remarks,
                'student' => $student->name,
                'joining_date' => $threesixetee->joining_date,
                'fee_currency' => $threesixetee->fee_currency,

                'fee_amount' => $threesixetee->fee_amount,
                'cource_details' => $threesixetee->cource_details,
                'student' => $student->name,
                'visa_document' => $threesixetee->visa_document ?? null,
                'visa_apply_date' => $threesixetee->visa_apply_date ?? null,
                'visa_agent' => $agent ?? null,
                'visa_manual' => $threesixetee->visa_manual ?? null,
                'portal_url' => $threesixetee->portal_url ?? null,
                'portal_email' => $threesixetee->portal_email ?? null,
                'portal_userid' => $threesixetee->portal_userid ?? null,
                'portal_password' => $threesixetee->portal_password ?? null,
                'portal_question' => $threesixetee->portal_question ?? null,
                'portal_answer' => $threesixetee->portal_answer ?? null,
                'visa_document_type' => $threesixetee->visa_document_type ?? null,
                'visa_sub_document_type' => $threesixetee->visa_sub_document_type ?? null,
                'visa_application' => $threesixetee->visa_application ?? null,
                'visa_no' => $threesixetee->visa_no,
                'visa_exp_date' => $threesixetee->visa_exp_date,
                'visa_remarks' => $threesixetee->visa_remarks,
                'student' => $student->name
            ];
            if ($data) {
                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }
            $response = true;
        } elseif ($request->tab == 'tab7') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'fee_payment_mode' => $request->fee_payment_mode ?? null,
                    'fee_currency' => $request->fee_currency ?? null,
                    'fee_amount' => $request->fee_amount ?? null,
                    'fee_payment_by' => $request->fee_payment_by ?? null,
                    'fee_agent' => $request->fee_agent ?? null,
                    'fee_remarks' => $request->fee_remarks ?? null,
                    'fees_details' => $request->fees_details ?? null,
                    'application_punching' => $request->application_punching ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'fee_payment_mode' => $request->fee_payment_mode ?? null,
                        'fee_currency' => $request->fee_currency ?? null,
                        'fee_amount' => $request->fee_amount ?? null,
                        'fee_payment_by' => $request->fee_payment_by ?? null,
                        'fee_agent' => $request->fee_agent ?? null,
                        'fee_remarks' => $request->fee_remarks ?? null,
                        'fees_details' => $request->fees_details ?? null,
                        'application_punching' => $request->application_punching ?? null,
                    ]);
            }
            $response = true;
            $application_punching = true;
            $data = [
                'success' => true,
                'status' => $response,
                'application_punching' => $application_punching
            ];
            return response()->json($data);
        } elseif ($request->tab == 'tab8') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'flight_name' => $request->flight_name ?? null,
                    'flight_no' => $request->flight_no ?? null,
                    'flight_dep_date' => $request->flight_dep_date ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'flight_name' => $request->flight_name ?? null,
                        'flight_no' => $request->flight_no ?? null,
                        'flight_dep_date' => $request->flight_dep_date ?? null,
                    ]);
            }
            $response = true;;
        } elseif ($request->tab == 'tab9') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'agent_name' => $request->agent_name ?? null,
                    'hand_holding' => $request->hand_holding ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'agent_name' => $request->agent_name ?? null,
                        'hand_holding' => $request->hand_holding ?? null,
                    ]);
            }

            $response = true;;
        } elseif ($request->tab == 'tab10') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $user_id,
                    'hostel' => $request->hostel ?? null,
                    'personal' => $request->personal ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                        'sba_id' => $id,
                        'user_id' => $user_id,
                        'hostel' => $request->hostel ?? null,
                        'personal' => $request->personal ?? null,
                    ]);
            }
            $student = StudentByAgent::where('student_user_id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $id)->first();
            $data = [
                'hostel' => $request->hostel,
                'personal' => $request->personal,
                'agent_name' => $threesixetee->agent_name,
                'hand_holding' => $threesixetee->hand_holding,
                'student' => $student->name,
                'fee_payment_mode' => $threesixetee->fee_payment_mode,
                'fee_amount' => $threesixetee->fee_amount,
                'fee_payment_by' => $threesixetee->fee_payment_by,
                'fee_agent' => $threesixetee->fee_agent,
                'fee_remarks' => $threesixetee->fee_remarks,
                'student' => $student->name,
                'flight_name' => $threesixetee->flight_name,
                'flight_no' => $threesixetee->flight_no,
                'flight_dep_date' => $threesixetee->flight_dep_date,
            ];
            if ($data) {
                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }
            $response = true;
            $data = [
                'success' => true,
                'tab10' => 'tab10',
                'status' => $response,
            ];
            return response()->json($data);
        }
        $data = [
            'success' => true,
            'status' => $response,
        ];
        return response()->json($data);
    }

    public function get_lead_360_images(Request $request)
    {
        // dd($request->sba_id);
        $table_three_sixtee_image = DB::table('tbl_three_sixtee_image')
            ->join('program', 'tbl_three_sixtee_image.selected_course', '=', 'program.id')
            ->select('tbl_three_sixtee_image.*', 'program.name as program_name', 'program.id as program_id', 'tbl_three_sixtee_image.image')
            ->where('tbl_three_sixtee_image.user_id', $request->sba_id)->get();
        $data = [
            'success' => true,
            'status' => true,
            'table_three_sixtee_image' => $table_three_sixtee_image
        ];
        return response()->json($data);
    }

    public function delete_lead_360_image(Request $request)
    {
        $id = $request->id;
        DB::table('tbl_three_sixtee_image')->where('id', $id)->delete();
        $data = [
            'success' => true,
            'status' => true,
        ];
        return response()->json($data);
    }


    public function bulk_upload()
    {
        return view('admin.leads.leads_Excel_sheet_import');
    }

    public function excel_sheet_leads(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $file = $request->file('file');
        Excel::import(new LeadsExcelSheetImport, $file);
        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }


    public function fetch_leads(Request $request)
    {
        $user = Auth::user();
        $user_type = $user->admin_type;
        $user_id = $user->id;
        $leads = StudentByAgent::query();
        if ($request->key == 'total-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads;
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id);
            }
            $leads_name = 'Total Leads';
        }
        if ($request->key == 'total-cold-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 4);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 4);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 4);
            }
            $leads_name = 'Total Cold Leads';
        }
        if ($request->key == 'total-hot-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 3);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 3);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 3);
            }
            $leads_name = 'Total Hot Leads';
        }
        if ($request->key == 'total-future-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 6);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 6);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 6);
            }
            $leads_name = 'Total Future Leads';
        }
        if ($request->key == 'total-new-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 1);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 1);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 1);
            }
            $leads_name = 'Total New Leads';
        }
        if ($request->key == 'total-not-useful-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 5);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 5);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 5);
            }
            $leads_name = 'Total Not Useful Leads';
        }
        if ($request->key == 'total-warms-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 2);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 2);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 2);
            }
            $leads_name = 'Total Warms Lead';
        }
        if ($request->key == 'total-closed-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 7);
            } else if ($user_type == 'Franchise') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 7);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 7);
            }
            $leads_name = 'Total Closed Lead';
        }
        if ($request->key == 'total-allocated-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->whereNotNull("assigned_to");
            } else if ($user_type == 'Franchise' || $user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->whereNotNull('assigned_to');
            }
            $leads_name = 'Total Allocated Leads';
        }
        if ($request->key == 'total-non-allocated-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->whereNull("assigned_to");
            } else if ($user_type == 'Franchise' || $user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->whereNull('assigned_to');
            }
            $leads_name = 'Total Non-Allocated Leads';
        }
        $leads_data = $leads->orwhere('user_id', $user_id)->paginate(12);
        $leads_data = [
            'leads' => $leads_data,
            'leads_name' => $leads_name,
        ];
        return view('admin.leads.leads-data', compact('leads_data'));
    }


    public function relocated_frenchise(Request $request)
    {
        $agent = User::query();
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $agent->whereIn('admin_type', ['Verification','Sales','Digital Marketing'])
            ->where('is_active', 1)
            ->where('is_approve', 1);

        } 
        elseif ($user->hasRole('Franchise')) {
            $agent->where('added_by', $user->id)->where('admin_type', 'sub_agent')->where('is_active', 1)->where('status', 1);
        }
        $agentData = $agent->get();
        return response()->json($agentData);
    }

    public function allocate_franchise(Request $request)
    {
        $users = Auth::user();
        if (!empty($request->leadIds)) {
          
            $user = User::where('id', $request->agentId)->select('id', 'added_by')->first();
           
            if ($users->hasRole('Administrator')) {
                StudentByAgent::whereIn('id', $request->leadIds)->update([
                    'added_by_agent_id' => $request->agentId,
                    'assigned_to' => $request->agentId,
                ]);
                $franchise_user = User::find($request->agentId);
                $count = count($request->leadIds);
                if ($franchise_user) {
                    $data = [
                        'user_id' => $franchise_user->name,
                        'message' => " . $count . A Lead has been assigned to you",
                    ];
                    // Mail::to($franchise_user->email)->send(new assignLeadsMail($data));
                }

                $data = ['status' => true, 'message' => "Admin  Assigned  to Franchise Successfully ! " . $count . " leads has been assigned to you"];
            } else if ($users->hasRole('Franchise')) {
                StudentByAgent::whereIn('id', $request->leadIds)->update([
                    'assigned_to' => $request->agentId,
                ]);
                $franchise_user = User::find($request->agentId);
                $count = count($request->leadIds);

                if ($franchise_user) {
                    $data = [
                        'user_id' => $franchise_user->name,
                        'message' => "  . $count . A Lead has been assigned to you",
                    ];
                    Mail::to($franchise_user->email)->send(new assignLeadsMail($data));
                }

                $data = ['status' => true, 'message' => "Agent Assigned Successfully ! " . $count . " leads has been assigned to you"];
            } else {
                $data = ['status' => false, 'message' => "Something Went Wrong !"];
            }
            // }
        } else {
            $data = ['status' => false, 'message' => "Please Select leads"];
        }
        return response()->json($data);
    }


    public function create_student_profile(Request $request, $id)
    {
        $student_agent = StudentByAgent::where('id', $id)->first();
        $input['is_active'] = 1;
        $input['name'] = $student_agent->name;
        $input['password'] = Hash::make($student_agent->name);
        $input['admin_type'] = 'student';
        $input['email'] = $student_agent->email;
        $input['phone_number'] = $student_agent->phone_number;
        $input['added_by'] = Auth::user()->id;
        $userInserted = DB::table('users')->insert($input);

        if ($userInserted) {
            $user = User::where('email', $student_agent->email)->first();

            $role = Role::where('name', 'student')->first();
            if (!isset($student_agent->dob) || empty($student_agent->dob)) {
                $dob = null;
            } else {
                $dob = $student_agent->dob;
            }
            $student_data = [
                'user_id' => $user->id,
                'first_name' => $student_agent->name ?? null,
                'middle_name' => $student_agent->middle_name ?? null,
                'last_name' => $student_agent->last_name ?? null,
                'country_id' => $student_agent->country_id ?? null,
                'gender' => $student_agent->gender ?? null,
                'dob' => $dob,
                'province_id' => $student_agent->province_id ?? null,
                'zip' => $student_agent->zip ?? null,
                'email' => $student_agent->email ?? null,
                'phone_number' => $student_agent->phone_number ?? null,
                'country_preference_completed' => $student_agent->preferred_country_id ?? null,
                'pref_subjects' => $student_agent->subject ?? null,
                'added_by' => Auth::user()->id,
                'added_by_agent_id' => Auth::user()->added_by
            ];


            $student_agent->update([
                "student_user_id" => $user->id ?? null,
            ]);

            // dd( $user->id);
            DB::table('student')->insert($student_data);
            if ($role) {
                $user->assignRole([$role->id]);
            }
            try {
                Mail::to($student_agent->email)->send(new StudentRegistraionMail($student_data));
            } catch (\Exception $e) {
                Log::info('Mail not send to ' . $student_agent->email);
            }
            //  Mail::to($student_agent->email)->send(new StudentRegistraionMail($student_data));
        }
        return redirect()->route('leads-filter')->with('success', 'User Profile Created Successfully');
    }

    public function show_lead($id)
    {
        $user = auth()->user();
        
        
        $studentData = StudentByAgent::with([
            'caste_data', 'state', 'assigned_to_user', 'added_by_user',
            'country', 'lead_status_data', 'source', 
            'driver_documents' // add this
        ])
        ->where('id', $id)
        ->first();       
        return view('admin.leads.show_lead', compact('studentData' , 'user'));
    }


    public function university_course(Request $request)
    {
        $program = Program::where('school_id', $request->university_id)->where('is_approved', 1)->get();
        $data = [
            'success' => true,
            'status' => true,
            'program' => $program,
            'college_id' => $request->university_id,
        ];
        return response()->json($data);
    }

    public function fetch_visa_sub_document(Request $request)
    {
        if ($request->ajax()) {
            $visa_sub_documents = VisaSubDocument::where('visa_document_id', $request->visa_document_id)->get();
            return response()->json(['data' => $visa_sub_documents]);
        }
    }

    public function get_visa_document(Request $request)
    {
        if ($request->ajax()) {
            $visa_document = DB::table('tbl_three_sixtee_image')
                ->select('tbl_three_sixtee_image.id', 'tbl_three_sixtee_image.user_id', 'tbl_three_sixtee_image.image_type', 'tbl_three_sixtee_image.image', 'visa_documents.name AS visa_document_name', 'visa_sub_documents.name AS visa_sub_document_name')
                ->join('visa_documents', 'tbl_three_sixtee_image.visa_document_type', '=', 'visa_documents.id')
                ->join('visa_sub_documents', 'tbl_three_sixtee_image.visa_sub_document_type', '=', 'visa_sub_documents.id')
                ->where('tbl_three_sixtee_image.user_id', $request->sba_id)
                ->where('tbl_three_sixtee_image.image_type', 'visa_application_document')->get();

            $data = [
                'success' => true,
                'status' => true,
                'visa_document' => $visa_document
            ];
            return response()->json(['data' => $data]);
        }
    }


    public function delete_visa_document(Request $request)
    {
        if ($request->ajax()) {
            $visa_document = DB::table('tbl_three_sixtee_image')->where('id', $request->id)->delete();
            return response()->json(['success' => true, 'status' => true]);
        }
    }


    public function getCourses(Request $request)
    {

        $threesixtee = DB::table('tbl_three_sixtee')
            ->where('user_id', $request->sba_id)

            ->first();
        $uni_id = explode(',', $threesixtee->college);
        $cou_id = explode(',', $threesixtee->courses);

        // $dd->whereIn('college', (array) $request->university_id);
        $course_in_three_sixtee = DB::table('program')->wherein('id', $cou_id)->where('school_id', $request->university_id)->select('name', 'id')->get();


        return response()->json(['courses' => $course_in_three_sixtee]);
    }


    public function lead_quality_store(Request $request)
    {
       

        $sum = $request->name + $request->phone + $request->father_working +
            $request->mother_working + $request->age + $request->english_efficiency +
            $request->sibling + $request->financial_condition + $request->education + $request->intrested;

        LeadStatusQuality::updateOrCreate(
            ['student_id' => $request->student_id], // Find by student_id
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'father_working' => $request->father_working,
                'mother_working' => $request->mother_working,
                'age' => $request->age,
                'english_efficiency' => $request->english_efficiency,
                'sibling' => $request->sibling,
                'financial_condition' => $request->financial_condition,
                'education' => $request->education,
                'intrested' => $request->intrested,
                'total_status' => $sum // Store sum in total_status column
            ]
        );



        return back()->with('success', 'Lead quality saved successfully.');
    }


    public function countSelections()
    {

        $lowStatuses = ['No', 'Bad', 'Low']; // Define Low Quality
        $mediumStatuses = ['Yes', 'Medium']; // Define Medium Quality
        $highStatuses = ['Good', 'Yes', 'Advanced']; // Define High Quality
        $counts_quality = [
            'Low' => LeadStatusQuality::whereIn('quality', $lowStatuses)->count(),
            'Medium' => LeadStatusQuality::whereIn('quality', $mediumStatuses)->count(),
            'High' => LeadStatusQuality::whereIn('quality', $highStatuses)->count(),
        ];

        $counts = LeadStatusQuality::select('name', 'quality') // Select name and quality
            ->groupBy('name', 'quality') // Group by both name and quality
            ->selectRaw('COUNT(*) as count') // Count rows for each group
            ->get();

        //dd($counts);

        return response()->json($counts, 200, $counts_quality);
    }




    public function uploadDocument(Request $request)
    {

        //   dd($request->all());
    $request->validate([
        'document_type' => 'required|exists:document_types,id',
        'document_upload' => 'required|file|max:2048'
    ]);


    $studentAgent = StudentByAgent::where('id', $request->student_id)->first();
    //dd ($studentAgent);
    if ($request->hasFile('document_upload')) {
        $file = $request->file('document_upload');
        $filename = time() . '_' . $file->getClientOriginalName();
        $uploadPath = 'meradriver/documents/' . $filename;
    
        // Move file to public path
        $file->move(public_path('meradriver/documents/'), $filename);
    
        // Check if document already exists
         $existingDoc = DB::table('driver_documents')
        ->where('driver_id', $studentAgent->id)
        ->where('document_type', $request->document_type)
        ->first();
    
        if ($existingDoc) {
            // Delete old file if it exists
            $oldPath = public_path($existingDoc->document_path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            // Update existing record
            DB::table('driver_documents')
                ->where('id', $existingDoc->id)
                ->update([
                    'document_path' => $uploadPath,
                    'updated_at' => now(),
                ]);

        } else {

            // Insert new document
            DB::table('driver_documents')->insert([
                'driver_id' => $studentAgent->id,
                'document_type' => $request->document_type,
                'document_path' => $uploadPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return response()->json(['success' => true]);
  }

}
