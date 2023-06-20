<?php

namespace App\Http\Controllers\custom;
//require_once 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job_Application;
use App\Models\Job_Request;
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
            return redirect('login_user');
        }
    }

    public function viewRequestJobList(Request $request){
        $session= $request->session()->get('user');

        if(Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->exists()){
            $jobs =  Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->where('JR_STATUS','CONFIRMED')->get();
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
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        $jr_id = $request->route('jobid');
        if(Job_Request::where('JR_ID',$jr_id)->exists()){
            $job =  Job_Request::where('JR_ID', $jr_id)->get();
            $category =  DB::table('CATEGORY')->get();

            if(isset($freelancer)){
                if(Job_Application::where(['JR_ID'=>$jr_id,'FREELANCER_ID'=>$freelancer['FREELANCER_ID']])->exists()){
                    return view("user.jrSingle")->with(['job'=>$job,'category'=>$category,'order'=>1]);
                }
            }
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

        $session= $request->session()->get('user');

        #validation
        $jobInput = $request->validate([
            'JR_TITLE'        => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'JR_DESCRIPTION'  => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'CATEGORY_ID'     => 'required|integer|regex:/^[0-9]+$/',
            'JR_ATTACHMENT'   => 'nullable|mimes:pdf,docx,ppt,word,pptx',
            'JR_REMUNERATION' => 'required|integer|regex:/^[0-9]+$/',
            'JR_DELIVERYDATE' => 'required|after_or_equal:'.now()->toDateString(),
       ]);

       Job_Request::create([
        'CATEGORY_ID'     => $jobInput['CATEGORY_ID'],
        'POSTED_BY_USER'  => $session['USER_ID'],
        'JR_TITLE'        => $jobInput['JR_TITLE'],
        'JR_REMUNERATION' => $jobInput['JR_REMUNERATION'],
        'JR_STATUS'       => 'PENDING',
        'JR_DELIVERYDATE' => $jobInput['JR_DELIVERYDATE'],
        'JR_DATEPOSTED'   => now(),

        ]);

        $jrId =  Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->latest()->first('JR_ID');

        if($request->hasFile($jobInput['JR_ATTACHMENT'])){
            $imageName = $request->file($jobInput['JR_ATTACHMENT'])->getClientOriginalName();
            $request->file($jobInput['JR_ATTACHMENT'])->storeAs('public/images/',$imageName);

            Job_Request::where('JR_ID',$jrId['JR_ID'])
                ->update([
                'JR_REMUNERATION' => $jobInput['JR_REMUNERATION']
            ]);
        }

        if(AppHelper::instance()->ai($jobInput['JR_DESCRIPTION'])=='foul'){

            Job_Request::where('JR_ID',$jrId['JR_ID'])
                ->update([
                'JR_DESCRIPTION' => $jobInput['JR_DESCRIPTION'],
                'JR_STATUS'       => 'DRAFT',
            ]);

        }else{
            Job_Request::where('JR_ID',$jrId['JR_ID'])
                ->update([
                'JR_DESCRIPTION' => $jobInput['JR_DESCRIPTION'],
                'JR_STATUS'       => 'CONFIRMED',
            ]);
        }

        return view("index");
    }

}
