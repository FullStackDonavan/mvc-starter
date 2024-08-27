<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link href="/styles/assets/tailwind.css" rel="stylesheet">
    <script defer src="/scripts/main.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <?php include("layout/nav.php"); ?>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
        <article class="prose">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </article>
    </main>

    <!-- Footer -->
    <?php include("layout/footer.php"); ?>
</body>
</html>
