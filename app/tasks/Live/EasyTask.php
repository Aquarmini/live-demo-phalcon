<?php

namespace App\Tasks\Live;

use App\Tasks\Task;
use App\Core\Cli\Task\WebSocket;
use swoole_websocket_frame;
use swoole_websocket_server;
use Xin\Cli\Color;
use swoole_http_request;

class EasyTask extends WebSocket
{
    // 端口号
    protected $port = 13001;

    public $live;

    public $fds = [];

    protected function connect(swoole_websocket_server $server, swoole_http_request $request)
    {
        echo Color::colorize('connect:' . $request->fd, Color::FG_GREEN) . PHP_EOL;
        if (isset($this->live)) {
            echo Color::colorize('推送live信息', Color::FG_GREEN) . PHP_EOL;
            $server->push($request->fd, json_encode($this->live));
        }
    }

    protected function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        $message = json_decode($frame->data, true);

        if (isset($message['event']) && $message['event'] == '__offer') {
            echo Color::colorize('缓存live信息', Color::FG_GREEN) . PHP_EOL;
            $this->live = $message;
        }

        if (count($this->fds) > 0) {
            foreach ($this->fds as $fd) {
                $server->push($fd, $this->live);
            }
        }
    }

    protected function close(swoole_websocket_server $ser, $fd)
    {
        echo Color::colorize('close:' . $fd, Color::FG_RED) . PHP_EOL;
    }

}

