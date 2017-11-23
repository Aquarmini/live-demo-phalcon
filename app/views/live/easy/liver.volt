{% extends "master.volt" %}
{% block content %}
    <video id="video" autoplay></video>
    <script type="text/javascript">
        //使用Google的stun服务器
        var iceServer = {
            "iceServers": [{
                "url": "stun:stunserver.org"
            }]
        };
        //兼容浏览器的getUserMedia写法
        var getUserMedia = (navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia);
        //兼容浏览器的PeerConnection写法
        var PeerConnection = (window.PeerConnection ||
            window.webkitPeerConnection00 ||
            window.webkitRTCPeerConnection ||
            window.mozRTCPeerConnection);
        //与后台服务器的WebSocket连接
        var socket = new WebSocket('ws://127.0.0.1:13001');
        //创建PeerConnection实例
        var pc = new PeerConnection(iceServer);

        var video = document.getElementById('video');

        //获取本地的媒体流，并绑定到一个video标签上输出，并且发送这个媒体流给其他客户端
        getUserMedia.call(navigator, {
            "audio": true,
            "video": true
        }, function (stream) {
            //发送offer和answer的函数，发送本地session描述
            var sendOfferFn = function (desc) {
                pc.setLocalDescription(desc);
                console.log('sendOfferFn');
                socket.send(JSON.stringify({
                    "event": "__offer",
                    "data": {
                        "sdp": desc
                    }
                }));
            };
            //绑定本地媒体流到video标签用于输出
            video.src = URL.createObjectURL(stream);
            //向PeerConnection中加入需要发送的流
            pc.addStream(stream);
            //如果是发送方则发送一个offer信令
            pc.createOffer(sendOfferFn, function (error) {
                console.log('Failure callback: ' + error);
            });

            console.log('peer');
        }, function (error) {
            //处理媒体流创建失败错误
        });

    </script>
{% endblock %}