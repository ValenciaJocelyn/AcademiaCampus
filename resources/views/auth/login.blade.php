@extends('layouts.guest')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="form-box">
        <h2>Welcome Back</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus />
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Password" required />
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="options">
                <label><input type="checkbox" name="remember"> Keep me logged in</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
            </div>

            <button type="submit" class="login-btn">Log In</button>
        </form>

        <p class="signup-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </p>
    </div>
</div>
@endsection
