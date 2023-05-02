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
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    // /* public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**
    //  * Delete the user's account.
    //  */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current-password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }

   /**
     * view the user's account.
     */
    public function viewProfile(Request $request)
    {

        $session= $request->session()->get('adminDetails');
        if(isset($session)){
            $adminDetails = admin::where('ADMIN_ID',$session['ADMIN_ID'])
            ->get();
            return view('admin.profileAdmin',['adminDetails'=>$adminDetails]);
        }else{
            return redirect('login_user');
        }

    }

       /**
     * update the user's account.
     */
    public function updateProfile(Request $request)
    {
        $session= $request->session()->get('adminDetails');
        //validation
        $admin = $request->validate([
            'ADMIN_FNAME'         => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'ADMIN_LNAME'         => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'ADMIN_EMAIL'         => 'required|email|unique:users,USER_EMAIL|unique:admin,ADMIN_EMAIL,'.$session['ADMIN_ID'].',ADMIN_ID',
            'ADMIN_USERNAME'      => 'required|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
            'ADMIN_PASSWORD'   =>  'required|min:8|string|regex:/^[a-zA-Z0-9_]+$/',
            'ADMIN_TEL'           => 'required|max:255|string|regex:/^[0-9+]+$/',
            'ADMIN_IMG'        =>   'image|mimes:jpg,jpeg,gif,png',
            'ADMIN_DOB'        =>   'required|before:'.now()->subYears(18)->toDateString(),
            'ADMIN_GENDER'     =>   'required|in:MALE,FEMALE,OTHERS',
            // 'ADMIN_CITY'       =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_COUNTRY'    =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_DISTRICT'   =>   'required|max:255|string|regex:/[a-zA-Z]/',
            // 'ADMIN_POSTALCODE' =>   'required|max:255|string|regex:/[A-Z0-9]/',
            // 'ADMIN_LEVEL'      =>   'required|max:255|Integer|regex:/[0-9]/',
        ]);

        if($request->hasFile('ADMIN_IMG')){
            $imageName = $request->file('ADMIN_IMG')->getClientOriginalName();
            $request->file('ADMIN_IMG')->storeAs('public/images/',$imageName);

            admin::where('ADMIN_ID',$session['ADMIN_ID'])
               ->update([
                         'ADMIN_FNAME' => $admin['ADMIN_FNAME'],
                         'ADMIN_LNAME' => $admin['ADMIN_LNAME'],
                         'ADMIN_USERNAME' => $admin['ADMIN_USERNAME'],
                         'ADMIN_EMAIL' => $admin['ADMIN_EMAIL'],
                         'ADMIN_PASSWORD' => Hash::make($admin['ADMIN_PASSWORD']),
                          'ADMIN_TEL' => $admin['ADMIN_TEL'],
                          'ADMIN_IMG' => $imageName,
                          'ADMIN_DOB' => $admin['ADMIN_DOB'],
                          'ADMIN_GENDER' => $admin['ADMIN_GENDER'],
        //                 'ADMIN_CITY' => $admin['ADMIN_CITY'],
        //                 'ADMIN_COUNTRY' => $admin['ADMIN_COUNTRY'],
        //                 'ADMIN_DISTRICT' => $admin['ADMIN_DISTRICT'],
        //                 'ADMIN_POSTALCODE' => $admin['ADMIN_POSTALCODE'],
        //                 'ADMIN_LEVEL' => $admin['ADMIN_LEVEL']
                    ]);


        }else{

            admin::where('ADMIN_ID',$session['ADMIN_ID'])
               ->update([
                        'ADMIN_FNAME' => $admin['ADMIN_FNAME'],
                        'ADMIN_LNAME' => $admin['ADMIN_LNAME'],
                        'ADMIN_USERNAME' => $admin['ADMIN_USERNAME'],
                        'ADMIN_EMAIL' => $admin['ADMIN_EMAIL'],
                        'ADMIN_PASSWORD' => Hash::make($admin['ADMIN_PASSWORD']),
                        'ADMIN_TEL' => $admin['ADMIN_TEL'],
                        'ADMIN_DOB' => $admin['ADMIN_DOB'],
                        'ADMIN_GENDER' => $admin['ADMIN_GENDER'],
        //                 'ADMIN_CITY' => $admin['ADMIN_CITY'],
        //                 'ADMIN_COUNTRY' => $admin['ADMIN_COUNTRY'],
        //                 'ADMIN_DISTRICT' => $admin['ADMIN_DISTRICT'],
        //                 'ADMIN_POSTALCODE' => $admin['ADMIN_POSTALCODE'],
        //                 'ADMIN_LEVEL' => $admin['ADMIN_LEVEL']
                    ]);
        }






        $adminDetails = admin::where('ADMIN_ID',$session['ADMIN_ID'])
                         ->get();
        return redirect('admin/profile');

}

       /**
     * delete the user's account.
     */
    public function deleteProfile(Request $request)
    {
        return view('login');
    }

}
