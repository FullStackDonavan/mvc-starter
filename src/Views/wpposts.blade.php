@extends('layouts.main')

@section('title', 'WordPress Posts')
@section('description', 'WordPress Posts description for SEO')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">WordPress Posts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <a href="{{ $post['link'] }}">
                        <img src="{{ $post['jetpack_featured_media_url'] ?? '/img/1.jpg' }}" alt="{{ $post['title']['rendered'] }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-2 text-blue-600 hover:text-blue-800">
                                {{ $post['title']['rendered'] }}
                            </h2>
                            <p class="text-gray-700 mb-4">
                                {{ strip_tags($post['excerpt']['rendered']) }}
                            </p>
                            <span class="text-blue-500 font-semibold">Read More</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
