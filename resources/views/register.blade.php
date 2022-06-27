@extends('common')
@section('content')

<div class="register-form">
    <form method="POST" action="/register">
        
        <h2>Register</h2>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="input-general" id="fname" name="fname">
            <label for="lname">Last Name:</label>
            <input type="text" class="input-general" id="lname" name="lname">
        </div>

        <div class="form-group">
            <label for="dot">Date of Birth:</label><br>
            <input type="date" class="input-general" id="dot" name="dot">
        </div>

       
        <div class="form-group">
            <h3>Sex:</h3>
            <label for="sexm">M</label>
            <input type="radio" class="form-control" id="sexm" name="sex" value="M">
            <label for="sexf">F</label>
            <input type="radio" class="form-control" id="sexf" name="sex" value="F">
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="input-general" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn-confirm">Submit</button>

        </div>
       
    </form>
</div>
@endsection