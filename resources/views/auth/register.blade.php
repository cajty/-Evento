@extends('layouts.app')

@section('content')

<div class="container p-5">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/index.js') }}"></script>
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-10 border rounded mb-2 p-3">
                <div class="row">
                    <div class="col-md-6">

                        <img src="{{ asset('images/login.svg') }}" alt="Image" class="img-fluid grayscale-img">
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-center">Create account</h1>
                        <form action="{{route('accountCreat')}}" method="POST" onsubmit="return validateRegister()">
                            @csrf
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" value="register" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <p class="text-center">Already have an account? <a href="{{route('login')}}">Login</a></p>
                    </div>

                </div>
            </div>

        </div>
    </div>


    @endsection