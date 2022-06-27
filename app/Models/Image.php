<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
// Datamodel for Image. Deals with Image validation and storing.

class Image extends Model
{
    use HasFactory;
    
    
    static $PATH = "public/img";
    public function __construct($name,$image,$alt)
    {
        $this->name = $name;
        $this->alt = $alt;
        $this->image = $image;
        $this->privacy = 2;
    }

    public function store() {
        $this->storeLocally();
        $this->saveToDatabase();
    }

    private function storeLocally() {
      
        $this->image->move(public_path('img/'), $this->name);
        $this->newPath= public_path('img/',$this->name);
        echo public_path('img/'), $this->name ;
    }
    
    private function resizeImage() {
    
    }

    public function validate() {
        if(!isset($this->name) || !isset($this->image)) {
            return false;
        }
        else return true;
    }

    public function saveToDatabase() {
        $tableExist=Schema::connection('mysql')->hasTable('photos');
        if($tableExist){
            $this->id = DB::table('photos')->insertGetId(['userid' => Auth::id(),'filename' => $this->name,'path' => $this->newPath,'privacy' => $this->privacy, 'alttext' => $this->alt]);
        }
    }

    public static function getImages($priv) {
        $tableExist=Schema::connection('mysql')->hasTable('photos');
        if($tableExist){
            $res = DB::connection('mysql')->table('photos')->select('*')->where('privacy','>=',$priv);
        }
        return $res;
    }
}
