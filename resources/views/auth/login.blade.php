@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container p-5">

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-10 border rounded mb-2 p-3">
            <div class="row">
            <div class="col-md-6">
                    
                    <img src="{{ asset('images/login.svg') }}" alt="Image" class="img-fluid grayscale-img">
                </div>
                <div class="col-md-6">
                    <h1 class="text-center">Login</h1>
                    <form action="{{route('loginUser')}}" method="POST" onsubmit="return validateLogin()">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" value="login" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <hr>
                    <p class="text-center">Don't have an account? <a href="{{route('register')}}">Create one</a></p>
                    <p class="text-center">Forgot your password? <a href="{{route('password.request')}}">Reset it</a></p>
                </div>
               
            </div>
        </div>
    </div>
</div>



@endsection


