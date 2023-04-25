<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

   /**
     * view the user's account.
     */
    public function viewProfile(Request $request)
    {

        $session= $request->session()->get('admin');
        $adminDetails = admin::where('ADMIN_ID',$session['ADMIN_ID'])
                         ->get();
        return view('admin.profileAdmin',['adminDetails'=>$adminDetails]);
    }

       /**
     * update the user's account.
     */
    public function updateProfile(Request $request)
    {
        $session= $request->session()->get('admin');
        //validation
        $admin = $request->validate([
            'ADMIN_FNAME'         => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'ADMIN_LNAME'         => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'ADMIN_EMAIL'         => 'required|email|unique:users,USER_EMAIL|unique:admin,ADMIN_EMAIL,'.$session['ADMIN_ID'].',ADMIN_ID',
            'ADMIN_USERNAME'      =>  'required|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            //'ADMIN_PASSWORD'   =>   'required|min:8|string|regex:/[a-zA-Z0-9]/',
            //'ADMIN_TEL'        =>   'required|max:255|string|regex:/^[0-9]+$/',
            //'ADMIN_IMG'        =>   'required|image|mimes:jpg,jpeg,gif,png',
            //'ADMIN_DOB'        =>   'required|before:'.now()->subYears(18)->toDateString(),
            // 'ADMIN_GENDER'     =>   'required|in:MALE,FEMALE,OTHERS',
            // 'ADMIN_CITY'       =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_COUNTRY'    =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_DISTRICT'   =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_POSTALCODE' =>   'required|max:255|string|regex:/[A-Z0-9]/',
            // 'ADMIN_LEVEL'      =>   'required|max:255|Integer|regex:/[0-9]/',
        ]);

        $imageName = $request->file('file')->getClientOriginalName();
        $request->file('file')->store('public/images');


        return ($imageName);

        // $adminDB = admin::where('ADMIN_ID','!=',$session['ADMIN_ID'])
        //                 ->where(function($query) use ($admin){
        //                     $query->where('ADMIN_EMAIL', $admin['ADMIN_EMAIL'])
        //                     ->orWhere('ADMIN_USERNAME', $admin['ADMIN_USERNAME']);
        //                 })
        //                 ->get();

        // if($adminDB->isEmpty()){
        //     //if data does not exist - update db
        //    admin::where('ADMIN_ID',$session['ADMIN_ID'])
        //       ->update([
        //                 'ADMIN_FNAME' => $admin['ADMIN_FNAME'],
        //                 'ADMIN_LNAME' => $admin['ADMIN_LNAME'],
        //                 'ADMIN_USERNAME' => $admin['ADMIN_USERNAME'],
        //                 'ADMIN_EMAIL' => $admin['ADMIN_EMAIL'],
        //                 'ADMIN_PASSWORD' => $admin['ADMIN_PASSWORD'],
        //                 'ADMIN_TEL' => $admin['ADMIN_TEL'],
        //                 'ADMIN_IMG' => $admin['ADMIN_IMG'],
        //                 'ADMIN_DOB' => $admin['ADMIN_DOB'],
        //                 'ADMIN_GENDER' => $admin['ADMIN_GENDER'],
        //                 'ADMIN_CITY' => $admin['ADMIN_CITY'],
        //                 'ADMIN_COUNTRY' => $admin['ADMIN_COUNTRY'],
        //                 'ADMIN_DISTRICT' => $admin['ADMIN_DISTRICT'],
        //                 'ADMIN_POSTALCODE' => $admin['ADMIN_POSTALCODE'],
        //                 'ADMIN_LEVEL' => $admin['ADMIN_LEVEL']
        //             ]);

        // }else{
        //     //if data does exist - send
        //     $dataExist = 1;
        // }
        // // $AllC = admin::all();

        // if(isset($dataExist)){
        //     // $category=[];

        // }
    //     $category=[];
    //     return view("admin.gig",['gigcategory'=>$AllCategory]);

        $adminDetails = admin::where('ADMIN_ID',$session['ADMIN_ID'])
                         ->get();
        //return view('admin.profileAdmin',['adminDetails'=>$adminDetails]);
    //
}

       /**
     * delete the user's account.
     */
    public function deleteProfile(Request $request)
    {
        return view('login');
    }

}
