<?php

namespace Core;

class Route
{
    public $routes = [];

    function addRoute($httpMethod, $uri, $controller, $middleware = null)
    {
        if (is_string($controller)) {
            $dados = [
                'controller' => $controller,
                'method' => '__invoke',
                'middleware' => $middleware
            ];
        }

        if (is_array($controller)) {
            $dados = [
                'controller' => $controller[0],
                'method' => $controller[1],
                'middleware' => $middleware
            ];
        }

        $this->routes[$httpMethod][$uri] = $dados;
    }

    function get($uri, $controller, $middleware = null)
    {
        $this->addRoute('GET', $uri, $controller, $middleware);

        return $this;
    }

    function post($uri, $controller, $middleware = null)
    {
        $this->addRoute('POST', $uri, $controller, $middleware);

        return $this;
    }

    function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        $httpMethod = $_SERVER['REQUEST_METHOD'];

        if (! isset($this->routes[$httpMethod][$uri])) {
            abort(404);
        }

        $dados = $this->routes[$httpMethod][$uri];

        $class = $dados['controller'];
        $method = $dados['method'];
        $middleware = $dados['middleware'];

        if ($middleware) {
            $m = new $middleware;
            $m->handle();
        }

        $c = new $class;
        $c->$method();
    }
}
