<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionManager extends Controller
{
    // Not much here currently. Made because maybe i want to implement persistent sessions and that sort of things
    public function endSession()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
} 
 
