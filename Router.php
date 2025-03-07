<?php

namespace App;

class Router
{
    private $routes = [];

    public function add($method, $route, $controller, $action)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => trim($route, '/'),
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($method, $uri)
    {
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');

        foreach ($this->routes as $route) {
            if ($method == $route['method'] && $uri == $route['route']) {
                $controller = $route['controller'];
                $action = $route['action'];

                if (!method_exists($controller, $action)) {
                    http_response_code(500);
                    echo json_encode(["error" => "Method '{$action}' not found in " . get_class($controller)]);
                    return;
                }

   
                if ($method === 'POST') {
                    $data = json_decode(file_get_contents("php://input"), true) ?? $_POST;
                    $controller->$action($data);
                } else {
                    $controller->$action();
                }

                return;
            }
        }

        http_response_code(404);
        echo json_encode(["error" => "404 Not Found"]);
    }
}
