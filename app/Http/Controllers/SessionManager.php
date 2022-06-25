<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionManager extends Controller
{
    public function endSession()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
} 
 
