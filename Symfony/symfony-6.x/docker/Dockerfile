# 第一阶段：用包含 intl 扩展的 php-fpm-nginx-alpine 镜像做构建
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-nginx-alpine AS builder

WORKDIR /app

COPY . .

# 复制 .env.example 为 .env
RUN cp .env.dev .env

# 确保系统依赖齐全，如果报错再补充安装
RUN composer install --no-dev --optimize-autoloader

# 第二阶段：继续使用同样基础镜像
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-nginx-alpine

WORKDIR /app

COPY --from=builder /app /app

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf

RUN rm -rf /etc/nginx/conf.d/default.conf \
    && mkdir -p /run/nginx /var/log/nginx

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
