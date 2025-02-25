@extends('components.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="bg-blue-600 text-white py-20">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl font-bold mb-4">Find Your Dream Job</h1>
            <p class="text-xl mb-8">Search thousands of job opportunities and take the next step in your career.</p>
        </div>
    </div>
    @livewire('home')
@endsection
