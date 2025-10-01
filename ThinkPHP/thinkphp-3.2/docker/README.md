# ThinkPHP 3.2 Framework 项目使用说明

本项目基于 **PHP ThinkPHP 3.2** 框架，本项目提供完整源码及两种主流的部署方式，适合不同场景下的开发与部署需求。

- 传统部署（nginx + php-fpm）
- Docker 部署（支持开发挂载卷和整体打包两种模式）

## 目录结构

```text
ThinkPHP/
  └── thinkphp-3.2/
      ├── ../                               # 源代码
      ├── nginx.conf                        # nginx 配置
      └── docker/                           # docker配置
            ├── Dockerfile                  # 镜像模式 dockerfile
            ├── Dockerfile.volume           # 挂载模式 dockerfile
            ├── docker-compose.yml          # 镜像模式启动配置
            ├── docker-compose.volume.yml   # 挂载模式启动配置
            └── README.md                   # 部署说明文档
```

---

## 一、Docker 部署

### 环境准备

- 已安装 [Docker](https://docs.docker.com/get-docker/)
- 已安装 [docker-compose](https://docs.docker.com/compose/install/)
- 推荐使用 Linux 或 WSL2 等高性能本地开发环境

适合希望使用容器技术快速启动和环境隔离的用户。

Docker 部署支持两种模式：

- 挂载模式：代码与宿主机同步，适合开发调试
- 镜像模式：镜像内包含代码，适合生产或快速测试

### 1. 挂载模式

> 使用 `docker-compose.volume.yaml` 配置，宿主机代码实时映射到容器。

启动容器：

```bash
docker-compose -f ./thinkphp-3.2/docker/docker-compose.volume.yaml -p thinkphp3_2-volume up -d --build
```

访问项目：

```
http://localhost:8113
```

假设端口映射为 `8113:80`，具体请查看`docker-compose.volume.yaml`

### 2. 镜像模式

> 使用标准 Dockerfile 构建，镜像内包含完整代码，适合生产环境或快速部署。

#### 2.1 使用 docker-compose 启动

启动容器：

```bash
docker-compose -f ./thinkphp-3.2/docker/docker-compose.yaml -p thinkphp3_2 up -d --build
```

访问项目：

```
http://localhost:8114
```

假设端口映射为 `8114:80`，具体请查看`docker-compose.yaml`

#### 2.2 直接使用 docker run 启动

构建镜像：

```bash
docker build -f ./thinkphp-3.2/docker/Dockerfile -t thinkphp3_2:run /thinkphp-3.2/docker
```

启动容器：

```bash
docker run -d --name thinkphp3_2-run -p 8115:80 thinkphp3_2:run
```

或者使用镜像模式产生镜像：（`thinkphp3_2:latest`），具体请查看`docker-compose.yaml`。

```bash
docker run -d --name thinkphp3_2-latest -p 8115:80 thinkphp3_2:latest
```

访问项目：

```
http://localhost:8115
```

假设端口映射为 `8115:80`，这里是根据docker run启动时指定的端口

## 二、源码与传统部署（nginx + php-fpm）

适合习惯使用传统 LEMP 环境的用户，直接运行源码，无需 Docker。

### 1. 环境准备

- PHP = 7.3，包含 php-fpm 服务
- nginx 服务器
- MySQL 或其他数据库服务
- 项目源码放置目录，例如 `/var/www/thinkphp-3.2`

### 2. nginx 配置

项目提供 `nginx.conf` 示例配置(请参考thinkphp-3.2根目录下nginx.conf)

### 3. 权限设置

确保 web 用户有读写权限：

```bash
sudo chown -R www-data:www-data /var/www/thinkphp-3.2
sudo find /var/www/thinkphp-3.2 -type f -exec chmod 644 {} \;
sudo find /var/www/thinkphp-3.2 -type d -exec chmod 755 {} \;
```

### 4. 重启服务并访问

重启 php-fpm 与 nginx：

```bash
sudo systemctl restart php7.3-fpm
sudo systemctl restart nginx
```

访问项目：

```
http://你的服务器IP或域名/
```

---

#### 其它更多相关的docker、docker-compose命令请参考项目根目录README.md

## 注意事项

- **端口映射**：确保所选端口（如8080/8081/8082等）未被其他服务占用。
- **项目名冲突**：建议使用 `-p` 指定项目名，避免多个 compose 项目资源冲突。
- **文件挂载性能**：开发模式挂载卷有助于实时同步，但在 Windows/macOS 下性能有限，Linux/WSL2更佳。
- **环境变量配置**：如需自定义数据库、缓存等参数，请修改 `.env` 文件或 docker-compose 配置。

如需更多帮助，请查阅项目内详细文档或提交问题反馈。
