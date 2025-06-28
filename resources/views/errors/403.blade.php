@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="text-center mt-16">
    <h1 class="text-4xl font-bold text-red-600">403 - Access Denied</h1>
    <p class="mt-4 text-gray-600">
        Sorry, you don’t have permission to access this page.
    </p>
    <a href="{{ route('user.dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Go to your Dashboard
    </a>
</div>
@endsection
