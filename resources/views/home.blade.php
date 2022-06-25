@extends('common')

@section('content')
        <div class="news-body">
            @foreach ($newsArray as $news)
            <div class="news">
                <h1 class="news-title" name="title"> {{ucfirst($news->title)}} </h1>
                <img class="news-image" name="image" src="{{"img/" .$news->filename}}">
                <p class="news-content" name="content"> {{$news->content}}</p>
                <p class="news-adder" name="poster"> {{ucwords($news->fname) . " " . ucwords($news->lname)}} RIF21</p>
                <p class="news-added" name="added"> {{$news->added}} </p>

            </div>
            @endforeach
            
      
        
@endsection