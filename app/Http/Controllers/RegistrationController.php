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
        // Validate the input values
        $this->validate(request(), [
            'fname' => 'required|min:2|string|max:20',
            'lname' => 'required|min:2|string|max:20',
            'dot' => 'required',
            'sex' => 'required',
            'email' => 'required|email|min:10|string|max:60',
            'password' => 'required|min:6|string|max:50'
        ]);
        // if validation succeeds, try to send data to database. if it fails, give back the error
        try {
            $user = User::create(request(['fname', 'lname','dot','sex','email','password']));
        } catch (Exception $e) {
            return redirect('/register')->with('error', 'Account with that email already exists!');
        }
        
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}
