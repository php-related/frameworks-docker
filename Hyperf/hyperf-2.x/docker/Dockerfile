# Default Dockerfile
#
# @link     https://www.hyperf.io
# @document https://hyperf.wiki
# @contact  group@hyperf.io
# @license  https://github.com/hyperf/hyperf/blob/master/LICENSE

FROM registry.cn-hangzhou.aliyuncs.com/panxu/php:8.0-fpm-alpine
LABEL maintainer="Hyperf Developers <group@hyperf.io>" version="1.0" license="MIT" app.name="Hyperf"

##
# ---------- env settings ----------
##
# --build-arg timezone=Asia/Shanghai
ARG timezone

ENV TIMEZONE=${timezone:-"Asia/Shanghai"} \
    APP_ENV=prod \
    SCAN_CACHEABLE=(true)

# update
RUN set -ex \
    && php -v \
    && php -m \
    && php --ri swoole \
    # 写入 PHP 配置覆盖文件
    && { \
    echo "upload_max_filesize=128M"; \
    echo "post_max_size=128M"; \
    echo "memory_limit=1G"; \
    echo "date.timezone=${TIMEZONE}"; \
    } > /usr/local/etc/php/conf.d/99_overrides.ini \
    # 显式关闭 swoole 短函数名
    && echo "swoole.use_shortname=Off" > /usr/local/etc/php/conf.d/99_swoole.ini \
    # 设置时区文件和环境变量
    && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"

WORKDIR /app
# Composer Cache
# COPY ./composer.* /app/
# RUN composer install --no-dev --no-scripts

COPY . /app
RUN composer install --no-dev -o && php bin/hyperf.php

EXPOSE 9501

ENTRYPOINT ["php", "bin/hyperf.php", "start"]