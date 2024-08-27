@extends('layouts.main')

@section('title', 'About Page')

@section('content')


    <!-- Main Content -->
    <main class="container mx-auto">
       <main class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
        <article class="prose">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </article>
    </main>
        
    </main>
    @endsection  