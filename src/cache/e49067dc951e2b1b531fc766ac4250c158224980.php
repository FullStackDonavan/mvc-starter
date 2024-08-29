

<?php $__env->startSection('title', 'WordPress Posts'); ?>
<?php $__env->startSection('description', 'WordPress Posts description for SEO'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">WordPress Posts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <a href="<?php echo e($post['link']); ?>">
                        <img src="<?php echo e($post['jetpack_featured_media_url'] ?? '/img/1.jpg'); ?>" alt="<?php echo e($post['title']['rendered']); ?>" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-2 text-blue-600 hover:text-blue-800">
                                <?php echo e($post['title']['rendered']); ?>

                            </h2>
                            <p class="text-gray-700 mb-4">
                                <?php echo e(strip_tags($post['excerpt']['rendered'])); ?>

                            </p>
                            <span class="text-blue-500 font-semibold">Read More</span>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/wpposts.blade.php ENDPATH**/ ?>