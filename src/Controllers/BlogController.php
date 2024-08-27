<?php

namespace App\Controllers;

use App\Controller;
use Symfony\Component\Yaml\Yaml;

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

                    $post = $this->parseMarkdownFile($filePath, $postContent);

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
        // Split the front matter and the content
        list($frontMatter, $markdownContent) = $this->splitFrontMatter($content);

        // Parse the front matter as YAML
        $data = Yaml::parse($frontMatter);

        // Extract the title from the Markdown content if not provided in the front matter
        $title = $data['title'] ?? trim(explode("\n", $markdownContent)[0], "# ");
        $excerpt = substr(strip_tags($markdownContent), 0, 100) . '...';

        return [
            'id' => pathinfo($filePath, PATHINFO_FILENAME),
            'title' => $title,
            'excerpt' => $excerpt,
            'content' => $markdownContent,
            'img' => $data['img'] ?? null, // Get image from front matter
        ];
    }

    protected function splitFrontMatter($content)
    {
        // Extract front matter
        $pattern = '/^---\s*(.*?)\s*---\s*(.*)$/s';
        if (preg_match($pattern, $content, $matches)) {
            return [$matches[1], $matches[2]];
        }

        return [null, $content];
    }

    public function show($params)
    {
        $postId = $params['id'];
        $post = $this->getPostById($postId);

        if ($post) {
            $this->render('post', ['post' => $post]);
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
