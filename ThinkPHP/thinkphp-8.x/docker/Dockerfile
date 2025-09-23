# 第一阶段：用 composer 镜像构建依赖
FROM composer:2 AS builder
WORKDIR /app

COPY . .
# 复制 .env.example 为 .env
RUN cp .example.env .env
# 安装 composer 依赖（不包含开发依赖，并优化自动加载）
RUN composer install --no-dev --optimize-autoloader

# 第二阶段：基础 php-fpm 镜像
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-nginx-alpine

# 工作目录
WORKDIR /app

# 复制代码和 composer 依赖
COPY --from=builder /app /app

# 复制自定义配置文件到镜像内
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
RUN rm -rf /etc/nginx/conf.d/default.conf
RUN mkdir -p /run/nginx /var/log/nginx

# 开放端口 80（HTTP）
EXPOSE 80

# 启动 supervisord 来管理 nginx 和 php-fpm 两个进程
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
