<?php

/**
 * @throws Exception
 */
function controller($matchUri, $params) {
    [$controller, $method] = explode('@', array_values($matchUri)[0]);

    define("CONTROLLER_NAMESPACE", "controllers\\");
    define("CONTROLLER_PATH", __DIR__ . "/../controllers/");

    $controllerClass = CONTROLLER_NAMESPACE . $controller;
    $controllerFile = CONTROLLER_PATH . $controller . ".php";

    if (!file_exists($controllerFile)) {
        throw new Exception("Controller file '{$controllerFile}' does not exist");
    }

    require_once $controllerFile;

    if (!class_exists($controllerClass)) {
        throw new Exception("Controller class '{$controllerClass}' does not exist");
    }

    $controllerInstance = new $controllerClass();

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("Method '{$method}' does not exist in controller '{$controllerClass}'");
    }

    return $controllerInstance->$method($params);
}
