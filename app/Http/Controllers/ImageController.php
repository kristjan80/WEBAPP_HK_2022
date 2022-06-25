<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    
    public function create()
    {
        if(auth()->check()) {
            return view('uploadimage');
        }
        else {
            return redirect('/')->with('status', 'Log in to use this functionality');
        }
    }

    public function uploadImage() {
        $alt = strip_tags(request('alt'));
        if(!isset($alt) || empty($alt)) {
            $alt = "None";
        }

        $validatedData = request()->validate([
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $imgName = strip_tags(time().'.'.request()->file('img')->getClientOriginalName());
                $image = new Image($imgName,request()->file("img"),$alt);
                if($image->validate()) {
                    $image->store();
                    return redirect('uploadimage')->with('status', 'File was uploaded');
                }
                else {
                    return redirect('uploadimage')->with('status', 'Validate your input values');
                }
                

        }

}