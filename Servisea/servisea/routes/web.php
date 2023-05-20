<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Custom\CustomController;
use App\Http\Controllers\Custom\CategoryController;
use App\Http\Controllers\Custom\UserController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Custom\jobController;



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
Route::get('/user/register', [UserController::class, 'viewRegisterPage'])->name('RegisterUser.page');
Route::get('/user/profile', [UserController::class, 'viewProfile'])->name('viewProfileUser');
Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('updateUser');
//User Get Job Page and Post Job
Route::get('/user/postJob=1', [jobController::class, 'viewRequestJobPage'])->name('viewRequestJobPage');
Route::post('/user/postJob=1', [jobController::class, 'CreateJob'])->name('JobPageA');
//View Job
Route::get('/user/jobRequest?=view', [jobController::class, 'viewRequestJobList'])->name('viewJobList');




//Index Page
Route::get('/index', function () {
    return view('index');
});

//Login Page
Route::get('/login_user', function () {
    return view('login_user');
})->name("login_user");

Route::post('/login-req', [CustomController::class, 'login'])->name('login-req');

Route::get('/admin.dashboard', function () {
    return view('admin.dashboard');
});

//Admin
Route::get('/admin/category', [CategoryController::class, 'viewCategory'])->name('category.page');
Route::post('/editCategory', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/insertCategory', [CategoryController::class, 'insertCategory'])->name('insertCategory');
Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

Route::get('/admin/profile', [ProfileController::class, 'viewProfile'])->name('view_profile.page');
Route::post('/admin/profile', [ProfileController::class, 'updateProfile'])->name('updateAdmin');
Route::get('/admin/Address', [CategoryController::class, 'viewAddressPage'])->name('address.page');





//Admin Controller
Route::controller(AdminController::class)->group(function(){
    //Route::get('/admin_login','login')->name('admin.auth.login_admin');
    Route::get('/admin/dashboard','index')->name('admin.dashboard');
});

Route::get('/clearSession', function (request $request) {
    $request->session()->flush();
    return redirect('index');
})->name('clearSession');


Route::post('/register/store', [UserController::class, "registerUser"])->name("registerUser");

//Route::get('/about',[DemoController::class,'Index']);
//Route::get('/contact',[DemoController::class,'contact']);

Route::controller(DemoController::class)->group(function(){
    Route::get('/about','Index')->name('about.page');
    Route::get('/contact','contact')->name('contact.page');
});



// Route::get('/momos', function () {
//     if (session('user_id')>0){
//         echo session('user_id');
//     }else{
//         return view('bobo');
//     }
// });


Route::get('/admin_view',[AdminController::class,'AuthenticateUser']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
