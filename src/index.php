<?php
require_once 'autoload.php';

spl_autoload_register(function ($class) {
    $class = substr($class, strrpos($class, '\\') + 1);
    $classDirectories = array('repository', 'controller', 'entity');
    foreach ($classDirectories as $dir) {
        $path = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($path))
            /** @noinspection PhpIncludeInspection */
            include $path;
    }
});

function getVar($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

$postRepository = new CR\Post\PostRepository(sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'messages.txt');
$postController = new CR\Post\PostController($postRepository);

$error = null;
if (getVar('action')) {
    if (!($name = getVar('name')))
        $error = 'Neįvestas vardas';
    elseif (!($message = getVar('message')))
        $error = 'Neįvesta žinutė';
    else
        $postController->add($name, $message);
}

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$twig->display('index.twig', array(
    'posts' => $postController->getAll(),
    'error' => $error,
));
