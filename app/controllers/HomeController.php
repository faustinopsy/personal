<?php

namespace app\controllers;

use app\library\View;

class HomeController
{
  public function index()
  {
    
    View::render('home');
  }
}
