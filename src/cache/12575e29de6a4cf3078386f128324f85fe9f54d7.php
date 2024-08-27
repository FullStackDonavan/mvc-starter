<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link href="/styles/assets/tailwind.css" rel="stylesheet">
    <link href="/js/assets/main-Ca6_g_Rz.css" rel="stylesheet">

    <script defer src="/scripts/main.js"></script>
    <script src="/js/assets/main-BKLs60v0.js" defer></script>
    
</head>
<body>


    <!-- Navigation Bar -->
    <header class="bg-gray-800 text-white">
        <nav class="container mx-auto flex items-center justify-between p-4 relative">
            <a href="/" class="text-2xl font-bold">Starter MVC Framework</a>
            <button id="menu-button" class="block lg:hidden text-gray-300 hover:text-white focus:outline-none z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <ul id="menu" class="hidden lg:flex lg:items-center lg:space-x-4 absolute lg:static lg:bg-transparent lg:flex-row lg:space-x-4 bg-gray-800 w-full left-0 top-full mt-1 lg:mt-0 lg:w-auto">
                <li><a href="/" class="block px-4 py-2 text-gray-300 hover:text-white">Home</a></li>
                <li><a href="/about" class="block px-4 py-2 text-gray-300 hover:text-white">About</a></li>
                <li><a href="/blog" class="block px-4 py-2 text-gray-300 hover:text-white">Blog</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
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
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 MyWebsite. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/blog.blade.php ENDPATH**/ ?>