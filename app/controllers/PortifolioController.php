<?php

namespace app\controllers;

use app\library\View;
use app\models\PortfolioItem;

class PortifolioController
{
  public function index()
  {
      $portfolioItems = PortfolioItem::getAll();
      View::render('portifolio', [
          'title' => 'Gerenciar Portfolio',
          'portfolio' => $portfolioItems,
      ]);
  }

}
