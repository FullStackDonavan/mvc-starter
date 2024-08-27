@extends('layouts.main')

@section('title', 'Blog')

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center">Blog Index</h1>
    
        @if(isset($posts) && is_array($posts) && count($posts) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <a href="{{ base_url('blog/' . $post['id']) }}">
                            <img src="{{ asset('path/to/your/image.jpg') }}" alt="{{ $post['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-2xl font-semibold mb-2 text-blue-600 hover:text-blue-800">
                                    {{ $post['title'] }}
                                </h2>
                                <p class="text-gray-700 mb-4">
                                    {{ $post['excerpt'] }}
                                </p>
                                <span class="text-blue-500 font-semibold">Read More</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">No blog posts found.</p>
        @endif
    </main>
    @endsection  
