<?php

namespace App\Controllers;

class LiveController extends Controller
{

    public function webrtcLiverAction()
    {
        return $this->view->render('live/webrtc', 'liver');
    }

    public function webrtcWatcherAction()
    {
        return $this->view->render('live/webrtc', 'watcher');
    }

    public function hlsWatcherAction()
    {
        return $this->view->render('live/hls', 'watcher');
    }

}

