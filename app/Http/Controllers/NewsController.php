<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\News;

class NewsController extends Controller
{
    public function create()
    {
        if(auth()->check()) {
            return view('addnews');
        }
        else {
            return redirect('/')->with('error', 'Log in to use this functionality');
        }
    }
    
    public function addNews() {
        // Get input values and strip them of tags for security reasons. Makes XSS pretty much impossible.
        // SQLi is also prevented because query function in Laravel uses prepared statements
        // File is also validated. Not 100% perfect. Pretty sure i could add some PHP into the metafields of the image. But i disabled PHP for images directory
        // So... no problems

        $this->validate(request(), [
            'title' => 'required|min:2|string|max:50',
            'content' => 'required|min:2|string|max:1000',
            'exp' => 'required'
        ]);


        $newsTitle = strip_tags(request('title'));
        $newsContent = strip_tags(request('content'));
        $exp = strip_tags(request('exp'));
        $alt = strip_tags(request('alt'));
        if(!isset($alt) || empty($alt)) {
            $alt = "None";
        }



        $validatedData = request()->validate([
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $imgName = strip_tags(time().'.'.request()->file('img')->getClientOriginalName());

           // Create new images object based on the model. Validate the sent in values (are there any for example) 
           // After that, if there is a image, create the object for that, validate and store
           // Then add everything to database aswell.
           $news = new News($newsTitle,$newsContent, $exp);
           if($news->validate()) {
                $image = new Image($imgName,request()->file("img"),$alt);
                if($image->validate()) {
                    $image->store();
                    $news->store($image);
                    return redirect('addnews')->with('message', 'News article was added');
                }
                else {
                    // No photo
                    return redirect('addnews')->with('message', 'News article was added without an image');
                }
                
           }else {
                return redirect('/addnews')->with('error','Check your input!');
           }
           

    }

    public function getNews() {
        // Get latest 5 news and display them using the template.
        $newsArray = News::queryNews();

        return view('home',compact('newsArray'));
        
    }
    
}