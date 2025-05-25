@extends('layouts.guest')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="form-box">
        <h2>Create an account</h2>

        <p class="description">
            Academia Campus is a digital platform that supports the academic development of students and faculty through resources and collaboration tools.
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- Nama Lengkap --}}
            <div class="input-row">
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Full Name"
                    required 
                    autofocus
                    class="@error('name') input-error @enderror"
                />
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                {{-- Username digabung dengan Last Name placeholder (karena di html gak ada username, tapi kamu butuh di backend) --}}
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Username"
                    required
                    class="@error('username') input-error @enderror"
                />
                @error('username')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email dan No HP --}}
            <div class="input-row">
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email"
                    required
                    class="@error('email') input-error @enderror"
                />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                <input
                    id="no_hp"
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Phone"
                    required
                    class="@error('no_hp') input-error @enderror"
                />
                @error('no_hp')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password dan Confirm Password --}}
            <div class="input-row">
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="@error('password') input-error @enderror"
                />
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                    class="@error('password_confirmation') input-error @enderror"
                />
                @error('password_confirmation')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Sign Up</button>
        </form>

        <p class="signin-link">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
    </div>
</div>
@endsection
