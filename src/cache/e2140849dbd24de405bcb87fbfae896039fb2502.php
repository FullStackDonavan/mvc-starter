

<?php $__env->startSection('title', 'Post Page'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components.breadcrumb', [
        'breadcrumbs' => [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Blog Page', 'url' => '/blog'],
            ['title' => 'Post', 'url' => '']
        ]
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="container mx-auto">
       <main class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
        <article class="prose">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </article>
        </main>
    </main>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/post.blade.php ENDPATH**/ ?>