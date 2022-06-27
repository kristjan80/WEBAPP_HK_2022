@extends('common')
@section('content')

    <div class="register-form">
    
    <form method="POST" action="/login">
        <h2>Log In</h2>
        {{ csrf_field() }}

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

            <button style="cursor:pointer" type="submit" class="btn-negative" id="back" name="back">Back</button>
        </div>
       
    </form>

</div>
@endsection

