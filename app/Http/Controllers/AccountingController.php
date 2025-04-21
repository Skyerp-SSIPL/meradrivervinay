<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsLink;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentByAgent;
use Carbon\Carbon;

class AccountingController extends Controller
{

    public function getFeesByMasterService($master_service)
    {

        $user = Auth::user();
        $query = PaymentsLink::with('payments')
            ->whereHas('payments', function ($query) {
                $query->where('payment_status', 'success');
            })
            ->wherein('master_service', [$master_service]);
        if ($user->hasRole('Administrator')) {
            return $query->sum('amount');
        }

        $userId = $user->id;
        if ($user->hasRole('agent')) {
            $usersId = User::where('added_by', $userId)
                ->whereNotIn('admin_type', ['student'])
                ->pluck('id')
                ->toArray();
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }
            return $query->whereIn('user_id', $usersId)->sum('amount');
        }

        if ($user->hasRole('sub_agent')) {
            $usersId = User::where('added_by', $userId)
                // ->whereNotIn('admin_stype', ['student'])
                ->pluck('email')
                ->toArray();
                
               
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }

          
            return $query->whereIn('email', $usersId)->sum('amount');
        }


        return $query->where('user_id', $userId)->sum('amount');
    }

    public function getFeesByMasterServiceByMonth($master_service, $month = 1)
    {
        $user = Auth::user();
        $query = PaymentsLink::with('payments')
            ->whereHas('payments', function ($query) use ($month) {
                $query->where('payment_status', 'success')
                ;
                if ($month) {
                    $query->whereMonth('created_at', $month);
                }
            })
            ->wherein('master_service', [$master_service]);
        if ($user->hasRole('Administrator')) {
            return $query->sum('amount');
        }
        $userId = $user->id;
        if ($user->hasRole('agent')) {
            $usersId = User::where('added_by', $userId)
                ->whereNotIn('admin_type', ['student'])
                ->pluck('id')
                ->toArray();
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }
            return $query->whereIn('user_id', $usersId)->sum('amount');
        }

        if ($user->hasRole('sub_agent')) {
            $usersId = User::where('added_by', $userId)
                // ->whereNotIn('admin_type', ['student'])
                ->pluck('email')
                ->toArray();
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }
            return $query->whereIn('email', $usersId)->sum('amount');
        }
        return $query->where('user_id', $userId)->sum('amount');
    }
    public function index()
    {
        $query = PaymentsLink::whereHas('payments', function ($query) {
            $query->where('payment_status', 'success');
        })
            // ->whereIn('master_service', [$master_service])
            ->join('payments', 'payments.fallowp_unique_id', '=', 'payments_link.fallowp_unique_id') // Example join
            ->sum('payments_link.panding'); // Sum the 'pending_amount' in the 'payments' table

        
        $fees = [
            'oel_registration_fees' => $this->getFeesByMasterService(1),
            'university_application_fees' => $this->getFeesByMasterService(2),
            'course_tution_fees' => $this->getFeesByMasterService(3),
            'visa_processing_fees' => $this->getFeesByMasterService(4),
            'embassy_fees' => $this->getFeesByMasterService(5),
            'accommodation_fees' => $this->getFeesByMasterService(6),
            'ticket_fees' => $this->getFeesByMasterService(7),
            'english_test' => $this->getFeesByMasterService(8),
            'total_amount' => $this->getFeesByMasterService(1) + $this->getFeesByMasterService(2) + $this->getFeesByMasterService(3) + $this->getFeesByMasterService(4) + $this->getFeesByMasterService(5) + $this->getFeesByMasterService(6) + $this->getFeesByMasterService(7) + $this->getFeesByMasterService(8),
            'panding_amount' => $query
        ];
       
        
        $feesMonthly = [];
        for ($i = 1; $i <= 12; $i++) {
            $feesMonthly[$i] = [
                'oel_registration_fees' => $this->getFeesByMasterServiceByMonth(1, $i),
                'university_application_fees' => $this->getFeesByMasterServiceByMonth(2, $i),
                'course_tution_fees' => $this->getFeesByMasterServiceByMonth(3, $i),
                'visa_processing_fees' => $this->getFeesByMasterServiceByMonth(4, $i),
                'embassy_fees' => $this->getFeesByMasterServiceByMonth(5, $i),
                'accommodation_fees' => $this->getFeesByMasterServiceByMonth(6, $i),
                'ticket_fees' => $this->getFeesByMasterServiceByMonth(7, $i),
                'english_test' => $this->getFeesByMasterServiceByMonth(8, $i),
            ];
        }


        return view('admin.accounting.index', compact('fees', 'feesMonthly'));
    }
    public function student_review(Request $request)
    {
        //$query = Student::query();
        // $queryn = Payment::join('student', 'student.email', '=', 'payments.customer_email')
        //     ->select('student.*')
        //     ->distinct('student.email')
        //     ->paginate(15);

        $queryn = Payment::query();
        $user = Auth::user();

        if ($user->hasRole('agent')) {
            $queryn->where(function ($query) use ($user) {
                $query->Where('student.added_by_agent_id', $user->added_by)
                    ->orWhere('student.added_by', $user->id);
                // where('student.assigned_to', $user->id)
                // ->orWhere('student.user_id', $user->id)
                // ->Where('student.added_by_agent_id', $user->id);

            });
        }

        if ($user->hasRole('sub_agent')) {
            $queryn->where(function ($query) use ($user) {
                $query->Where('student.added_by', $user->id)
                    // where('student.assigned_to', $user->id)
                    ->orWhere('student.user_id', $user->id);
            });
        }


        if ($request->has('first_name')) {
            $queryn->where('first_name', 'like', '%' . $request->first_name . '%');
        }
        if ($request->has('email')) {
            $queryn->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->has('phone_number')) {
            $queryn->where('phone_number', 'like', '%' . $request->phone_number . '%');
        }



        $students =  $queryn->join('student', 'student.email', '=', 'payments.customer_email')
            ->select('student.*')
            ->distinct('student.email')
            ->paginate(15);

         //$query->Select('first_name','email','phone_number','gender','id','user_id','added_by')->paginate(12);
       
        return view('admin.accounting.student-reviews', compact('students'));
    }

    public function student_view($id)
    {
        // $student=Student::with('country')->where('user_id',$id)->first();
        $student = StudentByAgent::where('student_user_id', $id)->first();

        $payments = Payment::with(['PaymentLink' => function ($query) {
            $query->with(['master_services' => function ($query) {

                $query->select('name', 'id', 'amount');
            }]);
        }])->where('payment_status', 'success')->where('customer_email', $student->email)->get();

        // dd( $payments->toQuery()->toSql());
        return view('admin.accounting.student-view', compact('student', 'payments'));
    }

    public function student_invoice($id)
    {

        $student = StudentByAgent::where('student_user_id', $id)->first();

        $payments = Payment::with(['PaymentLink' => function ($query) {
            $query->with(['master_services' => function ($query) {
                $query->select('name', 'id', 'amount', 'created_at', 'updated_at');
            }]);
        }])->where('payment_status', 'success')->where('customer_email', $student->email)->get();

        // dd($payments->PaymentLink);
        return view('admin.invoice', compact('student', 'payments'));
    }


    public function due_amount_student(Request $request)
    {


        // $query = Payment::join('student', 'student.email', '=', 'payments.customer_email')
        // ->join('payments_link', 'payments_link.email', '=', 'payments.customer_email')
        // ->select('student.*','payments_link.*')
        // ->distinct('student.email')
        // ->paginate(15);
        // if ($request->has('first_name')) {
        //     $query->where('first_name', 'like', '%' . $request->first_name . '%');
        // }
        // if ($request->has('email')) {
        //     $query->where('email', 'like', '%' . $request->email . '%');
        // }
        // if ($request->has('phone_number')) {
        //     $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
        // }
        // $students =  $query ->whereDate('payments_link.due_date', '<', Carbon::now())->paginate(12);

        // $oldUniversities = PaymentsLink::join('student', 'student.user_id', '=', 'payments_link.user_id')->select('payments_link.*')->

        // whereDate('payments_link.due_date', '<', Carbon::now())->paginate(12);


        $query = Payment::join('student', 'student.email', '=', 'payments.customer_email')
            ->join('payments_link', 'payments_link.email', '=', 'payments.customer_email')
            ->select('student.*', 'payments_link.*')
            ->distinct('student.email');

        if ($request->has('first_name')) {
            $query->where('student.first_name', 'like', '%' . $request->first_name . '%');
        }
        if ($request->has('email')) {
            $query->where('student.email', 'like', '%' . $request->email . '%');
        }
        if ($request->has('phone_number')) {
            $query->where('student.phone_number', 'like', '%' . $request->phone_number . '%');
        }

        // Apply the 'due_date' filter
        $query->whereDate('payments_link.due_date', '<', Carbon::now());

        // Paginate the results after all filters are applied
        $students = $query->paginate(15);  // You can change the page size if needed


        //  dd($due_student);
        return view('admin.accounting.pandingamount', compact('students'));
    }
}
