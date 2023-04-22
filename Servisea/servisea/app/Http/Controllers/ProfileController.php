<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $adminDetails = admin::all();
        return view('admin.profileAdmin',['adminDetails'=>$adminDetails]);

    }

       /**
     * update the user's account.
     */
    public function updateProfile(Request $request)
    {
        //validation
        $adminInput = $request->validate([
            'ADMIN_FNAME' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'ADMIN_LNAME' => 'required|max:255|string|max:255|regex:/[a-zA-Z]/',
            'ADMIN_MAIL' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'ADMIN_USERNAME' => 'required|max:255|string|max:255|regex:/[a-zA-Z]/',
        ]);

        //$category = $request->input();

        $adminDB = admin::where('ADMIN_MAIL', $adminInput['CATEGORY_NAME'])
                      ->orWhere('ADMIN_USERNAME', $adminInput['CATEGORY_NAME'])
                      ->where('ADMIN_ID','!=', $adminInput['ADMIN_ID'])
                      ->get();

        if($adminDB->isEmpty()){
            //if data does not exist - insert in DB
            $admin_lname = $category['CATEGORY_NAME'];
            $category_description = $category['CATEGORY_DESCRIPTION'];
            DB::table('category')
              ->where('ADMIN_ID', $session['ADMIN_ID'])
              ->update(['' => 1]);
        }else{
            //if data does exist - send
            $dataExist = 1;
        }
        $AllCategory = Category::all();

        if(isset($dataExist)){
            $category=[];
            return view("admin.gig",['dataExist'=>$dataExist,'gigcategory'=>$AllCategory]);

        }
        $category=[];
        return view("admin.gig",['gigcategory'=>$AllCategory]);

        $adminDetails = admin::all();
        return view('admin.profileAdmin',['adminDetails'=>$adminDetails]);
    }

       /**
     * delete the user's account.
     */
    public function deleteProfile(Request $request)
    {
        return view('login');
    }

}
