<!-- Header -->
<?php include("layout/header.php") ?>
<?php if ($postContent !== null): ?>
        <h1>Blog Post <?php echo htmlspecialchars($id); ?></h1>
        <p><?php echo htmlspecialchars($postContent); ?></p>
    <?php else: ?>
        <h1>Post Not Found</h1>
        <p>The post you are looking for does not exist.</p>
    <?php endif; ?>
<!-- Header -->
<?php include("layout/footer.php") ?>