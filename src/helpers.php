<?php
// In a custom helpers file or the bootstrap file
function base_url($path = '')
{
    $config = require __DIR__ . '/config/app.php';
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}

function asset($path = '')
{
    $baseUrl = 'http://localhost:8000';  // Update this if your base URL changes
    return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}
