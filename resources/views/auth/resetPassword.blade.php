@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="container py-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="h4 text-center font-weight-bold mb-4">
                            Sign in to your account
                        </h1>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email" class="form-label">
                                    {{ __('E-Mail Address') }}
                                </label>
                                <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="form-control" placeholder="name@company.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    {{ __('Password') }}
                                </label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">
                                    {{ __('Confirm Password') }}
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <div class="form-group  mt-2">
                                <button type="submit" class="btn btn-primary btn-block ">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection