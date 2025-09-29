# Laminas 2.x Framework 项目使用说明

本项目基于 **PHP Laminas 2.x** 框架，本项目提供完整源码及两种主流的部署方式，适合不同场景下的开发与部署需求。

- 传统部署（nginx + php-fpm）
- Docker 部署（支持开发挂载卷和整体打包两种模式）

## 目录结构

```text
Laminas/
  └── laminas-2.x/
      ├── ../                              # 官方原始源码
      ├── nginx.conf                       # 原生环境部署 Nginx 配置
      └── docker/                          # docker相关配置
            ├──Dockerfile                  # Dockerfile 打包模式Dockerfile
            ├──Dockerfile.volume           # Dockerfile 挂载模式Dockerfile
            ├──docker-compose.yml          # 打包模式基础配置
            ├──docker-compose.override.yml # 挂载模式配置，自动被 docker-compose 读取并覆盖
            └──README.md                   # 当前版本的部署与适配说明
```

---

## 一、源码与传统部署（nginx + php-fpm）

适合习惯使用传统 LEMP 环境的用户，直接运行源码，无需 Docker。

### 1. 环境准备

- PHP>=8.1+，包含 php-fpm 服务
- nginx 服务器
- MySQL 或其他数据库服务
- 项目源码放置目录，例如 `/var/www/laminas-2.x`

### 2. nginx 配置

项目提供 `nginx.conf` 示例配置(请参考laminas-2.x根目录下nginx.conf)

### 3. 权限设置

确保 web 用户有读写权限：

```bash
sudo chown -R www-data:www-data /var/www/laminas-2.x
sudo find /var/www/laminas-2.x -type f -exec chmod 644 {} \;
sudo find /var/www/laminas-2.x -type d -exec chmod 755 {} \;
```

### 4. 重启服务并访问

重启 php-fpm 与 nginx：

```bash
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx
```

访问项目：

```
http://你的服务器IP或域名/
```

---

## 二、Docker 部署

适合希望使用容器技术快速启动和环境隔离的用户。

Docker 部署支持两种模式：

- 挂载卷开发模式：代码与宿主机同步，适合开发调试
- 整体打包镜像模式：镜像内包含代码，适合生产或快速测试

### 环境准备

- 已安装 [Docker](https://docs.docker.com/get-docker/)
- 已安装 [docker-compose](https://docs.docker.com/compose/install/)
- 推荐使用 Linux 或 WSL2 等高性能本地开发环境

### 1. 挂载卷开发模式

> 使用 `docker-compose.volume.yaml` 配置，宿主机代码实时映射到容器。

启动命令：

```bash
cd Laminas/laminas-2.x/docker
docker-compose -f docker-compose.volume.yaml -p laminas2-volume up -d --build
```

访问项目：

```
# 假设端口映射为 `8750:80`，具体请查看`docker-compose.volume.yaml`：
http://localhost:8750
```

### 2. 镜像模式

> 使用标准 Dockerfile 构建，镜像内包含完整代码，适合生产环境或快速部署。

#### 2.1 使用 docker-compose 启动

启动命令：

```bash
cd Laminas/laminas-2.x/docker
docker-compose -f docker-compose.yaml -p laminas2 up -d --build
```

访问项目：

```
# 假设端口映射为 `8751:80`，具体请查看`docker-compose.yaml`：
http://localhost:8751
```

#### 2.2 直接使用 docker run 启动

构建镜像：

```bash
cd Laminas/laminas-2.x
docker build -f docker/Dockerfile -t laminas2:run .
```

启动容器：

```bash
docker run -d --name laminas2-run -p 8752:80 laminas2:run
```

或者使用整体打包模式产生的镜像：整体打包时生成的镜像（`laminas2:latest`），具体请查看`docker-compose.yaml`

启动容器（前提是存在laminas12:latest镜像）：

```bash
docker run -d --name laminas2-latest -p 8752:80 laminas2:latest
```

访问项目：

```
# 假设端口映射为 `8752:80`，这里是根据docker run启动时指定的端口：
http://localhost:8752
```

#### 其它更多相关的docker、docker-compose命令请参考项目根目录README.md

## 注意事项

- **端口映射**：确保所选端口（如8080/8081/8082等）未被其他服务占用。
- **项目名冲突**：建议使用 `-p` 指定项目名，避免多个 compose 项目资源冲突。
- **文件挂载性能**：开发模式挂载卷有助于实时同步，但在 Windows/macOS 下性能有限，Linux/WSL2更佳。
- **环境变量配置**：如需自定义数据库、缓存等参数，请修改 `.env` 文件或 docker-compose 配置。

如需更多帮助，请查阅项目内详细文档或提交问题反馈。
