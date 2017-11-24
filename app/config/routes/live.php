<?php
// +----------------------------------------------------------------------
// | live.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

$router->add('/live/webrtc/liver', 'App\\Controllers\\Live::webrtcLiver')->setName('live.webrtc.liver');

$router->add('/live/webrtc/watcher', 'App\\Controllers\\Live::webrtcWatcher')->setName('live.webrtc.watcher');

$router->add('/live/hls/watcher', 'App\\Controllers\\Live::hlsWatcher')->setName('live.hls.watcher');