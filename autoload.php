<?php
/**
 * Created by Josep Martí
 */

spl_autoload_register(function ($class) {
    include "src/" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

