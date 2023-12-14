<?php

spl_autoload_register(function($className) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_file($path)) {
        require_once $path;
    }
})

?>