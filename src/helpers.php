<?php
// In a custom helpers file or the bootstrap file
function base_url($path = '')
{
    $config = require __DIR__ . '/config/app.php';
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}

// Usage in Blade template
//<a href="{{ custom_url('post/' . $post['id']) }}">Read more</a>


function asset($path = '')
{
    // Define your base URL or environment variable if needed
    $baseUrl = 'http://localhost:8000';  // Update this if your base URL changes
    return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}
