<?php

namespace App\Http\Controllers\custom;
//require_once 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job_Request;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;

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
        $jobs =  Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->get();
        $jobs = json_decode(json_encode($jobs), true);
        return view("user.jobList")->with('jobList',$jobs);
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
