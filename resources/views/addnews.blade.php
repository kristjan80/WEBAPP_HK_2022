@extends('common')
@section('content')
        <div class="news-body">
            <form class="form-group"  method="POST" action="/addnews" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="title">Title</label>
                <input type="text" class="input-general" id="title" name="title">
                <label for="content">Content:</label>
                <input type="text" class="input-general" id="content" name="content">
                <label for="exp">Expires:</label>
                <input type="date" class="input-general" id="exp" name="exp">
                <label for="img">Image</label>
                <input type="file" class="input-general" id="img" name="img">

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn-confirm">Submit</button>
        
                    <button style="cursor:pointer" type="submit" class="btn-negative" id="back" name="back">Back</button>
                </div>
            </div>

        </div>
@endsection