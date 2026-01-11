@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-16 bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-violet-700 mb-6 text-center">Login Administrador</h1>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{} $errors->first() }
        </div>
    @endif
    
    <form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="mb-4">
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
    </div>

    <button class="w-full bg-violet-700 text-white py-2 rounded hover:bg-violet-800 transition">
        Entrar
    </button>
    </form>
</div>
@endsection