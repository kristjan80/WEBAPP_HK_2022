<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }
    
    public function authenticate()
    {
        // Check if the email and password values are correct. If not, 
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return redirect('/login')->with('error',"Incorrect credentials");
        }
        
        return redirect()->to('/');
    }
    
}