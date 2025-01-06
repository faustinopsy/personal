<?php

namespace app\library;

use Exception;

class Controller
{
  public function call(Route $route)
  {
    $controller = $route->controller;

    if (!str_contains($controller, ':')) {
      throw new Exception("falta dois pontos entre o controller e o método");
    }

    [$controller, $action] = explode(':', $controller);

    $controllerInstance = "app\\controllers\\" . $controller;

    if (!class_exists($controllerInstance)) {
      throw new Exception("Controller {$controller} não existe");
    }

    $controller = new $controllerInstance;

    if (!method_exists($controller, $action)) {
      throw new Exception("Action {$action} não existe");
    }
    call_user_func_array([$controller, $action], []);
  }
}
