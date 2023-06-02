<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Freelancer;

use function Pest\Laravel\get;

class FreelancerController extends Controller
{
    public function viewS1p(Request $request){
        $sessionUser= $request->session()->get('user');
        if(isset($sessionUser)!=null){
            return view("freelancer.sellerp1");
        }else{
            return redirect('login_user');
        }
    }

    public function createFreelancer(Request $request){
        $session= $request->session()->get('user');

                user::where('USER_ID',$session['USER_ID'])
                   ->update([
                            //  'USER_FNAME' => $userInput['USER_FNAME'],
                            //  'USER_LNAME' => $userInput['USER_LNAME'],
                            // 'USERNAME' => $userInput['USERNAME'],
                            // 'USER_EMAIL' => $userInput['USER_EMAIL'],
                            'USER_ROLE' => 2,
                            //   'USER_TEL' => $userInput['USER_TEL'],
                            //   'USER_IMG' => $imageName,
                            //   'USER_DOB' => $userInput['USER_DOB'],
                            //   'USER_GENDER' => $userInput['USER_GENDER'],
                            //   'ADMIN_CITY' => $admin['ADMIN_CITY'],
                            //   'ADMIN_COUNTRY' => $admin['ADMIN_COUNTRY'],
                            //   'ADMIN_DISTRICT' => $admin['ADMIN_DISTRICT'],
                            //   'ADMIN_POSTALCODE' => $admin['ADMIN_POSTALCODE'],
                            //   'ADMIN_LEVEL' => $admin['ADMIN_LEVEL']
                        ]);

                if (Freelancer::where('USER_ID',$session['USER_ID'])->exists()) {

                    return redirect('index');
                    }else{

                        Freelancer::create([
                            'USER_ID'     => $session['USER_ID'],
                            'F-LEVEL'  => 1,
                            'F_DESCRIPTION' => "",
                            'F_SINCE' => now(),
                            'F_LANGUAGE' => 'ENGLISH'
                            ]);
                            return redirect('index');
                    }


    }


    public function switchToBuyer(Request $request){
        $session= $request->session()->get('user');

                user::where('USER_ID',$session['USER_ID'])
                   ->update([
                            'USER_ROLE' => 1,
                        ]);
                        return redirect('index');

    }

}
