@extends('layouts.app')
@section('title', 'Login')
@section('content')
<h1>Login</h1>

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
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" style="width: 100%; margin-top: 1rem;">Login</button>
    </form>

    <p style="text-align: center; margin-top: 1rem;">
        Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </p>
</div>
@endsection
