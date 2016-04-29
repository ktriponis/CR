<?php
require_once 'autoload.php';

spl_autoload_register(function ($class) {
    $classDirectories = array('controller', 'entity');
    foreach ($classDirectories as $dir) {
        $path = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($path))
            /** @noinspection PhpIncludeInspection */
            include $path;
    }
});

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$postController = new PostController();
$twig->display('index.twig', array('posts' => $postController->getAll()));
