<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Freelancer;
use App\Models\Gig;
use App\Models\Job_Application;
use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function viewRegisterPage(Request $request){
        $sessionAdmin= $request->session()->get('adminDetails');
        $session= $request->session()->get('user');
        if(isset($sessionAdmin)==null&&isset($session)==null){
            return view("user.register");
        }else{
            return redirect('login_user');
        }

    }

    public function viewProfile(Request $request)
    {
        $session= $request->session()->get('user');
        if(isset($session)){

            if(Address::where('ADDED_BY_USER_ID',$session['USER_ID'])->exists()){
                $addressDetails = Address::where('ADDED_BY_USER_ID',$session['USER_ID'])->get();
                $addressDetails = json_decode($addressDetails[0]);
                return view('user.profile')->with('addressDetails',$addressDetails);
            }else{
                return view('user.profile');
            }

        }else{
            return redirect('login_user');
        }
    }

    public function orderGig(Request $request)
    {
        $pid = $request->route('pid');
        $session= $request->session()->get('user');

        if(isset($session)&&$session['USER_ROLE']!=2){

            $package = Package::where('PACKAGE_ID',$pid)->get();
            $gig = Gig::where('GIG_ID',$package[0]->GIG_ID)->get();

            $orderDetails = ['PACKAGE_ID' => $pid,
                'USER_ID' => $session['USER_ID'],
                 'FREELANCER_ID'=> $gig[0]->FREELANCER_ID,
                 'ORDER_AMOUNT' => $package[0]->PRICE,
                'ORDER_DATE' => now(),
                'ORDER_DUE'=> date('Y-m-d', strtotime(now().' + '.$package[0]->DELIVERY_DAYS.'days')),
                'ORDER_STATUS'=> 'IN PROGRESS'];

                $request->Session()->put('orderDetails',$orderDetails);

                return view('user.checkout');

        }else{
            return redirect('index');
        }
    }

    public function acceptApplicant(Request $request)
    {
        $ja_id = $request->route('jaid');

        $session= $request->session()->get('user');
        if(isset($session)){

            Job_Application::where('JA_ID',$ja_id)
           ->update(['JA_STATUS' => 'CONFIRMED']);

        }else{
            return redirect('index');
        }
    }


    public function listApplicants(Request $request)
    {

        $jr_id = $request->route('jobid');

        $session= $request->session()->get('user');
        if(isset($session)){
            if(Job_Application::where(['JA_STATUS'=>'PENDING','JR_ID'=>$jr_id])->exists()){

                $Applicants = Freelancer::select('*')
                ->join('JOB_APPLICATION', 'FREELANCER.FREELANCER_ID', '=', 'JOB_APPLICATION.FREELANCER_ID')
                ->join('USERS', 'FREELANCER.USER_ID', '=', 'USERS.USER_ID')
                ->where(['JA_STATUS'=>'PENDING','JOB_APPLICATION.JR_ID'=>$jr_id])
                ->get();

                return view('user.applicantList',['applicants'=>$Applicants]);
            }else{
                return view('index');
            }

        }else{
            return redirect('index');
        }
    }

    public function orderList(Request $request)
    {
        $session= $request->session()->get('user');
        if(isset($session)){


            $session= $request->session()->get('freelancer');

            if(order::where(['FREELANCER_ID'=>$session['FREELANCER_ID']])->exists()){

                $orders = DB::select('SELECT *
                FROM fms.order AS orders
                RIGHT JOIN package
                ON orders.PACKAGE_ID = package.PACKAGE_ID
                RIGHT JOIN gig
                ON gig.GIG_ID = package.GIG_ID
                WHERE orders.FREELANCER_ID ='.$session['FREELANCER_ID'].';');

                   return view('user.orderList',['orders'=>$orders]);
               }else{
                if(order::where(['USER_ID'=>$session['USER_ID']])->exists()){

                    $orders = DB::select('SELECT *
                    FROM fms.order AS orders
                    RIGHT JOIN package
                    ON orders.PACKAGE_ID = package.PACKAGE_ID
                    RIGHT JOIN gig
                    ON gig.GIG_ID = package.GIG_ID
                    WHERE orders.USER_ID ='.$session['USER_ID'].';');

                       return view('user.orderList',['orders'=>$orders]);
                   }else{
                       return view('user.orderList');
                   }
               }




        }else{
            return redirect('index');
        }
    }

    public function orderdetails(Request $request)
    {
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');
         $oid= $request->route('oid');

        if(isset($session)||isset($freelancer)){

            if(
            order::where(['USER_ID'=>$session['USER_ID']])->exists()||
            order::where(['FREELANCER_ID'=>$freelancer['FREELANCER_ID']])->exists()
            ){

             $orders = DB::select('SELECT *
             FROM fms.order AS orders
             RIGHT JOIN package
             ON orders.PACKAGE_ID = package.PACKAGE_ID
             RIGHT JOIN gig
             ON gig.GIG_ID = package.GIG_ID
             RIGHT JOIN freelancer
             ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
             RIGHT JOIN users
             ON users.USER_ID = freelancer.USER_ID
             WHERE orders.ORDER_ID ='.$oid.';');

                return view('user.orderDetails',['orders'=>$orders]);
            }else{
                return view('user.orderList');
            }

        }else{
            return redirect('index');
        }
    }


    public function DeleteProfile(Request $request)
    {
        $session= $request->session()->get('user');
        if(isset($session)){
            if(User::where('USER_EMAIL', $session['USER_EMAIL'])->exists()){

                return view('index');
            }else{
                return view('user.profile');
            }

        }else{
            return redirect('login_user');
        }
    }

    public function RegisterUser(Request $request){
/*
        $userInput = $request->validate([
            'USERNAME'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_-.]+$/|unique:users|unique:admin,ADMIN_USERNAME',
            'USER_EMAIL'      => 'required|email|unique:users|unique:admin,ADMIN_EMAIL',
            'USER_PASSWORD'   => 'required|string|min:6|regex:/^[a-zA-Z0-9_-.]+$/',
            'USER_LNAME'      => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_FNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'USER_IMG'        => 'required|mimes:jpg,bmp,png',
            'USER_DOB'        => 'required|before:'.now()->subYears(18)->toDateString(),
            'USER_GENDER'     => 'required|char|max:7',
            'USER_TEL'        => 'required|string|max:255|regex:/^[0-9]+$/',
            'USER_CITY'       => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_COUNTRY'    => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_DISTRICT'   => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
            'USER_POSTALCODE' => 'required|string|max:255|regex:/^[0-9]+$/'
       ]); */

        #validation
        $userInput = $request->validate([
            'USERNAME'        => 'required|string|max:255|unique:users|unique:admin,ADMIN_USERNAME|regex:/^[a-zA-Z0-9_]+$/',
            'USER_EMAIL'      => 'required|email|unique:users|unique:admin,ADMIN_EMAIL',
            'USER_PASSWORD'   => 'required|min:8|string|regex:/^[a-zA-Z0-9_]+$/',
       ]);

       $messages = array(
        'required' => 'The :attribute field is required.',
    );

       //DB::insert('Insert into users(USERNAME,USER_EMAIL,USER_PASSWORD) values(?,?,?)', [$userInput['USERNAME'],$userInput['USER_EMAIL'],Hash::make($userInput['USER_PASSWORD'])]);

        User::Create(array('USERNAME' => $userInput['USERNAME'],
                           'USER_EMAIL' => $userInput['USER_EMAIL'],
                           'USER_PASSWORD' => Hash::make($userInput['USER_PASSWORD'])));

       $user = User::where('USER_EMAIL', $userInput['USER_EMAIL'])->get();
       $user = json_decode(json_encode($user[0]), true);

       $request->session()->put('user',$user);
       return redirect('index');

    }

    public function UpdateProfile(Request $request){
        $session= $request->session()->get('user');

        /*
                  $userInput = $request->validate([
                    'USERNAME'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_-.]+$/|unique:users|unique:admin,ADMIN_USERNAME',
                    'USER_EMAIL'      => 'required|email|unique:users|unique:admin,ADMIN_EMAIL',
                    'USER_PASSWORD'   => 'required|string|min:6|regex:/^[a-zA-Z0-9_-.]+$/',
                    'USER_LNAME'      => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
                    'USER_FNAME'      => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
                    'USER_IMG'        => 'required|mimes:jpg,bmp,png',
                    'USER_DOB'        => 'required|before:'.now()->subYears(18)->toDateString(),
                    'USER_GENDER'     => 'required|char|max:7',
                    'USER_TEL'        => 'required|string|max:255|regex:/^[0-9]+$/',
                    'USER_CITY'       => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
                    'USER_COUNTRY'    => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
                    'USER_DISTRICT'   => 'required|string|max:255|regex:/^[a-zA-Z-]+$/',
                    'USER_POSTALCODE' => 'required|string|max:255|regex:/^[0-9]+$/'
               ]); */

                #validation
                $userInput = $request->validate([
                    'USERNAME'          => 'required|string|max:255||unique:admin,ADMIN_USERNAME|unique:users,USERNAME,'.$session['USER_ID'].',USER_ID|unique:admin,ADMIN_USERNAME|regex:/^[a-zA-Z0-9_]+$/',
                    'USER_EMAIL'        => 'required|email|unique:admin,ADMIN_EMAIL|unique:users,USER_EMAIL,'.$session['USER_ID'].',USER_ID',
                    'USER_PASSWORD'     => 'required|min:8|string|regex:/^[a-zA-Z0-9_]+$/',
                    'ADDRESS_STREET'    => 'required|string|max:255|regex:/^[a-zA-Z0-9-  ]+$/'  ,
                    'ADDRESS_CITY'      => 'required|string|max:255|regex:/^[a-zA-Z0-9- ]+$/'  ,
                    'ADDRESS_STATE'     => 'required|string|max:255|regex:/^[a-zA-Z0-9- ]+$/'  ,
                    'ADDRESS_DISTRICT'  => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/' ,
                    'ADDRESS_POSTALCODE'=> 'required|string|max:255|regex:/^[0-9]+$/',
                    'ADDRESS_COUNTRY'   => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
               ]);


               if(Address::where('ADDED_BY_USER_ID',$session['USER_ID'])->exists()){

                address::where('ADDED_BY_USER_ID',$session['USER_ID'])
                ->update([
                 'ADDRESS_STREET' => $userInput['ADDRESS_STREET'],
                 'ADDRESS_CITY'   => $userInput['ADDRESS_CITY'],
                 'ADDRESS_STATE'  => $userInput['ADDRESS_STREET'],
                 'ADDRESS_DISTRICT' => $userInput['ADDRESS_DISTRICT'],
                 'ADDRESS_POSTALCODE' => $userInput['ADDRESS_POSTALCODE'],
                 'ADDRESS_COUNTRY' => $userInput['ADDRESS_COUNTRY'],
                ]);

               }else{

                address::Create(array(
                    'ADDRESS_STREET' => $userInput['ADDRESS_STREET'],
                    'ADDRESS_CITY' => $userInput['ADDRESS_CITY'],
                    'ADDRESS_STATE' => $userInput['ADDRESS_STREET'],
                    'ADDRESS_DISTRICT' => $userInput['ADDRESS_DISTRICT'],
                    'ADDRESS_POSTALCODE' => $userInput['ADDRESS_POSTALCODE'],
                    'ADDRESS_COUNTRY' => $userInput['ADDRESS_COUNTRY'],
                    'ADDED_BY_USER_ROLE' => $session['USER_ROLE'],
                    'ADDED_BY_USER_ID' => $session['USER_ID'],
                ));

               }

               if($request->hasFile('USER_IMG')){
                $imageName = $request->file('USER_IMG')->getClientOriginalName();
                $request->file('USER_IMG')->storeAs('public/images/',$imageName);

                user::where('USER_ID',$session['USER_ID'])
                   ->update([
                            //  'USER_FNAME' => $userInput['USER_FNAME'],
                            //  'USER_LNAME' => $userInput['USER_LNAME'],
                            'USERNAME' => $userInput['USERNAME'],
                            'USER_EMAIL' => $userInput['USER_EMAIL'],
                            'USER_PASSWORD' => Hash::make($userInput['USER_PASSWORD']),
                            //   'USER_TEL' => $userInput['USER_TEL'],
                            //   'USER_IMG' => $imageName,
                            //   'USER_DOB' => $userInput['USER_DOB'],
                            //   'USER_GENDER' => $userInput['USER_GENDER'],
                        ]);


            }else{

                user::where('USER_ID',$session['USER_ID'])
                ->update([
                        //  'USER_FNAME' => $userInput['USER_FNAME'],
                        //  'USER_LNAME' => $userInput['USER_LNAME'],
                          'USERNAME' => $userInput['USERNAME'],
                          'USER_EMAIL' => $userInput['USER_EMAIL'],
                          'USER_PASSWORD' => Hash::make($userInput['USER_PASSWORD']),
                        //   'USER_TEL' => $userInput['USER_TEL'],
                        //   'USER_IMG' => $imageName,
                        //   'USER_DOB' => $userInput['USER_DOB'],
                        //   'USER_GENDER' => $userInput['USER_GENDER'],
                     ]);
            }
               $user = User::where('USER_ID', $session['USER_ID'])->get();
               $user = json_decode(json_encode($user[0]), true);
               $request->session()->put('user',$user);

               return redirect('index');
    }




}
