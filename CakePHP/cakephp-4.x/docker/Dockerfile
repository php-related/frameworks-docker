# 第一阶段：用包含 intl 扩展的 php-fpm-nginx-alpine 镜像做构建
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-nginx-alpine AS builder

WORKDIR /app

COPY . .

# 复制环境配置文件，确保存在
RUN cp -n .env.example .env || true

# 确保系统依赖齐全，如果报错再补充安装
RUN composer install --optimize-autoloader --no-interaction

# 第二阶段：继续使用同样基础镜像
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-nginx-alpine

WORKDIR /app

COPY --from=builder /app /app

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf

RUN rm -rf /etc/nginx/conf.d/default.conf \
    && mkdir -p /run/nginx /var/log/nginx

# 设置 /tmp 目录权限
RUN mkdir -p /tmp && chmod 1777 /tmp
# 设置必要目录权限，确保 nginx 和 php-fpm 用户可以写入
# 这里假设 www-data 是运行用户，根据实际调整
RUN chown -R www-data:www-data /app/tmp /app/logs /app/webroot \
    && chmod -R 775 /app/tmp /app/logs /app/webroot

# 设置环境变量，确保 CakePHP 读取正确的 APP_ENV（根据需求调整）
ENV APP_ENV=prod
ENV APP_DEBUG=0

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
