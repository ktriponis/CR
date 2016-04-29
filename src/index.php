<?php
require_once 'autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$twig->display('index.twig', array('posts' => array(1, 2, 3)));
