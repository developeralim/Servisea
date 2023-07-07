<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Models\dispute;
use App\Models\refunds;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Stripe\Refund;

class employeeController extends Controller
{
    public function viewDisputeList(){

        try {

            $user= request()->session()->get('user');
            $employee= request()->session()->get('employee');

            if(isset($user) && isset($employee)){

            $dispute = dispute::join('users','users.USER_ID','=','dispute.USER_ID')
            ->get();

            return view('admin.Employee.disputeList',['dispute'=>$dispute]);

            }

            return redirect("index");

          } catch (\Exception $e) {

            return redirect("index");
          }
    }

    public function viewRefundList(){

        try {

            $user= request()->session()->get('user');
            $employee= request()->session()->get('employee');

            if(isset($user) && isset($employee)){

            $refund = refunds::join('order','order.ORDER_ID','=','refunds.ORDER_ID')
            ->get();

            return view('admin.Employee.disputeList',['dispute'=>$dispute]);

            }

            return redirect("index");

          } catch (\Exception $e) {

            return redirect("index");
          }
    }

    public function viewDispute(){

        try {

            $user= request()->session()->get('user');
            $employee= request()->session()->get('employee');

            if(isset($user) && isset($employee)){

                $dispute = dispute::join('employee','employee.EMPLOYEE_ID','=','dispute.EMPLOYEE_ID')
                ->join('users','users.USER_ID','=','employee.USER_ID')
                ->where('DISPUTE_ID',Crypt::decryptString( request()->route('did')))
                ->get();

            $refund = refunds::where('ORDER_ID',$dispute[0]->ORDER_ID)->get();

            return view('admin.Employee.disputeView',['dispute'=>$dispute,'refunds'=>$refund]);

            }

            return redirect("index");

          } catch (\Exception $e) {

            return redirect("index");
          }
    }

    public function issueRefund(){


        $oid = Crypt::decryptString( request()->route('oid'));

            $oid = Order::join('payment','order.PAYMENT_ID','=','payment.PAYMENT_ID')
            ->where('ORDER_ID', Crypt::decryptString( request()->route('oid')))
            ->get();

            if (!refunds::where(['ORDER_ID'=>$oid[0]['ORDER_ID']])->exists() ) {

            $stripe = new \Stripe\StripeClient('sk_test_51NLJEjJylGbEvkNuFMvA5PPqJMRjRhNtoywaYFYsMyWbKspT6ZXleUQTOvoMdLFKc80v5Z8QMuEYXUDfWVgRFNn200V3N2orct');

            $refund = $stripe->refunds->create([
            'payment_intent' => $oid[0]['PAYMENT_INTENT'],
            ]);

            if ($refund->status === "succeeded") {

                Refunds::create([
                    'REFUND_ID' => $refund->id,
                    'ORDER_ID'  => $oid[0]['ORDER_ID'],
                    'REFUND_STATUS' => 'CONFIRMED',
                    'REFUND_AMOUNT' => $oid[0]['PAYMENT_AMOUNT'],
                    'REFUND_DATE'   => now(),
                ]);

            } else {
                Refunds::create([
                    'REFUND_ID' => $refund->id,
                    'ORDER_ID'  => $oid[0]['ORDER_ID'],
                    'REFUND_STATUS' => 'CANCELLED',
                    'REFUND_AMOUNT' => $oid[0]['PAYMENT_AMOUNT'],
                    'REFUND_DATE'   => now(),
                    ]);
            }

            return redirect()->route('viewSingleDispute',request()->route('did'));

            }

            return redirect()->route('viewSingleDispute',request()->route('did'));

        try {

          } catch (\Exception $e) {

            return redirect("index");
          }
    }

     public function closeDispute(){

        try {

            $user= request()->session()->get('user');
            $employee= request()->session()->get('employee');

            if(isset($user) && isset($employee)){

                $did = Crypt::decryptString( request()->route('did'));
                $dispute = dispute::join('users','users.USER_ID','=','dispute.USER_ID')->where('DISPUTE_ID',Crypt::decryptString( request()->route('did')))->get();

                $disputeInput = request()->validate([
                    'Solution_Description'      => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
                ]);


                if(AppHelper::instance()->ai($disputeInput['Solution_Description'])=='foul'){

                return view('admin.Employee.disputeView',['dispute'=>$dispute,'error'=>'Our system detected sensitive word in your description']);

                }else{

                    dispute::where('DISPUTE_ID',$did)->update(['DISPUTE_STATUS' => 'SOLVED','DISPUTE_SOLUTION'=> $disputeInput['Solution_Description']]);

                }

                return view('admin.Employee.disputeList',['dispute'=>$dispute]);

            }else{

            return redirect('login_user');
            }

            } catch (\Exception $e) {

            return redirect("index");
          }
    }


}
