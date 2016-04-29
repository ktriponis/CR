<?php
require_once 'autoload.php';

require_once 'ClassLoader.php';
require_once 'Utils.php';

$postRepository = new CR\Post\PostRepository(sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'messages.txt');
$postController = new CR\Post\PostController($postRepository);

$error = null;
if (getVar('action')) {
    if (!($name = getVar('name'))) {
        $error = 'Neįvestas vardas';
    } elseif (!($message = getVar('message'))) {
        $error = 'Neįvesta žinutė';
    } else {
        $postController->add($name1, $message);
    }
}

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$twig->display('index.twig', array(
    'posts' => $postController->getAll(),
    'error' => $error,
));
