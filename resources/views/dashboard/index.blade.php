@extends('layouts.main')

@section('container')
    <h1>Hello, {{ auth()->user()->name ?? 'User' }}!</h1>
    <p>Welcome to your dashboard.</p>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
