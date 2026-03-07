@extends('layouts.app')
@section('title', 'Register')
@section('content')
<h1>Register</h1>

@if($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="max-width: 400px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        
        <button type="submit" style="width: 100%; margin-top: 1rem;">Register</button>
    </form>

    <p style="text-align: center; margin-top: 1rem;">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
    </p>
</div>
@endsection
