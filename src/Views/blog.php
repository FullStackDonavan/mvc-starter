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
    <main class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Blog Index</h1>

        <?php if (isset($posts) && is_array($posts) && count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
                <h2 class="text-2xl font-semibold mt-4">
                    <a href="/blog/<?php echo htmlspecialchars($post['id']); ?>" class="text-blue-500 hover:text-blue-700">
                        <?php echo htmlspecialchars($post['title']); ?>
                    </a>
                </h2>
                <p class="text-gray-700">
                    <?php echo htmlspecialchars($post['excerpt']); // Assuming you have an excerpt field ?>
                </p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No blog posts found.</p>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php include("layout/footer.php"); ?>
</body>
</html>
