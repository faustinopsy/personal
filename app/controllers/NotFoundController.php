<?php

namespace app\controllers;
use app\library\Redirect;

class NotFoundController
{
  public function index()
  {
    header("Location: /home");
    exit;
  }
}
