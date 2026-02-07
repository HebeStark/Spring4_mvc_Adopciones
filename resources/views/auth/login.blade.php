@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h1 class="auth-title">Login Administrador</h1>

    @if($errors->any())
        <div class="auth-errors">{{ $errors->first() }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary full-width">
        Entrar
    </button>
    </form>
</div>
@endsection