<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Index</title>
    <link href="/styles/assets/tailwind.css" rel="stylesheet">
    <script defer src="/scripts/main.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <?php include("layout/nav.php"); ?>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-6 text-center">Blog Index</h1>

        <?php if (isset($posts) && is_array($posts) && count($posts) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($posts as $post): ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <a href="/blog/<?php echo htmlspecialchars($post['id']); ?>">
                            <img src="/path/to/your/image.jpg" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-2xl font-semibold mb-2 text-blue-600 hover:text-blue-800">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </h2>
                                <p class="text-gray-700 mb-4">
                                    <?php echo htmlspecialchars($post['excerpt']); // Assuming you have an excerpt field ?>
                                </p>
                                <span class="text-blue-500 font-semibold">Read More</span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600">No blog posts found.</p>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php include("layout/footer.php"); ?>
</body>
</html>
