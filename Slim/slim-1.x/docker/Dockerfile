FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:5.6-fpm-nginx-alpine

# 先复制 Slim 框架
COPY Slim /Slim

# 复制 Slim 应用代码
COPY .. /app

WORKDIR /app

# 安装 PHP 依赖
RUN composer install --no-dev --optimize-autoloader

# 复制自定义配置文件到镜像内
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
RUN rm -rf /etc/nginx/conf.d/default.conf
RUN mkdir -p /run/nginx /var/log/nginx

# 开放端口 80（HTTP）
EXPOSE 80

# 启动 supervisord 来管理 nginx 和 php-fpm 两个进程
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
