<?php


require_once dirname(__DIR__) . "/core/controllers.php";

function exactMatchUriInArrayRoutes($uri, $routes): array
{
    return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}

function regularExpressionMatchArrayRoutes($uri, $routes): array
{
    return array_filter($routes, function($value, $key) use ($uri) {
        $regex = str_replace('/', '\/', ltrim($key, '/'));
        return preg_match("/^$regex$/", ltrim($uri, '/'));
    }, ARRAY_FILTER_USE_BOTH);
}

function extractUriParams($uri, $matchedUri): array
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];

        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }

    return [];
}

function paramsFormat($uri, $params): array
{
    $paramsData = [];
    foreach($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }
    return $paramsData;
}

/**
 * @throws Exception
 */
function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = require 'routes.php';
    $requestMethod = require dirname(__DIR__) . '/helpers/method.php';
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes[$requestMethod]);

    $params = [];
    if(empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes[$requestMethod]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = extractUriParams($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
    }

    if(!empty($matchedUri)) {
        return controller($matchedUri, $params);
    }
}
