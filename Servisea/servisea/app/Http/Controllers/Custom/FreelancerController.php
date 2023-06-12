<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Freelancer;
use App\Models\Category;
use App\Models\Gig;
use App\Models\Package;
use PhpParser\Node\Stmt\Return_;

use function Pest\Laravel\get;

class FreelancerController extends Controller
{
    public function viewS1p(Request $request){
        $session= $request->session()->get('user');
        if(isset($session)!=null){
            return view("freelancer.sellerp1");
        }else{
            return redirect('login_user');
        }
    }

    public function viewOverviewPage(Request $request){
        $session= $request->session()->get('user');
        if(isset($session)!=null){
            $category = Category::all();
            $request->session()->put('categoryList',$category);
            return view("freelancer.overview");
        }else{
            return redirect('login_user');
        }
    }

    public function viewPackagePage(Request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

                #validation
                $PackageInput = $request->validate([
                    'Title'        => 'string|max:255|regex:/^[a-zA-Z]+$/',
                    'Description'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
                    'CATEGORY_ID'     => 'integer|regex:/^[0-9]+$/',
                    'Requirements'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
               ]);

               /*
               GIG_ID
               CATEGORY_ID
               FREELANCER_ID
               GIG_NAME
               GIG_DESCRIPTION
               GIG_REQUIREMENTS
               GIG_STATUS

               DON'T FORGET GIG ATTACHMENT

               */

             Gig::create([
              'CATEGORY_ID'      => $PackageInput['CATEGORY_ID'],
              'FREELANCER_ID'    => $freelancer['FREELANCER_ID'],
              'GIG_NAME'         => $PackageInput['Title'],
              'GIG_DESCRIPTION'  => $PackageInput['Description'],
              'GIG_REQUIREMENTS' => $PackageInput['Requirements'],
              'GIG_STATUS'       => 'PENDING',
              ]);


        if(isset($session)!=null){
            return view("freelancer.package");
        }else{
            return redirect('login_user');
        }
    }

    public function postBasicGig(Request $request){

        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        $gigId =  Gig::where('FREELANCER_ID', $freelancer['FREELANCER_ID'])->latest()->first('GIG_ID');



        #validation
        $PackageInput = $request->validate([
            'PT_B'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'PD_B'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'DD_B'  => 'integer|regex:/^[0-9]+$/',
            'R_B'   => 'string|max:255|regex:/^[0-9]+$/',
            'P_B'   => 'string|max:255|regex:/^[0-9]+$/',
       ]);


        Package::create([
            'GIG_ID'              => $gigId['GIG_ID'],
            'PACKAGE_NAME'        => $PackageInput['PT_B'],
            'PRICE'               => $PackageInput['P_B'],
            'PACKAGE_DESCRIPTION' => $PackageInput['PD_B'],
            'DELIVERY_DAYS'       => $PackageInput['DD_B'],
            'REVISION'            => $PackageInput['R_B'],
            'PACKAGE_STATUS'      => 'BASIC',
        ]);


    return redirect("index");

    }

    public function postMultiGig(Request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        $gigId =  Gig::where('FREELANCER_ID', $freelancer['FREELANCER_ID'])->latest()->first('GIG_ID');

        #validation
        $PackageInput = $request->validate([
            'PT_B'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'PD_B'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'DD_B'  => 'integer|regex:/^[0-9]+$/',
            'R_B'   => 'string|max:255|regex:/^[0-9]+$/',
            'P_B'   => 'string|max:255|regex:/^[0-9]+$/',

            'PT_S'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'PD_S'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'DD_S'  => 'integer|regex:/^[0-9]+$/',
            'R_S'   => 'string|max:255|regex:/^[0-9]+$/',
            'P_S'   => 'string|max:255|regex:/^[0-9]+$/',

            'PT_P'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'PD_P'  => 'string|max:255|regex:/^[a-zA-Z]+$/',
            'DD_P'  => 'integer|regex:/^[0-9]+$/',
            'R_P'   => 'string|max:255|regex:/^[0-9]+$/',
            'P_P'   => 'string|max:255|regex:/^[0-9]+$/',
       ]);

        Package::create([
            'GIG_ID'              => $gigId['GIG_ID'],
            'PACKAGE_NAME'        => $PackageInput['PT_B'],
            'PRICE'               => $PackageInput['P_B'],
            'PACKAGE_DESCRIPTION' => $PackageInput['PD_B'],
            'DELIVERY_DAYS'       => $PackageInput['DD_B'],
            'REVISION'            => $PackageInput['R_B'],
            'PACKAGE_STATUS'      => 'BASIC',
        ]);

        Package::create([
            'GIG_ID'              => $gigId['GIG_ID'],
            'PACKAGE_NAME'        => $PackageInput['PT_S'],
            'PRICE'               => $PackageInput['P_S'],
            'PACKAGE_DESCRIPTION' => $PackageInput['PD_S'],
            'DELIVERY_DAYS'       => $PackageInput['DD_S'],
            'REVISION'            => $PackageInput['R_S'],
            'PACKAGE_STATUS'      => 'STANDARD',
        ]);

        Package::create([
            'GIG_ID'              => $gigId['GIG_ID'],
            'PACKAGE_NAME'        => $PackageInput['PT_P'],
            'PRICE'               => $PackageInput['P_P'],
            'PACKAGE_DESCRIPTION' => $PackageInput['PD_P'],
            'DELIVERY_DAYS'       => $PackageInput['DD_P'],
            'REVISION'            => $PackageInput['R_P'],
            'PACKAGE_STATUS'      => 'PREMIUM',
        ]);

        return redirect("index");
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

            }else{

                Freelancer::create([
                    'USER_ID'     => $session['USER_ID'],
                    'F-LEVEL'  => 1,
                    'F_DESCRIPTION' => "",
                    'F_SINCE' => now(),
                    'F_LANGUAGE' => 'ENGLISH'
                    ]);

            }

            $request->Session()->put('user.USER_ROLE',2);
            $session= $request->session()->get('user');
            return redirect('index');

    }


    public function switchToBuyer(Request $request){
        $session= $request->session()->get('user');

                user::where('USER_ID',$session['USER_ID'])
                ->update(['USER_ROLE' => 1,]);
                        $request->Session()->put('user.USER_ROLE',1);
                        $session= $request->session()->get('user');
                        return redirect('index');
    }

    public function viewAllGig(Request $request){
        $session= $request->session()->get('user');

        //$gigs = Gig::where('GIG_STATUS','COMPLETED')->Get();
        $gigs = Gig::all();

        return view('freelancer.viewAllGig')->with('gigs',$gigs);
    }


}
