<?php

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Custom\jobController;
use App\Http\Controllers\Custom\UserController;
use App\Http\Controllers\Custom\CustomController;
use App\Http\Controllers\Custom\CategoryController;
use App\Http\Controllers\Custom\FreelancerController;
use App\Http\Controllers\Custom\stripeController;
use App\Http\Controllers\Admin\gigController;
use App\Http\Controllers\Admin\departmentController;
use App\Http\Controllers\Admin\jobAdminController;
use App\Http\Controllers\Admin\userAdminController;
use App\Http\Controllers\Admin\employeeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\department;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//USER PAGE

//Login Page
Route::get('/login', function () {

    try{
        //retrieve information from user and admin
        $user= request()->session()->get('user');
        $admin= request()->session()->get('adminDetails');

        //if no information retrieved for user and admin
        if(!isset($admin)&&!isset($user)){
        //access login page
            return view('login_user');
        }else{
        //else redirect to homepage
            return redirect()->route('index');
        }

    }
    catch (\Exception $e){
        return redirect()->route('index');
    }

})->name('login_user');

Route::post('/login', [CustomController::class, 'login'])->name('login-req');

Route::get('/user/register', [UserController::class, 'viewRegisterPage'])->name('RegisterUser.page');

Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::post('/user/update/address', [UserController::class, 'updateAddress'])->name('updateAddress');

    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('updateUser');

    Route::post('/user/change/Password', [UserController::class, 'changePassword'])->name('changePassword');

    Route::post('/register/store', [UserController::class, "registerUser"])->name("registerUser");

    Route::post('/freelancer/update/description', [FreelancerController::class, "updateDescription"])->name("updateDescription");

    Route::post('/freelancer/add/certification', [FreelancerController::class, "updateEducation"])->name("updateEducation");

    Route::post('/user/delete/profile', [UserController::class, "deleteProfile"])->name("deleteProfile");

    Route::post('/servisea/search', [FreelancerController::class, 'searchGig'])->name('searchGig');

    Route::get('/clearSession', function (request $request) {
        $request->session()->flush();
        return redirect()->route('index');
    })->name('clearSession');
});


Route::get('/user/profile',  [UserController::class, 'viewProfile'])->name('viewProfileUser');

Route::get('/servisea/user/job/list', [jobController::class, 'viewRequestJobList'])->name('viewReqJobList');

//User Get Job Page and Post Job
Route::get('/user/postJob=1',  [jobController::class, 'viewRequestJobPage'])->name('viewRequestJobPage');
Route::post('/user/postJob=1', [jobController::class, 'CreateJob'])->name('JobPageA');
//View Job
Route::get('/user/job/list', [jobController::class, 'viewJobList'])->name('viewJobList');

//FREELANCER PAGE

Route::get('/freelancer/becomeSeller', [FreelancerController::class, 'createFreelancer'])->name('switchToSeller');
Route::get('/freelancer/becomeBuyer',   [FreelancerController::class, 'switchToBuyer'])->name('switchToBuyer');

Route::get('/freelancer/postService/overview', [FreelancerController::class, 'viewOverviewPage'])->name('viewOverviewPage');
Route::post('/freelancer/postService/package', [FreelancerController::class, 'viewPackagePage'])->name('viewPackagePage');

Route::post('/freelancer/postService/package/standard',    [FreelancerController::class, 'postBasicGig'])->name('postBasicPackagePage');
Route::post('/freelancer/postService/package/Multiple', [FreelancerController::class, 'postMultiGig'])->name('postMultiPackagePage');

Route::get('/servisea/view-all-gig/{fid?}/{cid?}/{search?}', [FreelancerController::class, 'viewAllGig'])->name('viewAllGig');
Route::get('/servisea/viewgig/{gigid}', [FreelancerController::class, 'viewGig'])->name('viewGig');


Route::get('/servisea/view/job/{jobid}', [jobController::class, 'viewJob'])->name('viewJob');
Route::get('/servisea/pause/job/{jobid}', [jobController::class, 'pauseJob'])->name('pauseJob');
Route::get('/servisea/delete/job/{jobid}', [jobController::class, 'deleteJob'])->name('deleteJob');

Route::get('/servisea/freelancer/apply/job/{jobid}', [FreelancerController::class, 'applyJob'])->name('applyJob');
Route::get('/servisea/user/applicant/list/{jobid}', [userController::class, 'listApplicants'])->name('viewListApplicants');
Route::get('/servisea/user/applicant/accept/{jaid}', [userController::class, 'AcceptApplicant'])->name('AcceptApplicants');


Route::get('/servisea/view/freelancer/{fid}', [FreelancerController::class, 'viewFreelancer'])->name('viewFreelancer');
Route::get('/servisea/List/order', [UserController::class, 'orderList'])->name('OrderList');
Route::get('/servisea/user/order/{pid}', [UserController::class, 'orderGig'])->name('OrderGig');


Route::post('/servisea/user/checkout', [stripeController::class, 'session'])->name('checkout');
Route::get('/servisea/user/success', [stripeController::class, 'success'])->name('success');

Route::get('/servisea/user/order/details/{oid}', [userController::class, 'orderdetails'])->name('orderDetails');
Route::post('/servisea/user/order/close/{oid}', [FreelancerController::class, 'closeOrder'])->name('closeOrder');

//Download File
Route::get('/servisea/download/file/{filename}', [UserController::class, 'dlFile'])->name('dlFile');

//Confirm Order
Route::get('/servisea/confirm/{oid}', [UserController::class, 'confirmOrder'])->name('confirmOrder');

//Rate Gig
Route::post('/servisea/rate/order/{oid}', [UserController::class, 'rateGig'])->name('rateGig');

//Request Modifications
Route::post('/servisea/modification/created/{oid}', [UserController::class, 'requestModifications'])->name('createModif');

//Request Disputes
Route::post('/servisea/dispute/created/{oid?}', [UserController::class, 'requestDispute'])->name('createDispute');


Route::get('/servisea/view/dispute/list', [employeeController::class, 'viewDisputeList'])->name('viewEmpDispute');
Route::get('/servisea/view/dispute/{did}', [employeeController::class, 'viewDispute'])->name('viewSingleDispute');
Route::get('/servisea/refund/{oid}/{did}', [employeeController::class, 'issueRefund'])->name('issueRefund');
Route::get('/servisea/{choose}/refund/{oid}', [employeeController::class, 'chooseRefund'])->name('chooseRefund');
Route::post('/servisea/close/dispute={did}', [employeeController::class, 'closeDispute'])->name('closeDispute');

Route::get('/servisea/view/dispute/{oid}', [UserController::class, 'viewDispute'])->name('viewDispute');



//Index Page
Route::get('/order/requirement', function (request $request) {

    echo '<h1>Submit order rquirements</h1>';

})->name('order.requirements');

//Index Page
Route::get('/index/home', function (request $request) {

    $category = Category::all();
    $department = department::all();
    $request->session()->put(['categoryList'=>$category,'departmentList'=>$department]);

    return view('index');
})->name('home');


//Index Page
Route::get('/', function (request $request) {

    $category = Category::all();
    $department = department::all();
    $request->session()->put(['categoryList'=>$category,'departmentList'=>$department]);
    $request->session()->get('user');
    $request->session()->get('freelancer');
    return view('index');
})->name('index');

//Index Page
Route::get('/order/viwe', function (request $request) {

    echo '<h1>Your Order Here</h1>';

})->name('order');




Route::get('/admin.dashboard', function () {
    return view('admin.dashboard');
});

//ADMINISTRATOR
//Category - ADMINISTRATOR
Route::get('/admin/category', [CategoryController::class, 'viewCategory'])->name('category.page');
Route::post('/editCategory', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/insertCategory', [CategoryController::class, 'insertCategory'])->name('insertCategory');
Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

//Department List- ADMINISTRATOR
Route::get('/admin/Department/List/{name?}', [departmentController::class, 'view_admin_department'])->name('view_admin_department');
Route::post('/admin/Department/insert', [departmentController::class, 'admin_insert_department'])->name('admin_insert_department');
Route::get('/admin/department/delete/{id?}', [departmentController::class, 'admin_delete_department'])->name('admin_delete_department');
Route::post('/admin/department/update/{id?}', [departmentController::class, 'admin_update_department'])->name('admin_update_department');

//Employee List - ADMINISTRATOR
Route::get('/admin/Employee/List', [CategoryController::class, 'view_admin_department'])->name('view_admin_emp');

//Gig List - ADMINISTRATOR
Route::get('/admin/Gig/List', [gigController::class, 'view_admin_gig'])->name('view_admin_gig');
Route::get('/admin/gig/update/{id}', [gigController::class, 'admin_update_gig'])->name('admin_update_gig');

//Job Request List - ADMINISTRATOR
Route::get('/admin/Job/Requests/List', [jobAdminController::class, 'admin_view_jr'])->name('view_admin_jr');
Route::get('/admin/Job/Requests/{id}', [jobAdminController::class, 'admin_update_jr'])->name('admin_update_jr');
Route::get('/admin/Job/Requests/{id}/delete', [jobAdminController::class, 'admin_delete_jr'])->name('admin_delete_jr');

//Freelancer List - ADMINISTRATOR
Route::get('/admin/Freelancer/List', [CategoryController::class, 'view_admin_department'])->name('view_admin_freelancer');

//Project Owner List- ADMINISTRATOR
Route::get('/admin/{user}/List', [userAdminController::class, 'admin_view_user'])->name('view_admin_user');
Route::get('/admin/{user}/update/{uid}', [userAdminController::class, 'admin_update_user'])->name('admin_update_user');
Route::get('/admin/{user}/delete/{uid}', [userAdminController::class, 'admin_delete_user'])->name('admin_delete_user');



Route::get('/admin/profile', [ProfileController::class, 'viewProfile'])->name('view_profile.page');
Route::post('/admin/profile', [ProfileController::class, 'updateProfile'])->name('updateAdmin');
Route::get('/admin/Address', [CategoryController::class, 'viewAddressPage'])->name('address.page');





//Admin Controller
Route::controller(AdminController::class)->group(function(){
    //Route::get('/admin_login','login')->name('admin.auth.login_admin');
    Route::get('/admin/dashboard','index')->name('admin.dashboard');
});





//Route::get('/about',[DemoController::class,'Index']);
//Route::get('/contact',[DemoController::class,'contact']);

Route::controller(DemoController::class)->group(function(){
    Route::get('/about','Index')->name('about.page');
    Route::get('/contact','contact')->name('contact.page');
});

Route::get('/admin_view',[AdminController::class,'AuthenticateUser']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
