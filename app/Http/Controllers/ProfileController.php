<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function createEditProfile() {
        if(auth()->check()) {
            $user = Auth::user();
            return view('changeuser',compact('user'));
        }
        else {
            return redirect('/')->with('error', 'Log in to use this functionality');
        }
    }

    public function createEditPassword() {
        if(auth()->check()) {
            return view('changepassword');
        }
        else {
            return redirect('/')->with('error', 'Log in to use this functionality');
        }
    }

    public function editProfile() {
        // Validation rules for profile values
        $this->validate(request(), [
            'fname' => 'required|min:2|string|max:50',
            'lname' => 'required|min:2|string|max:20',
            'dot' => 'required',
            'sex' => 'required',
        ]);
        // Overwrite the values and store them in database
        $user = Auth::user();
        $user->fname = strip_tags(request()->fname);
        $user->lname = strip_tags(request()->lname);
        $user->dot = strip_tags(request()->dot);
        $user->sex = strip_tags(request()->sex);
        $user->save();

        return redirect('/changeuser')->with('message',"User info was changed");

    }

    public function editPassword() {
        // Validation rules for passwords
        $this->validate(request(), [
            'oldp' => 'required',
            'newp' => 'required|min:6|string|max:50',
            'newpr' => 'required|min:6|string|max:50'
        ]);

        $user = Auth::user();
        // Check if the old password is correct and if the two new passwords match
        if (!Hash::check(request()->oldp, $user->password)) {
            return redirect('/changepassword')->with('error',"Old password value was incorrect!");
            // This could be done in validation rules aswell with confirmed:newp rule for newpr
        }
        else if (request()->newp != request()->newpr) {
            return redirect('/changepassword')->with('error',"Passwords dont match!");
        }
        else {
            $user->password = request()->newp;
            $user->save();
            return redirect('/changepassword')->with('message',"Password changed");
        }

       
    }


}