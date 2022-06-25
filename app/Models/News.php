<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

static $PATH = "public/img";

class News extends Model
{
    use HasFactory;
    
    public function __construct($name, $content, $exp)
    {
        $this->name = $name;
        $this->content = $content;
        $this->exp = $exp;
    }

    public function store($image) {
        $this->storeInDatabase($image);
    }

    public function storeInDatabase($image) {
        $tableExist=Schema::connection('mysql')->hasTable('news');
        if($tableExist){
            DB::connection('mysql')->table('news')->insert(['title'=>$this->name,'content'=>$this->content, 'expire'=>
            $this->exp,'userid'=>Auth::id(), 'photoid'=>$image->id]);
        }
    }

    public static function queryNews() {
        $count = 5;
        
        $tableExist=Schema::connection('mysql')->hasTable('news');
        if($tableExist){
            $res = DB::connection('mysql')->table('news')->select('*')->join('users', 'news.userid','=','users.id')->leftJoin
            ('photos','photos.id','=','news.photoid')->orWhereNull('news.deleted')->orderBy('added', 'desc')->limit($count)->get();
        }
        return $res;

    }

    public function validate() {
        if(!isset($this->name) || !isset($this->content) || !isset($this->exp)) {
            return false;
        }
        else return true;
    }
    
}
