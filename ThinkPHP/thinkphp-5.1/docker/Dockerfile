# 阶段1：构建环境
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:7.3-fpm-nginx-alpine

WORKDIR /app

# 直接COPY代码（不用composer阶段）
COPY . /app

# 安装依赖
RUN composer install --no-dev --optimize-autoloader

# 覆盖nginx、supervisor、www.conf配置
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/www.conf /usr/local/etc/php-fpm.d/www.conf

# 清理nginx默认配置
RUN rm -rf /etc/nginx/conf.d/default.conf

# 创建nginx日志目录
RUN mkdir -p /run/nginx /var/log/nginx

# 开放80端口
EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
