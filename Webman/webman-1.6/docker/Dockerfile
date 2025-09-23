# 阶段1：构建依赖
FROM composer:2 AS builder
WORKDIR /app
# 优先复制依赖文件以利用缓存
COPY composer.json composer.lock ./

# 清理缓存
RUN composer install --no-dev --no-interaction --optimize-autoloader && composer clear-cache  

# 复制代码并生成自动加载
COPY . .
RUN composer dump-autoload --optimize

# 阶段2：生产镜像
FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.2-fpm-alpine
WORKDIR /app
# 仅复制必要文件（依赖与代码）
COPY --from=builder /app ./
# 自定义 PHP 配置（可选）
# COPY docker/php.ini $PHP_INI_DIR/conf.d/app.ini
# 暴露端口并启动服务
EXPOSE 8787
CMD ["php", "start.php", "start"]