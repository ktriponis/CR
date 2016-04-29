<?php

class PostController
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;

        if (empty($repository->load())) {
            $this->add('Vardenis Pavardenis', 'Sveikas Pasauli!');
            $this->add('Geltonas Inkaras', 'Skęstu!');
            $this->add('Pukuotoji Gervė', 'Negali būti');
            $this->add('Geltonas Inkaras', ';(');
        }
    }


    public function add($name, $message)
    {
        $post = new Post();
        $post->setAuthor($name);
        $post->setMessage($message);
        $this->repository->save($post);
    }

    public function getAll()
    {
        return $this->repository->load();
    }
}
