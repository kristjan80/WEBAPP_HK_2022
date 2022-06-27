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
            return redirect('/')->with('error', 'Log in to use this functionality');
        }
    }

    public function uploadImage() {
        // Check alt value and set it to none if it is empty

        
        $this->validate(request(), [
            'title' => 'required|min:2|string|max:50'
        ]);


        

        $alt = strip_tags(request('alt'));
        if(!isset($alt) || empty($alt)) {
            $alt = "None";
        }
        // Validate the image. Must meet the requirements
        $validatedData = request()->validate([
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
           // Create image object based on the image model. Validate some image values, store it locally and int othe database
           $imgName = strip_tags(time().'.'.request()->file('img')->getClientOriginalName());
                $image = new Image($imgName,request()->file("img"),$alt);
                if($image->validate()) {
                    $image->store();
                    return redirect('uploadimage')->with('message', 'File was uploaded');
                }
                else {
                    return redirect('uploadimage')->with('message', 'Validate your input values');
                }
                

        }

}