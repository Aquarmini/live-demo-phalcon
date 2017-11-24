{% extends "master.volt" %}
{% block content %}
    <html>
    <head>
        <title>视频直播</title>
        <meta charset="utf-8">
        <link href="http://vjs.zencdn.net/5.5.3/video-js.css" rel="stylesheet">
        <!-- If you'd like to support IE8 -->
        <script src="http://vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
    </head>
    <body>
    <h1>直播间</h1>
    <video id="my-video" class="video-js" controls preload="auto" width="640" height="300"
           poster="http://ppt.downhot.com/d/file/p/2014/08/12/9d92575b4962a981bd9af247ef142449.jpg" data-setup="{}">
        <source src="rtmp://127.0.0.1:13001/rtmp/test1" type="rtmp/flv">
        <!-- 如果上面的rtmp流无法播放，就播放hls流 -->
        <!-- <source src="http://10.10.5.119/live/livestream.m3u8" type='application/x-mpegURL'> -->
        <p class="vjs-no-js">播放视频需要启用 JavaScript，推荐使用支持HTML5的浏览器访问。
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
    <script src="http://vjs.zencdn.net/5.5.3/video.js"></script>
    </body>
    </html>
{% endblock %}