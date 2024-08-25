<?php

class ContentManager {
    protected $contentDir;

    public function __construct($contentDir) {
        $this->contentDir = $contentDir;
    }

    public function getPosts() {
        $posts = [];
        foreach (glob($this->contentDir . '/posts/*.md') as $file) {
            $content = file_get_contents($file);
            $header = substr($content, 0, strpos($content, '---', 4));
            $body = substr($content, strpos($content, '---', 4) + 3);
            $meta = yaml_parse($header);
            $posts[] = [
                'meta' => $meta,
                'body' => $body,
            ];
        }
        return $posts;
    }

    public function getPost($slug) {
        $file = $this->contentDir . '/posts/' . $slug . '.md';
        if (file_exists($file)) {
            $content = file_get_contents($file);
            $header = substr($content, 0, strpos($content, '---', 4));
            $body = substr($content, strpos($content, '---', 4) + 3);
            $meta = yaml_parse($header);
            return [
                'meta' => $meta,
                'body' => $body,
            ];
        }
        return null;
    }
}
