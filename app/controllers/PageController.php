<?php

namespace app\controllers;

use app\library\View;

class PageController
{
    public function privacyPolicy()
    {
        return View::render('pages/privacy-policy', [
            'title' => 'Política de Privacidade'
        ]);
    }

    public function termsAndConditions()
    {
        return View::render('pages/terms-and-conditions', [
            'title' => 'Termos e Condições'
        ]);
    }
}
