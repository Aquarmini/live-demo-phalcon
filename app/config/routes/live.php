<?php
// +----------------------------------------------------------------------
// | live.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

$router->add('/live/easy/liver', 'App\\Controllers\\Live::easyLiver')->setName('live.easy.liver');

$router->add('/live/easy/watcher', 'App\\Controllers\\Live::easyWatcher')->setName('live.easy.watcher');