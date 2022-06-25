<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class RegistrationController extends Controller
{
    //
    public function create(){
        return view("register");
    }

    public function dataToDatabase()
    {

        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'dot' => 'required',
            'sex' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $user = User::create(request(['fname', 'lname','dot','sex','email','password']));
        } catch (Exception $e) {
            return redirect('/register')->with('error', 'Somebody already has that email');
        }
        
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}
