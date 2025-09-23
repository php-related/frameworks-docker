FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:5.6-fpm-nginx-alpine

# 先复制 yii 框架
COPY framework /framework

# 复制 Yii 应用代码
COPY app /app

WORKDIR /app

# Yii1.1 通常不需要 composer，这里可删掉或保留
# RUN composer install --no-dev --optimize-autoloader || true

# 复制配置文件
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN rm -rf /etc/nginx/conf.d/default.conf

RUN mkdir -p /run/nginx /var/log/nginx

# Yii1 的 runtime 目录在 /app/protected/runtime
RUN mkdir -p /app/protected/runtime && chown -R www-data:www-data /app/protected/runtime

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]