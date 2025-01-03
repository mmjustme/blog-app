<?php

namespace core;

class Router
{
  public $routes = [];
  public $uri;
  protected $method;
  public $base_url = BASE_URL;

  public function __construct()
  {
    $this->uri = trim(str_replace($this->base_url, '', parse_url($_SERVER['REQUEST_URI'])['path']), '/');
    // $this->uri = str_replace($this->base_url, '', $this->uri);
    $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
  }

  public function match()
  {
    $matches = false;

    foreach ($this->routes as $route) {

      if (($route['uri'] === $this->uri) && (in_array(strtoupper($this->method), $route['method']))) {

        if ($route['middleware']) {
          $middleware = MIDDLEWARE[$route['middleware']] ?? false;
          if (!$middleware) throw new \Exception('Incorrect middleware' . $route['middleware']);

          (new $middleware)->handle();
        }
        require CONTROLLERS . "/{$route['controller']}";
        $matches = true;
        break;
      }
    }
    if (!$matches) echo abort();
  }

  public function only($middleware)
  {
    $key = array_key_last($this->routes);
    $this->routes[$key]['middleware'] = $middleware;
    return $this;
  }

  public function add($uri, $controller, $method)
  {
    if (is_array($method)) {
      $method = array_map('strtoupper', $method);
    } else {
      # якщо ж $method не масив ми зробимо з нього масив навмисне
      $method = [$method];
    }
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
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

  public function put($uri, $controller)
  {
    return $this->add($uri, $controller, "UPDATE");
  }
}
