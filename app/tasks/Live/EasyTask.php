<?php

namespace App\Tasks\Live;

use App\Tasks\Task;
use App\Core\Cli\Task\WebSocket;
use swoole_websocket_frame;
use swoole_websocket_server;

class EasyTask extends WebSocket
{
    // 端口号
    protected $port = 13001;

    protected function connect(swoole_websocket_server $server, $request)
    {
        // TODO: Implement connect() method.
    }

    protected function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        // TODO: Implement message() method.
    }

    protected function close($ser, $fd)
    {
        // TODO: Implement close() method.
    }

}

