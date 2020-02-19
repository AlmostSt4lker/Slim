<?php

spl_autoload_register('load');

function load($className){
    $path = __DIR__.'/../../app/classes/';
    $ext = '.php';
    $fullPath = $path.$className.$ext;

    include_once $fullPath;

}


?>