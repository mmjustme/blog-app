<?php

namespace core;

class Router
{
  public $routes = [];
  protected $uri;
  protected $method;

  public function __construct()
  {
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
    $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
  }

  public function match()
  {
    $matches = false;

    foreach ($this->routes as $route) {
      if (($route['uri'] === $this->uri) && ($route['method'] === strtoupper($this->method))) {

        if($route['middleware']) {
          $middleware = MIDDLEWARE[$route['middleware']] ?? false;
          if (!$middleware) throw new \Exception('Incorrect middleware' . $route['middleware']);

          (new $middleware)->handle();
        }
        require CONTROLLERS . "/{$route['controller']}";
        $matches = true;
        break;
      }
    }
    if (!$matches) echo "PAGE NOT FOUND";
  }

  public function only($middleware)
  {
    $key = array_key_last($this->routes);
    $this->routes[$key]['middleware'] = $middleware;
    return $this;
  }

  public function add($uri, $controller, $method)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware'=> null,
    ];
    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add($uri, $controller, "GET");
  }

  public function post($uri, $controller)
  {
    return $this->add($uri, $controller, "POST");
  }

  public function delete($uri, $controller)
  {
    return $this->add($uri, $controller, "DELETE");
  }
}
