<?php

namespace App\Controllers;

class LiveController extends Controller
{

    public function easyLiverAction()
    {
        return $this->view->render('live/easy', 'liver');
    }

    public function easyWatcherAction()
    {
        return $this->view->render('live/easy', 'watcher');
    }

}

