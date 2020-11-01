<?php
spl_autoload_register(function ($class) {
    $path = $_SERVER['DOCUMENT_ROOT'].'/' . $class . '.php';
    if (file_exists($path)) {
        include $path;
        return;
    }

    echo 'File "'.$path.'" not found<br>';
    die;
});