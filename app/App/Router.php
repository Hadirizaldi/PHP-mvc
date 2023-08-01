<?php

namespace Hadirizaldi\PhpMvc\App;

class Router
{
  private static array $routes = [];

  public static function add(string $method, string $path, string $controller, string $function): void
  {
    self::$routes[] = [
      "method" => $method,
      "path" => $path,
      "controller" => $controller,
      "function" => $function
    ];
  }

  public static function getRoutes(): array
  {
    return self::$routes;
  }

  public static function run(): void
  {
    $path = "/";

    if (isset($_SERVER["PATH_INFO"])) {
      $path = $_SERVER["PATH_INFO"];
    }
    $method = $_SERVER["REQUEST_METHOD"];

    foreach (self::$routes as $route) {
      if ($route["method"] == $method && $route["path"] == $path) {
        echo "Controller: " . $route["controller"] . ", Function: " . $route["function"];

        return;
      }
    }

    // tidak ketemu method dan path
    http_response_code(404);
    echo "CONTROLLER NOT FOUND";
  }
}
