<?php
namespace App\Controllers;

use App\Models\HttpClient;
use Jenssegers\Blade\Blade;

use Exception;

class WordPressApiController
{
    protected $httpClient;
    protected $viewPath;
    protected $cachePath;

    public function __construct()
    {
        $baseUrl = getenv('API_BASE_URL');
        $this->httpClient = new HttpClient('http://localhost/wordpress/wp-json/wp/v2/', [
            'Authorization: Basic ' . base64_encode(getenv('admin') . ':' . 'InO2 eRTu GlRJ oTz5 2S49 NQdR')
        ]);
        $this->viewPath = __DIR__ . '/../Views';
        $this->cachePath = __DIR__ . '/../Cache';
    }

    public function fetchPosts()
    {
        $response = $this->httpClient->get('posts');
        
        if ($response['status_code'] === 200) {
            $posts = $response['response'];
            $blade = new Blade($this->viewPath, $this->cachePath);
            echo $blade->make('wpposts', ['posts' => $posts])->render();
        } else {
            // Log detailed error message for debugging
            throw new \Exception('API request failed with status code: ' . $response['status_code'] . ' and response: ' . json_encode($response['response']));
        }
    }
    


    public function fetchPostById($id)
    {
        $response = $this->httpClient->get("/posts/{$id}");
        return $response['response'];
    }

    public function createPost($title, $content, $status = 'draft')
    {
        $data = [
            'title'   => $title,
            'content' => $content,
            'status'  => $status,
        ];
        $response = $this->httpClient->post('/posts', $data);
        return $response['response'];
    }

    public function updatePost($id, $title = null, $content = null, $status = null)
    {
        $data = array_filter([
            'title'   => $title,
            'content' => $content,
            'status'  => $status,
        ]);
        $response = $this->httpClient->put("/posts/{$id}", $data);
        return $response['response'];
    }

    public function deletePost($id)
    {
        $response = $this->httpClient->delete("/posts/{$id}");
        return $response['response'];
    }
}
