@extends('master.layout')
@section('title', 'Motivation Details')
@section('content')

<div class="p-4">
    <h2 class="text-2xl font-bold">{{ $motivation->quote }}</h2>
    @if($motivation->image)
        <img src="{{ asset('storage/' . $motivation->image) }}" alt="Motivation Image" class="mt-2">
    @endif
    <p class="mt-2">{{ $motivation->description }}</p>
    <p class="text-sm text-gray-500 mt-2">{{ $motivation->category }}</p>
</div>
