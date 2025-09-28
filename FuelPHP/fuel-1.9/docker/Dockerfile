FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:5.6-fpm-nginx-alpine

WORKDIR /app

# 复制代码和依赖
COPY . /app/

# 设置 PHP 时区，确保所有 PHP 进程都生效
RUN echo "date.timezone = Asia/Shanghai" > /usr/local/etc/php/conf.d/timezone.ini

# 安装 composer 依赖
RUN composer install --no-dev --optimize-autoloader

# 配置 nginx、supervisord 等
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN rm -rf /etc/nginx/conf.d/default.conf && mkdir -p /run/nginx /var/log/nginx

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
