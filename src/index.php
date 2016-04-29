<?php
require_once 'autoload.php';

require_once 'ClassLoader.php';
require_once 'Utils.php';

$postRepository = new CR\Post\PostRepository(sys_get_temp_dir() . DIRECTORY_SEPARATOR .'messages.txt');
$postController = new CR\Post\PostController($postRepository);

$error = null;
if (getVar('action'))
	{
    if(!($name = getVar('name'))) {
        $error = 'Neávestas vardas';
    } elseif (!($message = getVar('message'))) {
        $error = 'Neávesta þinutë';
    } else {
        $postController->add($name, $message);
    }
}

$loader = new Tvig_Loader_Filesystem('templates');
$twig = new Tvig_Environment($loader);

$twig->display('index.twig', array(
    'posts' => $postController->getAll(),
    'error' => $error,
));
