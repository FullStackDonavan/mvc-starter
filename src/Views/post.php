<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link href="/styles/assets/tailwind.css" rel="stylesheet">
    <script defer src="/scripts/main.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
<!-- Header -->
<?php include("layout/nav.php") ?>
<?php if ($postContent !== null): ?>
        <h1>Blog Post <?php echo htmlspecialchars($id); ?></h1>
        <p><?php echo htmlspecialchars($postContent); ?></p>
    <?php else: ?>
        <h1>Post Not Found</h1>
        <p>The post you are looking for does not exist.</p>
    <?php endif; ?>
<!-- Header -->
<?php include("layout/footer.php") ?>