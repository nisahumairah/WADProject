@extends('master.layout') {{-- Or any layout you're using --}}
@section('content')
    <div class="container mt-5">
        <h1>Your Profile</h1>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        {{-- Add more profile details here --}}
    </div>
@endsection
