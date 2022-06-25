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

    
           $news = new News($newsTitle,$newsContent, $exp);
           if($news->validate()) {
                $image = new Image($imgName,request()->file("img"),$alt);
                if($image->validate()) {
                    $image->store();
                    $news->store($image);
                    return redirect('addnews')->with('status', 'News was added');
                }
                else {
                    // No photo
                    return redirect('addnews')->with('status', 'News was added without an image');
                }
                
           }else {
                return back()->withErrors([
                    'message' => 'Check your input!'
                ]);
           }
           

    }

    public function getNews() {
        $newsArray = News::queryNews();

        return view('home',compact('newsArray'));
        
    }
    
}