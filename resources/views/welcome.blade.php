@extends('layouts.maste')
@section('title')
    Welcome
    @endsection
@section('content')
    @include('includes.message')
    <div class="row">
        <div class="container">
        <div class="col-md-6">
            <form action={{ route('signup') }} method="post">
                <h3>Sign Up</h3>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-group" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="firt_name">First Name</label>
                    <input class="form-group" type="text" name="first_name" id="firt_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-group" type="password" name="password" id="passsword">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value={{Session::token()}}>
            </form>
        </div>
        <div class="col-md-6">
            <form action={{ route('signin') }} method="post">
                <h3>Login</h3>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-group" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-group" type="password" name="password" id="passsword">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value={{Session::token()}}>
            </form>
        </div>
    </div>
    </div>
@endsection