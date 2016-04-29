<?php

namespace CR\Post;

class PostRepository
{
    private $destination;

    public function __construct($destination)
    {
        $this->destination = $destination;
    }

    public function save($post)
    {
        file_put_contents($this->destination, serialize($post) . "\n", FILE_APPEND | LOCK_EX);
    }

    public function load()
    {
        if (!file_exists($this->destination)) {
            return array();
        }
        return array_map(function ($txt) {
            return unserialize($txt);
        }, explode("\n", file_get_contents($this->destination)));
    }
}
