@extends('common')

@section('content')



<div class="register-form">
    <form method="POST" action="/changepassword">
        <h2>Password change</h2>
        {{ csrf_field() }}

        <div class="form-group">
            <label for="oldp">Old Password</label>
            <input type="password" class="input-general" id="oldp" name="oldp">
        </div>

        <div class="form-group">
            <label for="newp">New Password</label>
            <input type="password" class="form-control" id="newp" name="newp">
        </div>

        <div class="form-group">
            <label for="newpr">Repeat Password</label>
            <input type="password" class="form-control" id="newpr" name="newpr">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn-confirm">Submit</button>
        </div>
@endsection