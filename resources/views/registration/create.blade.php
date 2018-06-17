@extends('layout.blog-master')

@section('content')
    <div class="col-sm-8">
        <h1>Register</h1>
        
        <form method="POST" action="/register">
            
            {{ csrf_field() }}

            @include('layout.errors')
            
            <div class="form-group">
                
                <label for="name">Name:</label>
                
                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        
    </form>
</div>
    @endsection