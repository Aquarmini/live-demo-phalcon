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

        var isCaller = true;
        
        //发送ICE候选到其他客户端
        pc.onicecandidate = function (event) {
            socket.send(JSON.stringify({
                "event": "__ice_candidate",
                "data": {
                    "candidate": event.candidate
                }
            }));
        };
        //如果检测到媒体流连接到本地，将其绑定到一个video标签上输出
        pc.onaddstream = function (event) {
            someVideoElement.src = URL.createObjectURL(event.stream);
        };
        //获取本地的媒体流，并绑定到一个video标签上输出，并且发送这个媒体流给其他客户端
        getUserMedia.call(navigator, {
            "audio": true,
            "video": true
        }, function (stream) {
            //发送offer和answer的函数，发送本地session描述
            var sendOfferFn = function (desc) {
                    pc.setLocalDescription(desc);
                    socket.send(JSON.stringify({
                        "event": "__offer",
                        "data": {
                            "sdp": desc
                        }
                    }));
                },
                sendAnswerFn = function (desc) {
                    pc.setLocalDescription(desc);
                    socket.send(JSON.stringify({
                        "event": "__answer",
                        "data": {
                            "sdp": desc
                        }
                    }));
                };
            //绑定本地媒体流到video标签用于输出
            video.src = URL.createObjectURL(stream);
            //向PeerConnection中加入需要发送的流
            pc.addStream(stream);
            //如果是发送方则发送一个offer信令，否则发送一个answer信令
            if (isCaller) {
                pc.createOffer(sendOfferFn);
            } else {
                pc.createAnswer(sendAnswerFn);
            }
        }, function (error) {
            //处理媒体流创建失败错误
        });
        //处理到来的信令
        socket.onmessage = function (event) {
            var json = JSON.parse(event.data);
            //如果是一个ICE的候选，则将其加入到PeerConnection中，否则设定对方的session描述为传递过来的描述
            if (json.event === "__ice_candidate") {
                pc.addIceCandidate(new RTCIceCandidate(json.data.candidate));
            } else {
                pc.setRemoteDescription(new RTCSessionDescription(json.data.sdp));
            }
        };
    </script>
{% endblock %}