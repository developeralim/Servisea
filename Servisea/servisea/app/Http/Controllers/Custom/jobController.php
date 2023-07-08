<?php

namespace App\Http\Controllers\custom;
//require_once 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job_Application;
use App\Models\Job_Request;
use App\Http\Controllers\custom\ClamAV;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use Illuminate\Support\Facades\DB;

class jobController extends Controller
{

    public function viewRequestJobPage(Request $request){

        $sessionUser= $request->session()->get('user');
        if(isset($sessionUser)){
            $category = Category::all();
            $request->session()->put('categoryList',$category);
            return view("user.postJob");
        }else{
            return redirect()-route('login_user');
        }
    }

    public function viewRequestJobList(Request $request){
        $session= $request->session()->get('user');

        if(Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->exists()){
            $jobs =  Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->where('JR_STATUS','CONFIRMED')->orderBy('JR_ID', 'desc')->get();
            $category =  DB::table('CATEGORY')->get();

            return view("user.jobList")->with(['jobList'=>$jobs,'category'=>$category]);
        }else{
            return view("user.jobList");
        }

    }

    public function viewJobList(Request $request){
        $session= $request->session()->get('user');

        if(Job_Request::where('JR_STATUS', 'CONFIRMED')->exists()){
            $jobs =  Job_Request::where('JR_STATUS', 'CONFIRMED')->get();
            $category =  DB::table('CATEGORY')->get();

            return view("user.jobList")->with(['jobList'=>$jobs,'category'=>$category]);
        }else{
            return view("user.jobList");
        }

    }

    public function viewJob(Request $request){
        //Get user and freelancer information
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');
        //Retrieve job id from url
        $jr_id = $request->route('jobid');
        //If job requested exists in db
        if(Job_Request::where('JR_ID',$jr_id)->exists()){
            //Get Job requested Information
            $job =  Job_Request::where('JR_ID', $jr_id)->get();
            //Get Category information
            $category =  DB::table('CATEGORY')->get();
            //if Freelancers information is retrieved
            if(isset($freelancer)){
                //if freelancer already applied
                if(Job_Application::where(['JR_ID'=>$jr_id,'FREELANCER_ID'=>$freelancer['FREELANCER_ID']])->exists()){
                    return view("user.jrSingle")->with(['job'=>$job,'category'=>$category,'order'=>1]);
                }
            }
            //return to job request page
            return view("user.jrSingle")->with(['job'=>$job,'category'=>$category,'freelancer',$freelancer]);
        }else{
            return redirect("index");
        }
    }

    public function pauseJob(Request $request){
        $jr_id = $request->route('jobid');
        Job_Request::where('JR_ID',$jr_id)
           ->update(['JR_STATUS' => 'DRAFT']);
        return redirect("/user/job/list");
    }

    public function deleteJob(Request $request){
        $session= $request->session()->get('user');
        $jr_id = $request->route('jobid');
        Job_Request::where('JR_ID',$jr_id)
           ->delete();
        return redirect("/user/job/list");

    }

    public function CreateJob(Request $request){

        //Get user's Information
        $user= $request->session()->get('user');

        //Requesting input from job web page
        $jobInput = $request->validate([
            'Project_Title'   => 'required|string|max:255|regex:/^[a-zA-Z -.& ]+$/',
            'Description'  => 'required|string|max:255|regex:/^[a-zA-Z -.& 0-9]+$/',
            'Category'     => 'required',
            'Attachment'   => 'nullable',
            'Remuneration' => 'required|integer|regex:/^[0-9]+$/',
            'Delivery_Date' => 'required|after_or_equal:'.now()->toDateString(),
       ]);

       //Inserting value in Job Request Table
       $jrId = Job_Request::create([
        'CATEGORY_ID'     => $jobInput['Category'],
        'POSTED_BY_USER'  => $user['USER_ID'],
        'JR_TITLE'        => $jobInput['Project_Title'],
        'JR_REMUNERATION' => $jobInput['Remuneration'],
        'JR_STATUS'       => 'PENDING',
        'JR_DELIVERYDATE' => $jobInput['Delivery_Date'],
        'JR_DATEPOSTED'   => now(),
        ]);

        //Checking if attachment has file
        if($request->hasFile('Attachment')){

            $imageName = $request->file('Attachment')->getClientOriginalName();
            $request->file('Attachment')->storeAs('public/images/',$imageName);

            Job_Request::where('JR_ID',$jrId['id'])
                ->update([
                'JR_ATTACHMENT' => $imageName
            ]);
        }

        //Using AI to check if description of job request contain any foul language
        //if description of job request does contain any foul language
        if(AppHelper::instance()->ai($jobInput['Description'])=='foul'){

            Job_Request::where('JR_ID',$jrId['id'])
                ->update([
                'JR_DESCRIPTION' => $jobInput['Description'],
                'JR_STATUS'       => 'DRAFT',
            ]);

        }else{
        //if description of job request does not contain any foul language
            Job_Request::where('JR_ID',$jrId['id'])
                ->update([
                'JR_DESCRIPTION' => $jobInput['Description'],
                'JR_STATUS'       => 'CONFIRMED',
            ]);
        }

        return view("index");
    }

}
