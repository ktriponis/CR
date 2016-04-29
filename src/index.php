<?php
require_once 'autoload.php';

spl_autoload_register(function ($class) {
    $path = 'entity/' . $class . '.php';
    if (file_exists($path))
        /** @noinspection PhpIncludeInspection */
        include $path;
});

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$posts = array();

$post = new Post();
$post->setAuthor('Vardenis Pavardenis');
$post->setMessage('Sveikas Pasauli!');
$posts[] = $post;

$post = new Post();
$post->setAuthor('Geltonas Inkaras');
$post->setMessage('Skęstu!');
$posts[] = $post;

$post = new Post();
$post->setAuthor('Pukuotoji Gervė');
$post->setMessage('Negali būti');
$posts[] = $post;

$post = new Post();
$post->setAuthor('Geltonas Inkaras');
$post->setMessage(';(');
$posts[] = $post;

$twig->display('index.twig', array('posts' => $posts));
