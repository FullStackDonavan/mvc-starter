<?php

namespace App\Controllers;

use App\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = $this->getAllPosts();
        $this->render('blog', ['posts' => $posts]);
    }

    protected function getAllPosts()
    {
        $postsDirectory = __DIR__ . '/../content/posts/';
        $posts = [];

        if (is_dir($postsDirectory)) {
            foreach (scandir($postsDirectory) as $file) {
                if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'md') {
                    $filePath = $postsDirectory . $file;
                    $postContent = file_get_contents($filePath);

                    // Extract metadata and content from the markdown file
                    $post = $this->parseMarkdownFile($filePath, $postContent);

                    // Add the post to the list if it was parsed successfully
                    if ($post) {
                        $posts[] = $post;
                    }
                }
            }
        }

        return $posts;
    }

    protected function parseMarkdownFile($filePath, $content)
    {
        // Example: Basic parsing of markdown (you can enhance this with a library)
        // Assuming the first line is the title, and the rest is the content

        $lines = explode("\n", $content);
        $title = trim($lines[0], "# ");
        $excerpt = substr(strip_tags($content), 0, 100) . '...';

        return [
            'id' => pathinfo($filePath, PATHINFO_FILENAME),
            'title' => $title,
            'excerpt' => $excerpt,
            'content' => $content,
        ];
    }

    public function show($params)
    {
        $postId = $params['id'];
        $post = $this->getPostById($postId);

        if ($post) {
            $this->render('blog-post', ['post' => $post]);
        } else {
            echo "Post not found";
        }
    }

    protected function getPostById($id)
    {
        $filePath = __DIR__ . '/../content/posts/' . $id . '.md';

        if (file_exists($filePath)) {
            $postContent = file_get_contents($filePath);
            return $this->parseMarkdownFile($filePath, $postContent);
        }

        return null;
    }
}
