<?php

namespace routes;

class Routes {
    private $routes = [];

    public function add($method, $route, $action) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'action' => $action
        ];
    }

    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $routeDef) {
            if ($routeDef['method'] !== $method) continue;
//            '/usuario/{id}'
//            vira:
//            '#^/usuario/([a-zA-Z0-9-_]+)$#'
            $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '([a-zA-Z0-9-_]+)', $routeDef['route']);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                [$controller, $methodName] = $routeDef['action'];
                call_user_func_array([new $controller, $methodName], $matches);
                return;
            }
        }

        http_response_code(404);
        echo "Página não encontrada.";
    }
}