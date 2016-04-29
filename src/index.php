<?php
require_once 'autoload2.php';

require_once 'ClassLoader3.php';
require_once 'Utils.php';

$postRepository = new CR\Post\PostRepository(sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'messages.txt');
$postController = new CR\Post\PostContr2oller($postRepository);

$error = null;
if (getVar('action')) {
    if (!($name = getVar('name'))) {
        $error = 'Neįvestas vardas';
    } elseif (!($message = getVar('message'))) {
        $error = 'Neįvesta žinutė';
    } else {
        $postController->add($name, $message);
    }
}

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$twig->display('index.twig', array(
    'posts' => $postController->getAll(),
    'error' => $error,
));
