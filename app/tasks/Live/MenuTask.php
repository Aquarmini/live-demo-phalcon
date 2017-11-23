<?php

namespace App\Tasks\Live;

use App\Tasks\Task;
use Xin\Cli\Color;

class MenuTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  直播DEMO') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run live:[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  webrtc    Webrtc单房间直播', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

}

