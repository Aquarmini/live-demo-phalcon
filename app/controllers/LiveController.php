<?php

namespace App\Controllers;

class LiveController extends Controller
{

    public function easyAction()
    {
        return $this->view->render('live', 'easy');
    }

}

