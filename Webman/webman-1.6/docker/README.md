# Webman 1.6 Framework 项目使用说明

本项目基于 **PHP Webman 1.6** 框架，本项目提供完整源码及两种主流的部署方式，适合不同场景下的开发与部署需求。

- 传统部署（nginx + php-fpm）
- Docker 部署（支持开发挂载卷和整体打包两种模式）

## 目录结构

```text
Webman/
  └── Webman-1.6/
      ├── ../                              # 官方原始源码
      └── docker/                          # docker相关配置
            ├──Dockerfile                  # Dockerfile 打包模式Dockerfile
            ├──Dockerfile.volume           # Dockerfile 挂载模式Dockerfile
            ├──docker-compose.yml          # 打包模式基础配置
            ├──docker-compose.override.yml # 挂载模式配置，自动被 docker-compose 读取并覆盖
            └──README.md                   # 当前版本的部署与适配说明
```

---

## 一、Docker 部署

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

#### 启动命令

```bash
cd Webman/Webman-1.6
docker-compose -f docker-compose.volume.yaml -p webman1_6-volume up -d --build
```

### 访问项目

```
# 假设端口映射为 `8053:8056`，具体请查看`docker-compose.volume.yaml`：
http://localhost:8053
```

### 2. 整体打包镜像模式

> 使用标准 Dockerfile 构建，镜像内包含完整代码，适合生产环境或快速部署。

#### 2.1 使用 docker-compose 启动

启动命令：

```bash
cd Webman/Webman-1.6/docker
docker-compose -f docker-compose.yaml -p webman1_6 up -d --build
```

#### 访问项目

```
# 假设端口映射为 `8054:8056`，具体请查看`docker-compose.yaml`：
http://localhost:8054
```

#### 2.2 直接使用 docker run 启动

构建镜像：

```bash
cd Webman/Webman-1.6
docker build -f docker/Dockerfile -t webman1_6:run .
```

启动容器：

```bash
docker run -d --name webman1_6-run -p 8058:8056 webman1_6:run
```

或者使用整体打包模式产生的镜像：整体打包时生成的镜像（`webman1_6:latest`），具体请查看`docker-compose.yaml`

启动容器（前提是存在webman1_6:latest镜像）：

```bash
docker run -d --name webman1_6-latest -p 8055:8056 webman1_6:latest
```

#### 访问项目

```
# 假设端口映射为 `8055:8056`，这里是根据docker run启动时指定的端口：
http://localhost:8055
```

#### 其它更多相关的docker、docker-compose命令请参考项目根目录README.md

## 注意事项

- **端口映射**：确保所选端口（如8080/8081/8082等）未被其他服务占用。
- **项目名冲突**：建议使用 `-p` 指定项目名，避免多个 compose 项目资源冲突。
- **文件挂载性能**：开发模式挂载卷有助于实时同步，但在 Windows/macOS 下性能有限，Linux/WSL2更佳。
- **环境变量配置**：如需自定义数据库、缓存等参数，请修改 `.env` 文件或 docker-compose 配置。

如需更多帮助，请查阅项目内详细文档或提交问题反馈。
