<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <link href="/styles/assets/tailwind.css" rel="stylesheet">
    <link href="/js/assets/main-Ca6_g_Rz.css" rel="stylesheet">

    <script defer src="/scripts/main.js"></script>
    <script src="/js/assets/main-BKLs60v0.js" defer></script>
</head>
<body>
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

    <main class="">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Starter MVC Framework. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/layouts/main.blade.php ENDPATH**/ ?>