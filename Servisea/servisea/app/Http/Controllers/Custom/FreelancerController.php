<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Job_Request;
use ArrayObject;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Freelancer;
use App\Models\Category;
use App\Models\certifications;
use App\Models\Gig;
use App\Models\GigMedia;
use App\Models\Job_Application;
use App\Models\Order;
use App\Models\orderAttachment;
use App\Models\Package;
use App\Models\reviews;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\get;

class FreelancerController extends Controller
{
    public function viewS1p(Request $request){
        $session= $request->session()->get('user');
        if(isset($session)!=null){
            return view("freelancer.sellerp1");
        }else{
            return redirect()-route('login_user');
        }
    }

    public function viewOverviewPage(Request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        if(isset($session)!=null){
            $category = Category::all();
            $request->session()->put('categoryList',$category);

            return view("freelancer.overview");
        }else{
            return redirect('login_user');
        }
    }

    public function closeOrder(request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');
        $order_id = Crypt::decryptString( $request->route('oid'));

            $files = $request->File('order_deliverables');
            $a = array();

            if(OrderAttachment::where('ORDER_ID',$order_id)->exists()){
                $orderDeliverables = Order::where('ORDER_ID',$order_id)->get('ORDER_DELIVERABLES');
                $names = explode("|", $orderDeliverables[0]['ORDER_DELIVERABLES']);
                foreach($names as $name){
                    Storage::delete(public_path('deliverables/'.$name));
                    OrderAttachment::where(['ORDER_ID'=>$order_id,'MEDIA_PATH'=>$name])->delete();
                }
            }

            foreach($files as $file){

                $destination_path = 'public/deliverables';

                orderAttachment::create([
                    'ORDER_ID' => $order_id,
                    'MEDIA_PATH' => str_replace(' ', '', $file->getClientOriginalName())
                ]);

                $file->storeAs($destination_path,str_replace(' ', '', $file->getClientOriginalName()));

                $filename =str_replace(' ', '', $file->getClientOriginalName());

                if(isset($filesname)){
                    $filesname= $filesname.'|'.$filename;
                }else{
                    $filesname= $filename;
                }


            }

            Order::where('ORDER_ID',$order_id)->update([
                'ORDER_DELIVERABLES' => $filesname,
                'ORDER_STATUS' => 'READY',
            ]);

            return redirect(route("orderDetails",$order_id));
    }

    public function applyJob(Request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        $jr_id = $request->route('jobid');

        if(isset($session)!=null){

                $job =  Job_Request::where('JR_ID', $jr_id)->get();


                Job_Application::create([
                    'FREELANCER_ID' => $freelancer['FREELANCER_ID'],
                    'JA_DATEAPPLIED' => now(),
                    'JR_ID'       => $jr_id,
                    'JA_PRICE'    => $job[0]['JR_REMUNERATION'],
                    'JA_STATUS'   => 'PENDING',
                ]);

                return redirect("/user/job/list");


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

        #validation
        $PackageInput = $request->validate([
            'Gig_Title'            => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Gig_Description'      => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Category'             => 'Required|gt:0',
            'Gig_Requirements'     => 'Required|string|max:255|regex:/^[@a-zA-Z .]+$/',
            'Basic_Title'          => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Basic_Description'    => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Basic_Delivery_Days'  => 'Required|integer|regex:/^[0-9]+$/',
            'Basic_Revision'       => 'Required|string|max:255|regex:/^[0-9A-Za-z]+$/',
            'Basic_Price'          => 'Required|string|max:255|regex:/^[0-9.]+$/',

        ],[
            'Category.gt' => 'Select a category',
        ]);

        $gig = Gig::create([
            'CATEGORY_ID'      => $PackageInput['Category'],
            'FREELANCER_ID'    => $freelancer['FREELANCER_ID'],
            'GIG_NAME'         => $PackageInput['Gig_Title'],
            'GIG_DESCRIPTION'  => $PackageInput['Gig_Description'],
            'GIG_REQUIREMENTS' => $PackageInput['Gig_Requirements'],
            'GIG_STATUS'       => 'COMPLETED',
        ]);

        $files = $request->File('Attachment');
        foreach($files as $file){
            $destination_path = 'public/storage/gig';
            GigMedia::create([
                'GIG_ID' => $gig['id'],
                'MEDIA_PATH' => str_replace(' ', '', $file->getClientOriginalName())
            ]);
            $file->storeAs($destination_path,str_replace(' ', '', $file->getClientOriginalName()));
        }

        Package::create([
            'GIG_ID'              => $gig['id'],
            'PACKAGE_NAME'        => $PackageInput['Basic_Title'],
            'PRICE'               => $PackageInput['Basic_Price'],
            'PACKAGE_DESCRIPTION' => $PackageInput['Basic_Description'],
            'DELIVERY_DAYS'       => $PackageInput['Basic_Delivery_Days'],
            'REVISION'            => $PackageInput['Basic_Revision'],
            'PACKAGE_STATUS'      => 'BASIC',
        ]);

        return redirect()->route("index");

    }

    public function postMultiGig(Request $request){
        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        #validation
        $PackageInput = $request->validate([
            'Gig_Title'            => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Gig_Description'      => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Category'             => 'Required|gt:0',
            'Gig_Requirements'     => 'Required|string|max:255|regex:/^[@a-zA-Z .]+$/',
            'Basic_Title'          => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Basic_Description'    => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Basic_Delivery_Days'  => 'Required|integer|regex:/^[0-9]+$/',
            'Basic_Revision'       => 'Required|string|max:255|regex:/^[0-9A-Za-z]+$/',
            'Basic_Price'          => 'Required|string|max:255|regex:/^[0-9.]+$/',
            'Standard_Title'          => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Standard_Description'    => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Standard_Delivery_Days'  => 'Required|integer|regex:/^[0-9]+$/',
            'Standard_Revision'       => 'Required|string|max:255|regex:/^[0-9A-Za-z]+$/',
            'Standard_Price'          => 'Required|string|max:255|regex:/^[0-9.]+$/',
            'Premium_Title'          => 'Required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'Premium_Description'    => 'Required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'Premium_Delivery_Days'  => 'Required|integer|regex:/^[0-9]+$/',
            'Premium_Revision'       => 'Required|string|max:255|regex:/^[0-9A-Za-z]+$/',
            'Premium_Price'          => 'Required|string|max:255|regex:/^[0-9.]+$/',
       ]);

        $gig = Gig::create([
        'CATEGORY_ID'      => $PackageInput['Category'],
        'FREELANCER_ID'    => $freelancer['FREELANCER_ID'],
        'GIG_NAME'         => $PackageInput['Gig_Title'],
        'GIG_DESCRIPTION'  => $PackageInput['Gig_Description'],
        'GIG_REQUIREMENTS' => $PackageInput['Gig_Requirements'],
        'GIG_STATUS'       => 'COMPLETED',
        ]);


        $files = $request->File('Attachment');
        foreach($files as $file){
            $destination_path = 'public/storage/gig';
            GigMedia::create([
                'GIG_ID' => $gig['id'],
                'MEDIA_PATH' => str_replace(' ', '', $file->getClientOriginalName())
            ]);
            $file->storeAs($destination_path,str_replace(' ', '', $file->getClientOriginalName()));
        }

        Package::create(
        [
            'GIG_ID'              => $gig['id'],
            'PACKAGE_NAME'        => $PackageInput['Basic_Title'],
            'PRICE'               => $PackageInput['Basic_Price'],
            'PACKAGE_DESCRIPTION' => $PackageInput['Basic_Description'],
            'DELIVERY_DAYS'       => $PackageInput['Basic_Delivery_Days'],
            'REVISION'            => $PackageInput['Basic_Revision'],
            'PACKAGE_STATUS'      => 'BASIC',
        ],
        [
            'GIG_ID'              => $gig['id'],
            'PACKAGE_NAME'        => $PackageInput['Standard_Title'],
            'PRICE'               => $PackageInput['Standard_Price'],
            'PACKAGE_DESCRIPTION' => $PackageInput['Standard_Description'],
            'DELIVERY_DAYS'       => $PackageInput['Standard_Delivery_Days'],
            'REVISION'            => $PackageInput['Standard_Revision'],
            'PACKAGE_STATUS'      => 'STANDARD',
        ],
        [
            'GIG_ID'              => $gig['id'],
            'PACKAGE_NAME'        => $PackageInput['Premium_Title'],
            'PRICE'               => $PackageInput['Premium_Price'],
            'PACKAGE_DESCRIPTION' => $PackageInput['Premium_Description'],
            'DELIVERY_DAYS'       => $PackageInput['Premium_Delivery_Days'],
            'REVISION'            => $PackageInput['Premium_Revision'],
            'PACKAGE_STATUS'      => 'PREMIUM',
        ]);

        return redirect()->route("index");
    }

    public function createFreelancer(Request $request){
        $session= $request->session()->get('user');

        user::where('USER_ID',$session['USER_ID'])->update(['USER_ROLE' => 2,]);

        if (!Freelancer::where('USER_ID',$session['USER_ID'])->exists()) {

            Freelancer::create([
                    'USER_ID'     => $session['USER_ID'],
                    'F-LEVEL'  => 1,
                    'F_DESCRIPTION' => "",
                    'F_SINCE' => now(),
                    'F_LANGUAGE' => 'ENGLISH'
            ]);
        }

        $user = User::where(['USER_EMAIL'=>$session['USER_EMAIL']])->first();
        $request->session()->put('user',$user);
        $session= $request->session()->get('user');
        $freelancer = Freelancer::where('USER_ID', $session['USER_ID'])->get();
        $freelancer = json_decode(json_encode($freelancer[0]), true);
        request()->Session()->put('freelancer',$freelancer);
        $freelancer= $request->session()->get('freelancer');

        return redirect()->route('index');
    }

    public function switchToBuyer(Request $request){
        $session= $request->session()->get('user');
        user::where('USER_ID',$session['USER_ID'])->update(['USER_ROLE' => 1,]);
        $user = User::where(['USER_EMAIL'=>$session['USER_EMAIL']])->first();
        $request->session()->put('user',$user);
        $session= $request->session()->get('user');
        session()->forget('freelancer');
        return redirect()->route('index');
    }

    public function searchGig(Request $request){
        $session= $request->session()->get('user');

        $search = $request->validate([
            'Search'            => 'string|max:50|regex:/^[a-zA-Z ]+$/',
       ]);

        if(gig::where('GIG_STATUS','COMPLETED')->exists()){

            $gigs = DB::select(
                    'SELECT gig.GIG_ID,GIG_NAME,GIG_DESCRIPTION,package.PRICE,users.USERNAME,freelancer.FREELANCER_ID
                    FROM gig
                    RIGHT JOIN package
                    ON gig.GIG_ID = package.GIG_ID
                    RIGHT JOIN freelancer
                    ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                    RIGHT JOIN users
                    ON freelancer.USER_ID = users.USER_ID
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND gig.GIG_STATUS = "COMPLETED"
                    AND gig.GIG_NAME LIKE "%'.$search['Search'].'%"
                    AND package.PACKAGE_ID = (
                        SELECT package.PACKAGE_ID
                        FROM package
                        WHERE package.GIG_ID =  gig.GIG_ID
                        AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                        ORDER BY PRICE ASC
                        LIMIT 1)');

                    $gigsCounter = DB::select(
                        'SELECT COUNT(gig.GIG_ID) AS "TOTAL"
                    FROM gig
                    RIGHT JOIN package
                    ON gig.GIG_ID = package.GIG_ID
                    RIGHT JOIN freelancer
                    ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                    RIGHT JOIN users
                    ON freelancer.USER_ID = users.USER_ID
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND gig.GIG_STATUS = "COMPLETED"
                    AND gig.GIG_NAME LIKE "%'.$search['Search'].'%"
                    AND package.PACKAGE_ID = (
                        SELECT package.PACKAGE_ID
                        FROM package
                        WHERE package.GIG_ID =  gig.GIG_ID
                        AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                        ORDER BY PRICE ASC
                        LIMIT 1)');



        $reviews = reviews::select('GIG_ID', DB::raw('round(AVG(RATING),0) as RATING') , DB::raw('COUNT(GIG_ID) as COUNT'))
                ->groupBy('GIG_ID')
                ->get();

        $gigMedia = DB::select('
        SELECT media_id ,GIG_ID, media_path
        FROM gig_media
        GROUP BY media_id ,GIG_ID, MEDIA_PATH
        LIMIT 1');

        $gigsCounter = json_decode(json_encode($gigsCounter[0]), true);

        if(isset($gigsCounter['TOTAL']) && $gigsCounter > 0){
            return view('freelancer.viewGigs')
            ->with('gigs',$gigs)
            ->with('reviews',$reviews)
            ->with('gigMedia',$gigMedia)
            ->with('cat',900);
        }else{
            return redirect()->route('index');
        };
    }
}

    public function viewAllGig(Request $request){
        $session= $request->session()->get('user');

        if(gig::where('GIG_STATUS','COMPLETED')->exists()){

            if($request->route('fid') != 0){

            $cat = 900;
            $fid= Crypt::decryptString( $request->route('fid'));
            $gigs = DB::select(
                    'SELECT gig.GIG_ID,GIG_NAME,GIG_DESCRIPTION,package.PRICE,users.USERNAME, freelancer.FREELANCER_ID , category.CATEGORY_NAME
                    FROM gig
                    RIGHT JOIN package
                    ON gig.GIG_ID = package.GIG_ID
                    RIGHT JOIN freelancer
                    ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                    RIGHT JOIN users
                    ON freelancer.USER_ID = users.USER_ID
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND gig.GIG_STATUS = "COMPLETED"
                    AND freelancer.FREELANCER_ID ='.$fid.'
                    AND package.PACKAGE_ID = (
                        SELECT package.PACKAGE_ID
                        FROM package
                        WHERE package.GIG_ID =  gig.GIG_ID
                        AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                        ORDER BY PRICE ASC
                        LIMIT 1)');

                    $gigsCounter = DB::select(
                        'SELECT COUNT(gig.GIG_ID) AS "TOTAL"
                    FROM gig
                    RIGHT JOIN package
                    ON gig.GIG_ID = package.GIG_ID
                    RIGHT JOIN freelancer
                    ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                    RIGHT JOIN users
                    ON freelancer.USER_ID = users.USER_ID
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND gig.GIG_STATUS = "COMPLETED"
                    AND freelancer.FREELANCER_ID ='.$fid.'
                    AND package.PACKAGE_ID = (
                        SELECT package.PACKAGE_ID
                        FROM package
                        WHERE package.GIG_ID =  gig.GIG_ID
                        AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                        ORDER BY PRICE ASC
                        LIMIT 1)');

                        $gigsCounter = json_decode(json_encode($gigsCounter[0]), true);

                if(isset($gigsCounter['TOTAL']) && $gigsCounter > 0){
                    return view('freelancer.viewCreatedGigs')
                    ->with('gigs',$gigs)
                    ->with('cat',$cat);
                }else{
                    return redirect()->route('index');
                };

            }elseif(!$request->route('fid') && !$request->route('cid')){

                $cat = 0;

            $gigs = DB::select(
                'SELECT gig.GIG_ID,GIG_NAME,GIG_DESCRIPTION,package.PRICE,users.USERNAME,freelancer.FREELANCER_ID
                FROM gig
                RIGHT JOIN package
                ON gig.GIG_ID = package.GIG_ID
                RIGHT JOIN freelancer
                ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                RIGHT JOIN users
                ON freelancer.USER_ID = users.USER_ID
                WHERE package.GIG_ID =  gig.GIG_ID
                AND gig.GIG_STATUS = "COMPLETED"
                AND package.PACKAGE_ID = (
                    SELECT package.PACKAGE_ID
                    FROM package
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                    ORDER BY PRICE ASC
                    LIMIT 1)');

                $gigsCounter = DB::select(
                    'SELECT COUNT(gig.GIG_ID) AS "TOTAL"
                FROM gig
                RIGHT JOIN package
                ON gig.GIG_ID = package.GIG_ID
                RIGHT JOIN freelancer
                ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                RIGHT JOIN users
                ON freelancer.USER_ID = users.USER_ID
                WHERE package.GIG_ID =  gig.GIG_ID
                AND gig.GIG_STATUS = "COMPLETED"
                AND package.PACKAGE_ID = (
                    SELECT package.PACKAGE_ID
                    FROM package
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                    ORDER BY PRICE ASC
                    LIMIT 1)');

        }elseif(!$request->route('fid'==0) && $request->route('cid')){

            $cid= Crypt::decryptString( $request->route('cid'));
            $gigs = DB::select(
                'SELECT gig.GIG_ID,GIG_NAME,GIG_DESCRIPTION,package.PRICE,users.USERNAME,freelancer.FREELANCER_ID,gig.CATEGORY_ID
                FROM gig
                RIGHT JOIN package
                ON gig.GIG_ID = package.GIG_ID
                RIGHT JOIN freelancer
                ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                RIGHT JOIN users
                ON freelancer.USER_ID = users.USER_ID
                WHERE package.GIG_ID =  gig.GIG_ID
                AND gig.GIG_STATUS = "COMPLETED"
                AND gig.CATEGORY_ID ='.$cid.'
                AND package.PACKAGE_ID = (
                    SELECT package.PACKAGE_ID
                    FROM package
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                    ORDER BY PRICE ASC
                    LIMIT 1)');

                $cat = $gigs[0]->CATEGORY_ID;

                $gigsCounter = DB::select(
                    'SELECT COUNT(gig.GIG_ID) AS "TOTAL"
                FROM gig
                RIGHT JOIN package
                ON gig.GIG_ID = package.GIG_ID
                RIGHT JOIN freelancer
                ON gig.FREELANCER_ID = freelancer.FREELANCER_ID
                RIGHT JOIN users
                ON freelancer.USER_ID = users.USER_ID
                WHERE package.GIG_ID =  gig.GIG_ID
                AND gig.GIG_STATUS = "COMPLETED"
                AND gig.CATEGORY_ID ='.$cid.'
                AND package.PACKAGE_ID = (
                    SELECT package.PACKAGE_ID
                    FROM package
                    WHERE package.GIG_ID =  gig.GIG_ID
                    AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
                    ORDER BY PRICE ASC
                    LIMIT 1)');

        }

        $reviews = reviews::select('GIG_ID', DB::raw('round(AVG(RATING),0) as RATING') , DB::raw('COUNT(GIG_ID) as COUNT'))
                ->groupBy('GIG_ID')
                ->get();

        $gigMedia = DB::select('
        SELECT media_id ,GIG_ID, media_path
        FROM gig_media
        GROUP BY media_id ,GIG_ID, MEDIA_PATH
        LIMIT 1');

        $gigsCounter = json_decode(json_encode($gigsCounter[0]), true);

        if(isset($gigsCounter['TOTAL']) && $gigsCounter > 0){
            return view('freelancer.viewGigs')
            ->with('gigs',$gigs)
            ->with('reviews',$reviews)
            ->with('gigMedia',$gigMedia)
            ->with('cat',$cat);
        }else{
            return redirect()->route('index');
        };
    }
}

    public function viewGig(Request $request){

    try{
        //Get user information
        $session= $request->session()->get('user');

        //get gig_id from url
        $input_gigID = Crypt::decryptString($request->route('gigid'));

        //retrieve gig information
        $gig = DB::select(
        'SELECT GIG.GIG_ID,GIG_NAME, GIG_DESCRIPTION ,package.PRICE,users.USERNAME,freelancer.FREELANCER_ID,users.USER_LNAME,users.USER_FNAME
        FROM GIG
        RIGHT JOIN PACKAGE
        ON gig.GIG_ID = package.GIG_ID
        RIGHT JOIN freelancer
        ON gig.FREELANCER_ID = FREELANCER.FREELANCER_ID
        RIGHT JOIN users
        ON FREELANCER.USER_ID = users.USER_ID
        WHERE package.GIG_ID =  gig.GIG_ID
        AND gig.GIG_STATUS = "COMPLETED"
        AND gig.GIG_ID = '.$input_gigID.'
        AND package.PACKAGE_ID = (
            SELECT package.PACKAGE_ID
            FROM package
            WHERE package.GIG_ID =  gig.GIG_ID
            AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
            ORDER BY PRICE ASC
            LIMIT 1)');

        //convert into json
        $gigsCounter = DB::select(
        'SELECT COUNT(GIG.GIG_ID) AS "TOTAL"
        FROM GIG
        RIGHT JOIN PACKAGE
        ON gig.GIG_ID = package.GIG_ID
        RIGHT JOIN freelancer
        ON gig.FREELANCER_ID = FREELANCER.FREELANCER_ID
        RIGHT JOIN users
        ON FREELANCER.USER_ID = users.USER_ID
        WHERE package.GIG_ID =  gig.GIG_ID
        AND gig.GIG_STATUS = "COMPLETED"
        AND gig.GIG_ID = '.$input_gigID.'
        AND package.PACKAGE_ID = (
        SELECT package.PACKAGE_ID
        FROM package
        WHERE package.GIG_ID =  gig.GIG_ID
        AND package.PACKAGE_STATUS NOT LIKE "CUSTOM"
        ORDER BY PRICE ASC
        LIMIT 1)');

        $basic = package::where('GIG_ID',$input_gigID)
        ->where('PACKAGE_STATUS','BASIC')
        ->get();

        $standard = package::where('GIG_ID',$input_gigID)
        ->where('PACKAGE_STATUS','STANDARD')
        ->get();

        $premium = package::where('GIG_ID',$input_gigID)
        ->where('PACKAGE_STATUS','PREMIUM')
        ->get();

        $basic = json_decode($basic[0]);

        $gigsCounter = json_decode(json_encode($gigsCounter[0]), true);

        $gig = json_decode(json_encode($gig[0]), true);

        $review = reviews::select('GIG_ID', DB::raw('round(AVG(RATING),0) as RATING') , DB::raw('COUNT(GIG_ID) as COUNT'))
                 ->where('GIG_ID',$input_gigID)
                 ->groupBy('GIG_ID')
                 ->get();

        $order = order::select(DB::raw('COUNT(ORDER_ID) as COUNT'))
        ->join('package','order.PACKAGE_ID','=','package.PACKAGE_ID')
        ->join('gig','gig.GIG_ID','=','package.GIG_ID')
        ->where(['gig.GIG_ID'=>$input_gigID,'ORDER_STATUS'=>'IN PROGRESS'])
        ->get();

        if(isset($gigsCounter['TOTAL']) && $gigsCounter['TOTAL'] == 1){

            if(count($standard) === 0){

                return view('freelancer.gigSingle')
                ->with('reviewsCount',$review)
                ->with('orderCount',$order)
                ->with('gig',$gig)
                ->with('basic',$basic);

            }else{

                $standard = json_decode($standard[0]);
                $premium  = json_decode($premium[0]);
                return view('freelancer.gigSingle')
                ->with('orderCount',$order)
                ->with('reviewsCount',$review)
                ->with('gig',$gig)
                ->with('basic',$basic)
                ->with('standard',$standard)
                ->with('premium',$premium);

            };

        }else{
            return redirect('index');
        };
    }
    catch (\Exception $e){
        return redirect('index');
    }

    }

    public function viewFreelancer(Request $request){
        $session= $request->session()->get('user');
        $freelancerID = Crypt::decryptString($request->route('fid'));

       if (Freelancer::where('FREELANCER_ID',$freelancerID)->exists()) {
        $freelancer = Freelancer::where('FREELANCER_ID',$freelancerID)->get();
        $freelancer = json_decode($freelancer[0]);
        $user = user::where('USER_ID',$freelancer->USER_ID)->get();
        $user = json_decode($user[0]);

        if(isset($session)!=null){
            return view("freelancer.freelancerSingle")->with('freelancer',$freelancer)->with('userfree',$user);
        }else{
            return redirect()->route('index');
        }

       }else{
        return redirect()->route('index');
       }
    }

    public function Order(Request $request){

        $session= $request->session()->get('user');

        if(isset($session)!=null){
            $category = Category::all();
            $request->session()->put('categoryList',$category);
            return view("freelancer.overview");
        }else{
            return redirect('login_user');
        }
    }

    public function updateDescription(Request $request){

        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        if(isset($session)!=null){

            $freelancer_Input = $request->validate([
                'Introduction'      => 'Required|string|max:255',
           ]);

           Freelancer::where('USER_ID',$session['USER_ID'])
           ->update(
            ['F_DESCRIPTION'=>$freelancer_Input['Introduction']]
           );

           session()->forget('freelancer');
           $freelancer = Freelancer::where('USER_ID', $session['USER_ID'])->get();
           $freelancer = json_decode(json_encode($freelancer[0]), true);
           request()->Session()->put('freelancer',$freelancer);
           $freelancer= $request->session()->get('freelancer');

            return redirect()->route('viewProfileUser');
        }else{
            return redirect('login_user');
        }
    }

    public function updateSkill(Request $request){

        $session= $request->session()->get('user');

        if(isset($session)!=null){
            $category = Category::all();
            $request->session()->put('categoryList',$category);
            return view("freelancer.overview");
        }else{
            return redirect('login_user');
        }
    }

    public function UpdateEducation(Request $request){

        $session= $request->session()->get('user');
        $freelancer= $request->session()->get('freelancer');

        if(isset($session)!=null){

            $cert_Input = $request->validate([
                'Certification_Name'      => 'Required|string|max:255',
                'Provider_Name'      => 'Required|string|max:255',
                'Date_Earned'      => 'Required|string|max:255|before:'.now(),
           ]);


           certifications::create([
                'FREELANCER_ID' => $freelancer['FREELANCER_ID'],
                'CERTIFICATION_NAME' => $cert_Input['Certification_Name'],
                'PROVIDER_NAME' => $cert_Input['Provider_Name'],
                'DATE_EARNED' => $cert_Input['Date_Earned'],
            ]);

            return redirect()->route('viewProfileUser');
        }else{
            return redirect('login_user');
        }
    }


}
