# phalcon-project
[![Total Downloads](https://poser.pugx.org/limingxinleo/phalcon-project/downloads)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![Latest Stable Version](https://poser.pugx.org/limingxinleo/phalcon-project/v/stable)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![Latest Unstable Version](https://poser.pugx.org/limingxinleo/phalcon-project/v/unstable)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![License](https://poser.pugx.org/limingxinleo/phalcon-project/license)](https://packagist.org/packages/limingxinleo/phalcon-project)


[Phalcon 官网](https://docs.phalconphp.com/zh/latest/index.html)

[wiki](https://github.com/limingxinleo/simple-subcontrollers.phalcon/wiki)

## 安装
- 安装Nginx (如果已安装，则跳过)
[文档](https://github.com/limingxinleo/note/blob/master/development/lnmp.md#安装nginx)

- 安装rtmp扩展
~~~
# 确定Nginx版本 我这里是v1.12.2 
$ nginx -v 

# 确定已编译的扩展
$ nginx -V 

# 下载最新扩展 和 Nginx
$ wget https://github.com/arut/nginx-rtmp-module/archive/v1.2.0.zip
$ wget http://nginx.org/download/nginx-1.12.2.tar.gz

# 进入nginx-1.12.2目录编译Nginx 参数为之前nginx -V 显示的参数 在最后增加 --add-module=/_html/tools/nginx/nginx-rtmp-module-1.2.0
$ ./configure ./configure --prefix=/etc/nginx --sbin-path=/usr/local/sbin/nginx --modules-path=/usr/lib64/nginx/modules --conf-path=/etc/nginx/nginx.conf --error-log-path=/var/log/nginx/error.log --http-log-path=/var/log/nginx/access.log --pid-path=/var/run/nginx.pid --lock-path=/var/run/nginx.lock --http-client-body-temp-path=/var/cache/nginx/client_temp --http-proxy-temp-path=/var/cache/nginx/proxy_temp --http-fastcgi-temp-path=/var/cache/nginx/fastcgi_temp --http-uwsgi-temp-path=/var/cache/nginx/uwsgi_temp --http-scgi-temp-path=/var/cache/nginx/scgi_temp --user=nginx --group=nginx --with-compat --with-file-aio --with-threads --with-http_addition_module --with-http_auth_request_module --with-http_dav_module --with-http_flv_module --with-http_gunzip_module --with-http_gzip_static_module --with-http_mp4_module --with-http_random_index_module --with-http_realip_module --with-http_secure_link_module --with-http_slice_module --with-http_ssl_module --with-http_stub_status_module --with-http_sub_module --with-http_v2_module --with-mail --with-mail_ssl_module --with-stream --with-stream_realip_module --with-stream_ssl_module --with-stream_ssl_preread_module --with-cc-opt='-O2 -g -pipe -Wall -Wp,-D_FORTIFY_SOURCE=2 -fexceptions -fstack-protector-strong --param=ssp-buffer-size=4 -grecord-gcc-switches -m64 -mtune=generic -fPIC' --with-ld-opt='-Wl,-z,relro -Wl,-z,now -pie' --add-module=/_html/tools/nginx/nginx-rtmp-module-1.2.0
$ make

# 建立软连接 /_html/tools/nginx/nginx-1.12.2/objs/nginx 为编译好的脚本
$ cd /usr/local/sbin
$ ln -s /_html/tools/nginx/nginx-1.12.2/objs/nginx nginx

# 重启终端测试
$ nginx -V
$ nginx -t
~~~

## 帮助
1. 菜单
~~~
php run live:menu
~~~
