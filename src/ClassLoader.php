<?php
spl_autoload_register(function ($class) {
    $class = substr($class, strrpos($class, '\\') + 1);
    $classDirectories = array('repository', 'controller', 'entity');
    foreach ($classDirectories as $dir) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($path)) {
            /** @noinspection PhpIncludeInspection */
            include $path;
        }
    }
});
