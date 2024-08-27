

<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="container mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center">Blog Index</h1>
    
        <?php if(isset($posts) && is_array($posts) && count($posts) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <a href="<?php echo e(base_url('blog/' . $post['id'])); ?>">
                            <img src="<?php echo e(asset('path/to/your/image.jpg')); ?>" alt="<?php echo e($post['title']); ?>" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-2xl font-semibold mb-2 text-blue-600 hover:text-blue-800">
                                    <?php echo e($post['title']); ?>

                                </h2>
                                <p class="text-gray-700 mb-4">
                                    <?php echo e($post['excerpt']); ?>

                                </p>
                                <span class="text-blue-500 font-semibold">Read More</span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600">No blog posts found.</p>
        <?php endif; ?>
    </main>
    <?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/blog.blade.php ENDPATH**/ ?>