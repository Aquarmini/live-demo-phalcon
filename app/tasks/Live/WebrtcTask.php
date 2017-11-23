<?php

namespace App\Tasks\Live;

use App\Tasks\Task;
use App\Core\Cli\Task\WebSocket;
use App\Utils\Redis;
use swoole_websocket_frame;
use swoole_websocket_server;
use Xin\Cli\Color;
use swoole_http_request;

class WebrtcTask extends WebSocket
{
    // 端口号
    protected $port = 13001;

    public $live = 'websocket:live';

    public $fds = [];

    protected function connect(swoole_websocket_server $server, swoole_http_request $request)
    {
        echo Color::colorize('connect:' . $request->fd, Color::FG_GREEN) . PHP_EOL;
        if ($live = Redis::get($this->live)) {
            echo Color::colorize('推送live信息', Color::FG_GREEN) . PHP_EOL;
            $server->push($request->fd, $live);
        }
    }

    protected function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        $message = json_decode($frame->data, true);

        if (isset($message['event']) && $message['event'] == '__offer') {
            echo Color::colorize('缓存live信息', Color::FG_GREEN) . PHP_EOL;
            Redis::set($this->live, $frame->data);
        }
    }

    protected function close(swoole_websocket_server $ser, $fd)
    {
        echo Color::colorize('close:' . $fd, Color::FG_RED) . PHP_EOL;
    }

}

