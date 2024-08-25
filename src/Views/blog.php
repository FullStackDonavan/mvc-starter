<!-- Header -->
<?php include("layout/header.php") ?>
<!-- Main Content -->
<main class="container mx-auto p-4">
    <!-- Main Content -->
    <h1>Blog Index</h1>
    <?php if (isset($posts) && is_array($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <h2><a href="/blog/post/<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No blog posts found.</p>
    <?php endif; ?>
    </main>
<!-- Footer -->
<?php include("layout/footer.php") ?>
