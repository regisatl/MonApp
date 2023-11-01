@extends('base')

@section('content')
    <div class="container card col-sm-6 p-0 mt-5">
        <div class="card-header">
            <h1 class="text-center">Sign In</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                  @csrf
                <div class="mb-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email address" name="email" value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_token" name="remember_token">
                        <label class="form-check-label font-bold" for="remember_token"><strong>Remember me</strong></label>
                        @error('remember_token')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3"><strong>Login</strong></button>
            </form>
        </div>
    </div>
@endsection
