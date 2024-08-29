<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.10/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">WordPress Posts</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-xl font-bold mb-2"><?php echo e($post['title']['rendered']); ?></h2>
                    <p class="text-gray-700 mb-4"><?php echo e(strip_tags($post['excerpt']['rendered']), 150); ?></p>
                    <a href="<?php echo e($post['link']); ?>" class="text-blue-500 hover:underline">Read more</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</body>
</html>
<?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/wpposts.blade.php ENDPATH**/ ?>