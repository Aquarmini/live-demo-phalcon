<?php

namespace App\Tasks\Live;

use App\Tasks\Task;
use App\Core\Cli\Task\WebSocket;
use swoole_websocket_frame;
use swoole_websocket_server;
use Xin\Cli\Color;

class EasyTask extends WebSocket
{
    // 端口号
    protected $port = 13001;

    protected function connect(swoole_websocket_server $server, $request)
    {
        echo Color::colorize('connect') . PHP_EOL;
    }

    protected function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        // TODO: Implement message() method.

        $message = json_decode($frame->data, true);
        if (isset($message['type'])) {
            dump($message['type']);
        } else {
            dump($message['event']);
        }

        $server->push($frame->fd, json_encode($message));
    }

    protected function close($ser, $fd)
    {
        echo Color::colorize('close') . PHP_EOL;
    }

}

