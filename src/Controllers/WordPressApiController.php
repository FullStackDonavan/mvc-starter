<?php

namespace App\Controllers;

use App\HttpClient;
use Jenssegers\Blade\Blade;

class WordPressApiController
{
    protected $httpClient;
    protected $viewPath;
    protected $cachePath;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->viewPath = __DIR__ . '/../Views';
        $this->cachePath = __DIR__ . '/../Cache';
    }

    public function fetchPosts()
    {
        // Fetch posts from the API
        $response = $this->httpClient->get('posts');
        $posts = json_decode($response, true);

        // Use Blade to render the view with posts
        $blade = new Blade($this->viewPath, $this->cachePath);
        echo $blade->make('wpposts', ['posts' => $posts])->render();
    }

    // Fetch a single post by ID from the WordPress API
    public function fetchPostById($id)
    {
        $response = $this->client->get("/posts/{$id}");
        return $response['response'];
    }

    // Create a new post via the WordPress API
    public function createPost($title, $content, $status = 'draft')
    {
        $data = [
            'title'   => $title,
            'content' => $content,
            'status'  => $status,
        ];
        $response = $this->client->post('/posts', $data);
        return $response['response'];
    }

    // Update an existing post by ID
    public function updatePost($id, $title = null, $content = null, $status = null)
    {
        $data = array_filter([
            'title'   => $title,
            'content' => $content,
            'status'  => $status,
        ]);
        $response = $this->client->put("/posts/{$id}", $data);
        return $response['response'];
    }

    // Delete a post by ID
    public function deletePost($id)
    {
        $response = $this->client->delete("/posts/{$id}");
        return $response['response'];
    }
}
