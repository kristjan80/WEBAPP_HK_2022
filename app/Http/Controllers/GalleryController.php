<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class GalleryController extends Controller
{
    
    public function create()
    {
        if(!auth()->check()) {
            // If you are not logged in you can only see public images
            $privacy = 2;
        }

        

        return view('gallery');
    }
}