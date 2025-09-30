# Hyperf 3.x Framework 项目使用说明

本项目基于 **PHP Hyperf 3.x** 框架，本项目提供完整源码及两种主流的部署方式，适合不同场景下的开发与部署需求。

- 传统模式启动（参考官网）
- Docker 部署（支持开发挂载卷和整体打包两种模式）

## 目录结构

```text
Hyperf/
  └── hyperf-3.x/
      ├── ../                               # 源代码
      └── docker/                           # docker配置
            ├── Dockerfile                  # 镜像模式 dockerfile
            ├── Dockerfile.volume           # 挂载模式 dockerfile
            ├── docker-compose.yml          # 镜像模式启动配置
            ├── docker-compose.volume.yml   # 挂载模式启动配置
            └── README.md                   # 部署说明文档
```

---

## Docker 部署

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
cd Hyperf-f  /hyperf-3.x/docker/docker-compose
docker-compose -f  /hyperf-3.x/docker/docker-compose.volume.yaml -p hyperf3-volume up -d --build
```

访问项目：

```
# 假设端口映射为 `8500:9501`，具体请查看`docker-compose.volume.yaml`：
http://localhost:8500
```

### 2. 镜像模式

> 使用标准 Dockerfile 构建，镜像内包含完整代码，适合生产环境或快速部署。

#### 2.1 使用 docker-compose 启动

启动容器：

```bash
docker-compose -f  /hyperf-3.x/docker/docker-compose.yaml -p hyperf3 up -d --build
```

访问项目：

```
http://localhost:8501
```

假设端口映射为 `8501:9501`，具体请查看`docker-compose.yaml`

#### 2.2 直接使用 docker run 启动

构建镜像：

```bash
docker build -f ./hyperf-3.x/docker/Dockerfile -t hyperf3:run /hyperf-3.x/docker
```

启动容器：

```bash
docker run -d --name hyperf3-run -p 8502:9501 hyperf3:run
```

或者使用镜像模式产生镜像：（`hyperf3:latest`），具体请查看`docker-compose.yaml`。

```bash
docker run -d --name hyperf3-latest -p 8502:9501 hyperf3:latest
```

访问项目：

```
http://localhost:8502
```

假设端口映射为 `8502:9501`，这里是根据docker run启动时指定的端口

#### 其它更多相关的docker、docker-compose命令请参考项目根目录README.md

## 注意事项

- **端口映射**：确保所选端口（如8080/8081/8082等）未被其他服务占用。
- **项目名冲突**：建议使用 `-p` 指定项目名，避免多个 compose 项目资源冲突。
- **文件挂载性能**：开发模式挂载卷有助于实时同步，但在 Windows/macOS 下性能有限，Linux/WSL2更佳。
- **环境变量配置**：如需自定义数据库、缓存等参数，请修改 `.env` 文件或 docker-compose 配置。

如需更多帮助，请查阅项目内详细文档或提交问题反馈。
