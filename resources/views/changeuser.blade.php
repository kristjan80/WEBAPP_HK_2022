@extends('common')

@section('content')

<div class="register-form">

<form method="POST" action="/changeuser">
    <h2>User Profile</h2>
    {{ csrf_field() }}
    

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="input-general"  id="email" name="email" value="{{$user->email}}"disabled>
    </div>


    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" class="input-general @error('email') is-invalid @enderror" id="fname" name="fname" value="{{$user->fname}}">
        <label for="lname">Last Name:</label>
        <input type="text" class="input-general" id="lname" name="lname"  value="{{$user->lname}}">
    </div>

    <div class="form-group">
        <label for="dot">Date of Birth:</label>
        <input type="date" class="input-general" id="dot" name="dot"  value="{{$user->dot}}">
    </div>

   
    <div class="form-group">
        <p>Sex:</p>
        <label for="sexm">M</label>
        <input type="radio" class="form-control" id="sexm" name="sex" value="M" {{ ($user->sex=="M")? "checked" : "" }}>
        <label for="sexf">F</label>
        <input type="radio" class="form-control" id="sexf" name="sex" value="F" {{ ($user->sex=="F")? "checked" : "" }}>
    </div>

    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn-confirm">Submit Changes</button>
    </div>
   
</form>

<form method="GET" action="/changepassword">
    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn-negative">Password Change</button>

    </div>
</form>
    

</div>

@endsection