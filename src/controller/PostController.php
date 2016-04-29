<?php

class PostController
{
    private $posts;

    public function __construct()
    {
        $this->posts = array();

        $post = new Post();
        $post->setAuthor('Vardenis Pavardenis');
        $post->setMessage('Sveikas Pasauli!');
        $this->posts[] = $post;

        $post = new Post();
        $post->setAuthor('Geltonas Inkaras');
        $post->setMessage('Skęstu!');
        $this->posts[] = $post;

        $post = new Post();
        $post->setAuthor('Pukuotoji Gervė');
        $post->setMessage('Negali būti');
        $this->posts[] = $post;

        $post = new Post();
        $post->setAuthor('Geltonas Inkaras');
        $post->setMessage(';(');
        $this->posts[] = $post;
    }


    public function getAll()
    {
        return $this->posts;
    }
}
