<?php


// public/index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'client';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . "Controller";
$controllerFile = __DIR__ . "/../app/Controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerObject = new $controllerName();

    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        echo "Ação {$action} não encontrada no controller {$controllerName}.";
    }
} else {
    echo "Controller {$controllerName} não encontrado.";
}