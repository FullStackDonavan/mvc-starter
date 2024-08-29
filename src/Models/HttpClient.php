<?php

namespace App\Models;
use Exception;

class HttpClient
{
    private $baseUrl;
    private $headers;

    public function __construct($baseUrl = '', $headers = [])
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->headers = $headers;
    }

    private function request($method, $endpoint, $data = null)
    {
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/'); // Ensure no double slashes

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        //remove this on production. This is only for testing locally
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!empty($this->headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        }

        if ($method === 'POST' || $method === 'PUT' || $method === 'PATCH') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($error) {
            throw new Exception('Curl error: ' . $error);
        }

        return [
            'status_code' => $httpCode,
            'response' => json_decode($response, true)
        ];
    }

    public function get($endpoint, $params = [])
    {
        if (!empty($params)) {
            $endpoint .= '?' . http_build_query($params);
        }
        return $this->request('GET', $endpoint);
    }

    public function post($endpoint, $data = [])
    {
        return $this->request('POST', $endpoint, $data);
    }

    public function put($endpoint, $data = [])
    {
        return $this->request('PUT', $endpoint, $data);
    }

    public function patch($endpoint, $data = [])
    {
        return $this->request('PATCH', $endpoint, $data);
    }

    public function delete($endpoint, $data = [])
    {
        return $this->request('DELETE', $endpoint, $data);
    }

    public function setHeader($key, $value)
    {
        $this->headers[] = "$key: $value";
    }
}
