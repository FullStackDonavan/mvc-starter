

<?php $__env->startSection('title', 'About Page'); ?>
<?php $__env->startSection('description', 'About Page description for seo'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">About Our MVC Framework</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <p class="text-gray-700 mb-4">
                Welcome to our custom-built MVC (Model-View-Controller) framework. This framework is designed with simplicity and flexibility in mind, allowing developers to create powerful web applications with ease.
            </p>
            <p class="text-gray-700 mb-4">
                Our MVC framework is built using PHP and leverages the Blade templating engine to provide a clean and intuitive way to build dynamic web pages. It also integrates Vue.js for creating reactive and interactive user interfaces, enabling a modern front-end experience alongside a robust backend structure.
            </p>
            <p class="text-gray-700 mb-4">
                Key features of our MVC framework include:
            </p>
            <ul class="list-disc pl-5 mb-4">
                <li>Easy-to-use routing system for defining and managing application routes.</li>
                <li>Support for Blade templating to create clean and dynamic views.</li>
                <li>Separation of concerns, ensuring that your application's logic, presentation, and data handling are neatly organized.</li>
                <li>Integration with modern front-end tools like Tailwind CSS and Vue.js for building interactive user interfaces.</li>
            </ul>
            <p class="text-gray-700 mb-4">
                Whether you're building a small personal project or a large enterprise application, our MVC framework provides the tools and structure you need to succeed. We hope you enjoy using it as much as we've enjoyed building it!
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>     

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\_LEARNING\mvc-starter\src\Views/about.blade.php ENDPATH**/ ?>