@extends('common')
@section('content')
        <div class="news-body">
            <form class="form-group"  method="POST" action="/uploadimage" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="title">Title</label>
                <input type="text" class="input-general" id="title" name="title">
                <label for="alt">Alt text:</label>
                <input type="text" class="input-general" id="alt" name="alt">
                <p>Privacy</p>
                <label for="priv0">0</label>
                <input type="radio" class="form-control" id="priv0" name="priv" value="0">
                <label for="priv1">1</label>
                <input type="radio" class="form-control" id="priv1" name="priv" value="1">
                <label for="priv2">2</label>
                <input type="radio" class="form-control" id="priv2" name="priv" value="2">
                <br>
                <label for="img">Image</label>
                <input type="file" class="input-general" id="img" name="img">

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn-confirm">Submit</button>
        
                    <button style="cursor:pointer" type="submit" class="btn-negative" id="back" name="back">Back</button>
                </div>
            </div>
          
        </div>
@endsection