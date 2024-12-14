<?php

namespace Core;

class Router {
    private static $routes = [];

    public static function add($path, $callback) {
        self::$routes[$path] = $callback;
    }

    public static function dispatch($uri) {
        $uri = strtok($uri, '?'); // Exclure les paramètres GET
        if (isset(self::$routes[$uri])) {
            call_user_func(self::$routes[$uri]);
        } else {
            http_response_code(404);
            echo "Page non trouvée.";
        }
    }
}
