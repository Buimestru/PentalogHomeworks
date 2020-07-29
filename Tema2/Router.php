<?php


class Router
{

    protected array $routes = [];

    public function define (array $routes) {
        $this->routes = $routes;
    }

    public function direct (string $key) {
        if(array_key_exists($key, $this->routes)) {
            list($class, $method) = explode('@', $this->routes[$key]);
            $controller = new $class();
            $controller->{$method}();
        } else {
            throw new Exception("Pagina data nu exista");
        }
    }
}
