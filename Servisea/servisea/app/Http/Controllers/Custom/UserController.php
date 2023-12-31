<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\certifications;
use App\Models\department;
use App\Models\dispute;
use App\Models\Freelancer;
use App\Models\Gig;
use App\Models\Job_Application;
use App\Models\Order;
use App\Models\orderAttachment;
use App\Models\Package;
use App\Models\Payment;
use App\Models\reviews;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\orderMail;
use App\Models\modification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function viewRegisterPage(Request $request){
        try{
            $user= $request->session()->get('user');
            $admin= $request->session()->get('adminDetails');

            if(!isset($user) && !isset($admin)){
                return view("user.register");
            }else{
                return redirect()->route('index');
            }
        }
        catch (\Exception $e){
            return redirect()->route('index');
        }

    }

    public function viewDispute(Request $request){
        $session= $request->session()->get('user');
        $oid = Crypt::decryptString( $request->route('oid'));

        if(isset($session)){
            return view("user.Dispute.disputeView",['oid'=>$oid]);
        }else{
            return redirect()->route('login_user');

        }
    }

    public function requestDispute(Request $request){
        //Get Users Information
        $user= $request->session()->get('user');
        //Request Order ID
        $oid = Crypt::decryptString( $request->route('oid'));
        //Checking if user is opening dispute for an order or not
        if(isset($user)&&isset($oid)){
            //Requesting and validating input
            $disputeInput = $request->validate([
                'Dispute_Title'       => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
                'Dispute_Description' => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
                'Department'          => 'required|regex:/^[@0-9]+$/',
            ]);
            //Retrieve Orders
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
            //Insert Dispute
            dispute::create([
                'USER_ID' => $user['USER_ID'],
                'EMPLOYEE_ID' => 1,
                'DEPARTMENT_ID'=> $disputeInput['Department'],
                'DISPUTE_TITLE'=> $disputeInput['Dispute_Title'],
                'FREELANCER_ID' => $orders[0]->FREELANCER_ID,
                'DISPUTE_DESCRIPTION' => $disputeInput['Dispute_Description'],
                'DISPUTE_SOLUTION'=> null,
                'DISPUTE_DATECREATED' => now(),
                'DISPUTE_STATUS' => 'PENDING',
                'ORDER_ID' => $oid,
                ]);
            return view('user.Dispute.dispute',['oid'=>$oid]);
        }elseif(isset($user)){
            //Requesting and validating input
            $disputeInput = $request->validate([
                'Dispute_Title'       => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
                'Dispute_Description' => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
                'Department'          => 'required|regex:/^[@0-9]+$/',
            ]);
            dispute::create([
                'USER_ID' => $user['USER_ID'],
                'EMPLOYEE_ID' => 1,
                'DEPARTMENT_ID'=> $disputeInput['Department'],
                'DISPUTE_TITLE'=> $disputeInput['Dispute_Title'],
                'FREELANCER_ID' => null,
                'DISPUTE_DESCRIPTION' => $disputeInput['Dispute_Description'],
                'DISPUTE_SOLUTION'=> null,
                'DISPUTE_DATECREATED' => now(),
                'ORDER_ID' => null,
                'DISPUTE_STATUS' => 'PENDING',
            ]);
            return view('user.Dispute.dispute');
        }else{
            return redirect()->route('index');
        }
    }

    public function requestModifications(Request $request){
        $user= $request->session()->get('user');
        $oid = Crypt::decryptString( $request->route('oid'));
        $modifInput = $request->validate([
            'modifications'      => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
        ]);
        if(isset($user)&&isset($oid)){
            modification::create([
                    'MODIF_REQUIREMENTS' => $modifInput['modifications'],
                    'ORDER_ID' => $oid
            ]);
            Order::where('ORDER_ID',$oid)->update([
                    'ORDER_STATUS' => 'IN PROGRESS'
            ]);
            return view('user.modifications.modification',['oid'=>$oid]);
        }else{
            return redirect()->route('index');
        }
    }

    public function viewProfile(Request $request)
    {
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        if(isset($session)){

            if(Address::where('ADDED_BY_USER_ID',$session['USER_ID'])->exists()){
                $addressDetails = Address::where('ADDED_BY_USER_ID',$session['USER_ID'])->get();
                $addressDetails = json_decode($addressDetails[0]);
                if(isset($freelancer)){
                    $certification =  certifications::where('FREELANCER_ID', $freelancer['FREELANCER_ID'])->get();
                }
                return view('user.profile',['addressDetails'=> $addressDetails,'certifications'=>$certification]);
            }else{
                return view('user.profile');
            }

        }else{
            return redirect()->route('login_user');
        }
    }

    public function orderGig(Request $request)
    {

        try {
            //Request Order Id from URL
            $pid = Crypt::decryptString($request->route('pid'));
            $session= $request->session()->get('user');
            //Check if information is retrieved and User is a project owner
            if(isset($session)&&$session['USER_ROLE']==1){
                //Get package Information
                $package = Package::where('PACKAGE_ID',$pid)->get();
                // Get gig Information
                $gig = Gig::where('GIG_ID',$package[0]->GIG_ID)->get();

                $orderDetails = ['PACKAGE_ID' => $pid,
                    'USER_ID' => $session['USER_ID'],
                    'FREELANCER_ID'=> $gig[0]->FREELANCER_ID,
                    'ORDER_AMOUNT' => $package[0]->PRICE,
                    'ORDER_DATE' => now(),
                    'ORDER_DUE'=> date('Y-m-d', strtotime(now().' + '.$package[0]->DELIVERY_DAYS.'days')),
                    'ORDER_STATUS'=> 'IN PROGRESS'];

                // Assign Order Information to Session
                $request->session()->put('orderDetails',$orderDetails);

                //Redirect to user Checkout
                return view('user.checkout',['det'=>$orderDetails]);

            }else{
                return redirect()->route('index');

            }

        }catch (\Exception $e){
            return redirect()->route('index');

        }
    }

    public function acceptApplicant(Request $request)
    {
        //Retrieve Job Application from URL
        $ja_id = $request->route('jaid');

        //Get information from User
        $session= $request->session()->get('user');

        //if session is set
        if(isset($session)){
            //Update Job Application status
            Job_Application::where('JA_ID',$ja_id)->update(['JA_STATUS' => 'CONFIRMED']);

        }else{
            return redirect()->route('index');

        }

    }

    public function dlFile(Request $request)
    {
        $filename = Crypt::decryptString( $request->route('filename'));
        $session= $request->session()->get('user');
        if(isset($session)&&isset($filename)){
            if(Storage::disk('public')->exists("deliverables/$filename")) {
                $absolutePath = Storage::disk('public')->path("deliverables/$filename");
                $content = file_get_contents($absolutePath);
                ob_end_clean();
                return response($content)->withHeaders(['Content-Type' => mime_content_type($absolutePath)]);
            }
            return redirect('/404');
        }else{
            return redirect()->route('index');
        }
    }

    public function confirmOrder(Request $request)
    {
        //Request Order ID from Route
        $oid = Crypt::decryptString( $request->route('oid'));
        //Request User Information from session
        $session= $request->session()->get('user');

        if(isset($session)&&isset($oid)){
            //Update Order status as Completed
            Order::where('ORDER_ID',$oid)->update([
                    'ORDER_STATUS' => 'COMPLETED'
                ]);

            return redirect(route('orderDetails',$oid));

        }else{
            return redirect()->route('index');
        }
    }

    public function rateGig(Request $request)
    {
        $oid = Crypt::decryptString( $request->route('oid'));
        $revInput = $request->validate([
            'reviewDescription'      => 'required|min:8|regex:/^[@A-Za-z0-9_@ ]+$/',
            'selected_rating'        => 'required|string|regex:/^[0-9]+$/',
       ]);
        $session= $request->session()->get('user');
        if(isset($session)&&isset($oid)){
            $gigID = Order::select('GIG_ID')
            ->join('package', 'package.PACKAGE_ID', '=', 'order.PACKAGE_ID')
            ->where('ORDER_ID',$oid)
            ->get();
            reviews::CREATE([
                    "GIG_ID" => $gigID[0]['GIG_ID'],
                    "RATING" => $revInput['selected_rating'],
                    "DESCRIPTION" => $revInput['reviewDescription'],
                    "ORDER_ID" => $oid,
                ]);
            return redirect(route('orderDetails',$oid));
        }else{
            return redirect()->route('index');
        }
    }

    public function listApplicants(Request $request)
    {
        $jr_id = $request->route('jobid');
        $session= $request->session()->get('user');

        if(isset($session)){

            $Applicants = Freelancer::select('*')
            ->join('JOB_APPLICATION', 'FREELANCER.FREELANCER_ID', '=', 'JOB_APPLICATION.FREELANCER_ID')
            ->join('USERS', 'FREELANCER.USER_ID', '=', 'USERS.USER_ID')
            ->where(['JA_STATUS'=>'PENDING','JOB_APPLICATION.JR_ID'=>$jr_id])
            ->get();

            $reviews = Freelancer::select('FREELANCER.FREELANCER_ID' , DB::raw('round(AVG(RATING),0) as quantity'))
            ->join('GIG', 'GIG.FREELANCER_ID', '=', 'FREELANCER.FREELANCER_ID')
            ->join('REVIEWS', 'REVIEWS.GIG_ID', '=', 'GIG.GIG_ID')
            ->groupBy('FREELANCER.FREELANCER_ID')
            ->get();

            return view('user.applicantList',['applicants'=>$Applicants,'reviews'=>$reviews]);

        }else{

            return redirect()-route('login-req');
        }
    }

    public function orderList(Request $request)
    {
        //retrieving user's information from session
        $session= $request->session()->get('user');
        //if user's information is set
        if(isset($session)){
            //get Feelancer's Information
            $freelancer = $request->session()->get('freelancer');
            //if freelancer's information is set
            if(isset($freelancer)){

                //retrieving order's information assigned to Freelancer
                $orders = DB::select('
                SELECT *
                FROM fms.order AS orders
                RIGHT JOIN package
                ON orders.PACKAGE_ID = package.PACKAGE_ID
                RIGHT JOIN gig
                ON gig.GIG_ID = package.GIG_ID
                WHERE orders.FREELANCER_ID ='.$freelancer['FREELANCER_ID'].';');

                return view('user.orderList',['orders'=>$orders]);

            }else{

                //retrieving user's order
                if(order::where(['USER_ID'=>$session['USER_ID']])->exists()){

                    //retrieving order's information assigned to user
                    $orders = DB::select('
                    SELECT *
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
            return redirect()->route('index');
        }
    }

    public function orderdetails(Request $request)
    {
       try{
            //Retrieve Information about user and freelancer
            $session= $request->session()->get('user');
            $freelancer= $request->session()->get('freelancer');
            //Request order id from URL (decrypting)
            $oid = Crypt::decryptString( $request->route('oid'));
            //retrieve information from department
            $department = department::all();
            //session is set and freelancer is set
            if(isset($session)||isset($freelancer)){
                //if user logged in or freelancer logged
                if(order::where(['USER_ID'=>$session['USER_ID']])->exists()||
                order::where(['FREELANCER_ID'=>$freelancer['FREELANCER_ID']])->exists())
                {
                    //retrieve information of orders
                    $orders = DB::select(
                    'SELECT *
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
                    //retrieve attachment
                    $attachment = orderAttachment::where('ORDER_ID',$oid)->get();
                    //retrieve review
                    $review = reviews::where('ORDER_ID',$oid)->get();
                    //retrieve modification
                    $modification = modification::where('ORDER_ID',$oid)->get();
                    //retrieve dispute
                    $dispute = dispute::where('ORDER_ID',$oid)->get();
                    return view('user.orderDetails',['orders'=>$orders,'orderAttachment'=>$attachment,'review'=>$review,'modifications'=>$modification,'departments'=>$department,'dispute'=>$dispute]);
                }else{
                    return view('user.orderList');
                }
            }else{
                return redirect()->route('index');
            }
        } catch (\Exception $e) {
            return redirect()->route('index');
        }
    }

    public function DeleteProfile(Request $request)
    {
        $user= $request->session()->get('user');

        //Requesting Input value from text fields on web pages and validating
        $userInput = $request->validate([
            'close_Password'   => 'required|min:8|string',
        ]);

        if(Hash::check($userInput['close_Password'],$user['USER_PASSWORD'])){

            user::where('USER_ID',$user['USER_ID'])->delete();
            $request->session()->flush();
            return view('index');

        }else{

            return view('user.profile')->with('error_pw',"Cannot Close Account, Your password does not match!");

        }
    }

    public function RegisterUser(Request $request){

        //Requesting Input value from text fields on web pages and validating
        $userInput = $request->validate([
            'username'   => 'required|string|max:255|unique:users|unique:admin,ADMIN_USERNAME|regex:/^[a-zA-Z0-9_]+$/',
            'email'      => 'required|email|unique:users,USER_EMAIL|unique:admin,ADMIN_EMAIL',
            'password'   => 'required|min:8|string|regex:/^[a-zA-Z0-9_ ]+$/|confirmed',
            'password_confirmation'   => 'required',
        ]);
        try{
            //Inserting user in Users table
            User::Create(array( 'USERNAME' => $userInput['username'],
            'USER_EMAIL' => $userInput['email'],
            'USER_PASSWORD' => Hash::make($userInput['password'])));
            //Retrieving inserted user from users Table
            $user = User::where('USER_EMAIL',$userInput['email'])->first();
            //Putting data in session
            $request->session()->put('user',$user);
            return redirect()->route('index');
        } catch (\Exception $e) {
            return redirect()->route('index');
        }
    }

    public function UpdateProfile(Request $request){

        $user= $request->session()->get('user');

        $user_Input = $request->validate([
            'Username'        => 'required|string|max:255|regex:/^[a-zA-Z0-9_.]+$/|unique:users,USERNAME,'.$user->USER_ID.',USER_ID|unique:admin,ADMIN_USERNAME',
            'Email'           => 'required|email|unique:users,USER_EMAIL,'.$user->USER_ID.',USER_ID|unique:admin,ADMIN_EMAIL',
            'Last_Name'       => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'First_Name'      => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Date_Of_Birth'   => 'required|before:'.now()->subYears(18)->toDateString(),
            'Gender'          => 'required|not_in:0',
            'Phone_Number'    => 'required|string|max:20|regex:/^[0-9+]+$/',
       ],[
        'Gender.gt' => "Select a Gender !",
       ]);

       user::where('USER_ID',$user['USER_ID'])
           ->update([
                    'USER_FNAME' => $user_Input['First_Name'],
                    'USER_LNAME' => $user_Input['Last_Name'],
                    'USERNAME' => $user_Input['Username'],
                    'USER_EMAIL' => $user_Input['Email'],
                    'USER_TEL' => $user_Input['Phone_Number'],
                    'USER_DOB' => $user_Input['Date_Of_Birth'],
                    'USER_GENDER' => $user_Input['Gender'],
        ]);

        if($request->hasFile('upload_profile')){
            $imageName = $request->file('upload_profile')->getClientOriginalName();
            $request->file('upload_profile')->storeAs('public/profile/images/',$imageName);

            user::where('USER_ID',$user['USER_ID'])
               ->update([
                        'USER_IMG' => $imageName,
            ]);

        }

        $user = User::where(['USER_EMAIL'=>$user['USER_EMAIL']])->first();
        request()->Session()->put('user',$user);
        $user= $request->session()->get('user');

        return redirect()->route('viewProfileUser');

    }

    public function UpdateAddress(Request $request){

        $user= $request->session()->get('user');

        $address_Input = $request->validate([
            'Street'       => 'required|string|max:255|regex:/^[a-zA-Z0-9- ]+$/',
            'State'        => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'City'         => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Country'      => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'District'     => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Postal_Code'  => 'required|string|max:255|regex:/^[0-9A-Z ]+$/'
        ]);

        if(Address::where('ADDED_BY_USER_ID',$user['USER_ID'])->exists()){

            address::where('ADDED_BY_USER_ID',$user['USER_ID'])
            ->update([
                'ADDRESS_STREET' => $address_Input['Street'],
                'ADDRESS_CITY'   => $address_Input['City'],
                'ADDRESS_STATE'  => $address_Input['State'],
                'ADDRESS_DISTRICT' => $address_Input['District'],
                'ADDRESS_POSTALCODE' => $address_Input['Postal_Code'],
                'ADDRESS_COUNTRY' => $$address_Input['Country'],
            ]);

        }else{

           $address = address::Create(array(
                'ADDRESS_STREET' => $address_Input['Street'],
                'ADDRESS_CITY'   => $address_Input['City'],
                'ADDRESS_STATE'  => $address_Input['State'],
                'ADDRESS_DISTRICT' => $address_Input['District'],
                'ADDRESS_POSTALCODE' => $address_Input['Postal_Code'],
                'ADDRESS_COUNTRY' => $address_Input['Country'],
                'ADDED_BY_USER_ROLE' => $user['USER_ROLE'],
                'ADDED_BY_USER_ID' => $user['USER_ID'],
            ));

            user::where('USER_ID',$user['USER_ID'])
               ->update([
                    'ADDRESS_ID' => $address['id']
            ]);

        }

            $user = User::where(['USER_EMAIL'=>$user['USER_EMAIL']])->first();
            request()->Session()->put('user',$user);
            $user= $request->session()->get('user');

            return redirect()->route('viewProfileUser');

    }

    public function changePassword(Request $request){

        $user= $request->session()->get('user');

        //Requesting Input value from text fields on web pages and validating
        $userInput = $request->validate([
            'old_Password'   => 'required|min:8|string',
            'New_Password'   => 'required|min:8|string|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'   => 'required',
        ]);

        if(Hash::check($userInput['old_Password'],$user['USER_PASSWORD'])){

            user::where('USER_ID',$user['USER_ID'])
                ->update([
                    'USER_PASSWORD' => Hash::make($user['New_Password'])
            ]);

            $user = User::where(['USER_EMAIL'=>$user['USER_EMAIL']])->first();
            request()->Session()->put('user',$user);
            $user= $request->session()->get('user');

            return view('user.profile')->with('error_pw',"Password Changed SUCCESSFULLY!");

        }else{

            return view('user.profile')->with('error_pw',"Your Old password does not match!");

        }

    }

}
