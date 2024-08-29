<nav aria-label="breadcrumb" class="bg-gray-100 p-4 rounded-md shadow-sm">
    <ol class="flex items-center space-x-2 text-gray-700">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($breadcrumb['url'] && !$loop->last): ?>
                <li class="flex items-center">
                    <a href="<?php echo e($breadcrumb['url']); ?>" 
                       class="text-blue-600 hover:text-blue-800 transition-all duration-200 ease-in-out hover:font-bold">
                        <?php echo e($breadcrumb['title']); ?>

                    </a>
                    <!-- Separator -->
                    <span class="mx-2 text-gray-400">/</span>
                </li>
            <?php else: ?>
                <li class="flex items-center text-gray-500">
                    <?php echo e($breadcrumb['title']); ?>

                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>
<?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/components/breadcrumb.blade.php ENDPATH**/ ?>