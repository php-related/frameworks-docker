# PHP主流框架历史版本归档与标准化部署集成

## 项目简介

本项目致力于汇集主流 PHP 框架及其历史版本源码，并为每个框架和版本提供标准化的 Docker 部署方案。所有框架源码均保持官方原版，未做任何二次修改，确保原生兼容性。项目支持两种主流部署方式：一键 Docker 部署和基于 PHP-FPM + Nginx 的原生环境部署，便于开发、测试、教学及自动化集成场景下灵活适配。

## 核心特性

- **全版本归档**：涵盖 Laravel、Webman、Symfony、ThinkPHP、Yii、CodeIgniter 等主流 PHP 框架及主要历史版本，持续补充中。
- **标准化部署**：每个框架及版本均配备可复用的 Docker 部署方案，极大简化环境搭建流程，支持一键启动。
- **原生兼容**：所有框架源码均为官方原版，支持直接通过 PHP-FPM + Nginx 部署，适用于源码分析与历史项目迁移。
- **规范结构**：统一的目录命名和文档体系，方便查找、二次开发与团队协作。
- **开放协作**：鼓励社区参与，欢迎补全更多历史版本或优化部署方案。

## 框架与版本支持情况

| 框架名称    | 已收录版本                         | Docker部署支持情况 | 官网/GitHub地址                                                                                 |
| ----------- | -------------------------------- | ------------------ | ---------------------------------------------------------------------------------------------- |
| ThinkPHP    | 3.2, 5.0, 5.1, 6.x, 8.0          | 已完成             | [官网](https://www.thinkphp.cn/) / [GitHub](https://github.com/top-think/think)               |
| Webman     | 1.6, 2.1                         | 已完成             | [官网](https://www.workerman.net/webman/) / [GitHub](https://github.com/walkor/webman)        |
| Laravel    | 4.2, 5.8, 6.x, 7.x, 8.x, 9.x, 10.x, 11.x, 12.x | 已完成           | [官网](https://laravel.com/) / [GitHub](https://github.com/laravel/laravel)                    |
| Yii        | 1.1, 2.0                        | 已完成             | [官网](https://www.yiiframework.com/) / [GitHub](https://github.com/yiisoft-contrib/yiiframework.com) |
| CakePHP    | 3.x, 4.x, 5.x                          | 已完成               | [官网](https://cakephp.org/) / [GitHub](https://github.com/cakephp/cakephp)                    |
| CodeIgniter| 2.x, 3.x, 4.x                   | 已完成             | [官网](https://codeigniter.com/) / [GitHub](https://github.com/codeigniter4/CodeIgniter4)     |
| Hyperf     | 1.x, 2.x, 3.x                          | 已完成                 | [官网](https://www.hyperf.io/) / [GitHub](https://github.com/hyperf/hyperf)                   |
| Symfony    | 3.x, 4.x, 5.x, 6.x, 7.x                          | 已完成                 | [官网](https://symfony.com/) / [GitHub](https://github.com/symfony/symfony)                   |
|Slim    | 3.x, 4.x                          | 进行中                 | [官网](https://www.slimframework.com/) / [GitHub](https://github.com/slimphp/Slim)                   |
|Fat-Free   | 3.x                          | 进行中                 | [官网](https://www.fatfreeframework.com/) / [GitHub](https://github.com/bcosca/fatfree)                   |
|Flight   | 3.x                          | 进行中                 | [官网](https://docs.flightphp.com/) / [GitHub](https://github.com/flightphp/core)                   |
|Fuel   | 1.9                          | 进行中                 | [官网](https://fuelphp.com/) / [GitHub](https://github.com/fuel/fuelphp.com)                   |
|Nette   | 3.x                          | 已完成                 | [官网](https://nette.org/) / [GitHub](https://github.com/nette/nette)                   |
|PHPixie   | 3.x                          | 已完成                 | [官网](https://phpixie.com/) / [GitHub](https://github.com/phpixie/project)                   |
|Aura   | 2.x                          | 已完成                 | [官网](https://auraphp.com/) / [GitHub](https://github.com/auraphp/auraphp.github.io)                   |
|Lumen    | 10.x                          | 已完成                 | [官网](https://lumen.laravel.com/) / [GitHub](https://github.com/laravel/lumen)                   |
|Laminas(Zend Framework)    | 2.x          | 已完成     | [官网](https://getlaminas.org/)  / [GitHub](https://github.com/laminas/laminas-mvc-skeleton)                   |

- Laminas说明：2019-04-18 Zend Framework 进入 Linux 基金会，重命名为 Laminas，更多详情请查看 [Zend Framework官网](https://framework.zend.com/)。

## 适用对象

- PHP 应用开发者及运维工程师
- 框架学习、研究与对比分析人员
- 需要支持历史项目或多框架环境测试的团队
- DevOps、自动化测试和持续集成场景

## 目录结构说明

```text
<framework>/
  └── <version>/
      ├── ../                               # 源代码
      ├── nginx.conf                        # nginx 配置
      └── docker/                           # docker配置
            ├── Dockerfile                  # 镜像模式 dockerfile
            ├── Dockerfile.volume           # 挂载模式 dockerfile
            ├── docker-compose.yml          # 镜像模式启动配置
            ├── docker-compose.volume.yml   # 挂载模式启动配置
            └── README.md                   # 部署说明文档
```

## 快速开始

1. 克隆仓库

```bash
git clone https://github.com/php-related/frameworks-docker.git
```

2. 选择框架与版本
复制所需框架版本完整文件夹，包含源码和相关配置，例如：

```bash
cp -r frameworks-docker/Laravel/laravel-12.x /your/workspace/
```

从远程仓库克隆项目到本地后，选择所需的框架版本，复制对应的完整版本文件夹（包含所有文件），该文件夹即为框架的完整源码。例如：Laravel/laravel-12.x。

需要特别说明的是，并非每个小版本都会单独收录，如 Laravel 12 可能包含 12.1.0、12.2.0、12.3.0 等多个小版本，本项目统一以大版本（如 12.x）为标识，通常对应该大版本下的最新稳定小版本（即创建项目时的最新版本）。仅当两个小版本间存在显著架构或功能差异时，才会区分不同小版本源码进行维护。

如果您在使用过程中发现某些小版本之间存在较大差异，而本项目尚未单独收录该版本源码，欢迎您与我联系，并提供具体需要补充的小版本信息，我会根据需求尽快完善相关版本资源。

### 一、Docker 一键部署（推荐）

**特别说明**
请参考各框架对应版本的详细部署说明，文档位置位于 `<framework>/<version>/docker/README.md`，其中包含完整且具体的安装与配置指导，方便您快速上手使用。如:`/frameworks-docker/Webman/webman-2.1/docker/README.md`

### 环境准备

- 已安装 [Docker](https://docs.docker.com/get-docker/)
- 已安装 [docker-compose](https://docs.docker.com/compose/install/)
- 推荐使用 Linux 或 WSL2 等高性能本地开发环境

适合希望使用容器技术快速启动和环境隔离的用户。

Docker 部署支持两种模式：

- 挂载模式：代码与宿主机同步，适合开发调试
- 镜像模式：镜像内包含代码，适合生产或快速测试

以 Laravel 12.x 为例：

### 1. 挂载模式

> 使用 `docker-compose.volume.yaml` 配置，宿主机代码实时映射到容器。

启动容器：

```bash
docker-compose -f ./laravel-12.x/docker/docker-compose.volume.yaml -p laravel12-volume up -d --build
```

## 2. 镜像模式

> 使用标准 Dockerfile 构建，镜像内包含完整代码，适合生产环境或快速部署。

#### 2.1 使用 docker-compose 启动

启动容器：

```bash
docker-compose -f ./laravel-12.x/docker/docker-compose.yaml -p laravel12 up -d --build
```

#### 2.2 直接使用 docker run 启动

构建镜像：

```bash
docker build -f ./laravel-12.x/docker/Dockerfile -t laravel12:run /laravel-12.x/docker
```

启动容器：

```bash
docker run -d --name laravel12-run -p 8083:80 laravel12:run
```

或者使用镜像模式产生镜像：（`laravel12:latest`），具体请查看`docker-compose.yaml`。

```bash
docker run -d --name laravel12-latest -p 8083:80 laravel12:latest
```

---

### 二、源码与传统部署（nginx + php-fpm）

除 Webman 和 Hyperf 框架外，其他框架均支持传统的部署方式。具体操作请参阅各框架对应版本目录下的 docker 文件夹中的 README.md 文档，例如：Laravel/laravel-12.x/docker/README.md。

- 按照 README.md 中的指导，配置本地 PHP-FPM 和 Nginx 服务，实现框架的原生环境部署。
- 本项目与官方文档保持高度一致，建议结合官方说明进行操作，确保部署流程的准确性和可靠性。

如果您在使用过程中发现某些框架的原生环境部署流程存在较大差异，欢迎您与我联系，并提供具体需要补充的框架信息，我会根据需求尽快完善相关版本资源。

---

# Docker常用命令

在本项目中，涉及到两类主要命令：

- **`docker` 命令**：用于单个容器的构建、启动、管理
- **`docker-compose` 命令**：用于多容器编排的启动、停止及管理

## 一、常用 Docker 命令（单容器操作）

### 构建镜像

```bash
docker build -f Dockerfile -t laravel12:latest .
```

启动容器

```bash
docker run -d --name laravel12-run -p 8082:80 laravel12:latest
```

查看所有运行中的容器

```bash
docker ps
```

查看所有容器（包含已停止）

```bash
docker ps -a
```

查看容器日志

```bash
docker logs -f laravel12-run
```

进入容器终端

```bash
docker exec -it laravel12-run sh
```

停止容器

```bash
docker stop laravel12-run
```

删除容器

```bash
docker rm laravel12-run
```

## 二、常用 Docker Compose 命令（多容器编排）

启动并构建服务

```bash
docker-compose -f docker-compose.yaml up -d --build
```

停止并移除所有服务容器

```bash
docker-compose -f docker-compose.yaml down
```

重启服务

```bash
docker-compose -f docker-compose.yaml restart laravel12
```

清理孤儿容器（未被 Compose 管理的剩余容器）

```bash
docker-compose -f docker-compose.yaml up -d --remove-orphans
```

## 三、使用建议

单容器场景（如整体打包镜像直接运行），推荐使用 docker 命令。
多容器场景（如数据库、缓存和应用容器一起启动），使用 docker-compose 管理更方便。
在文档或脚本中明确区分两者，避免混淆。

## 四、示例对比

| 操作 | 单容器命令示例 | 多容器命令示例|
|------------------------------|--------------------|--------------------------|
| 构建镜像 | docker build -f Dockerfile -t laravel12 . | docker-compose -f docker-compose.yaml build|
| 启动服务 | docker run -d -p 8082:80 laravel12 | docker-compose -f docker-compose.yaml up -d|
| 停止服务 | docker stop laravel12-run | docker-compose -f docker-compose.yaml down|
| 查看日志 | docker logs -f laravel12-run | docker-compose -f docker-compose.yaml logs -f|
| 进入终端 | docker exec -it laravel12-run sh | docker exec -it <服务名>  sh|

请根据实际部署方式选择对应的命令使用。

## 总结

| 方式                         | 适用场景           | 特点                     |
|------------------------------|--------------------|--------------------------|
|传统 nginx+php-fpm |传统服务器或自定义环境|灵活可控，需环境手动配置|
| docker-compose.yaml           | 生产/标准开发      | 镜像包含代码，启动即用   |
| docker-compose.volume.yaml    | 本地开发调试       | 宿主机代码同步，无需重建 |
| docker run（整体打包）        | 部署/测试/演示      | 一条命令，快速启动       |

---

### 说明

- 这样结构清晰，方便用户根据需求选择部署方式
- 传统部署放在第一个，满足你“源码+传统部署”的初衷
- Docker 部署分两层，挂载卷和整体打包，且整体打包又支持 docker-compose 和 docker run 两种启动

---

# 贡献指南

- 欢迎通过 Issue 提交需求、报告 bug 或建议新框架/版本支持。
- 提交 Pull Request 前请确保遵守本项目结构规范，并针对新增内容附带详细说明文档。
- 具体贡献流程及代码规范详见 [CONTRIBUTING.md]。

# 开源协议

本项目框架源码均来源于各官方开源仓库，遵循其原始许可证（MIT、Apache-2.0、GPL 等）。本仓库附加的部署脚本及文档统一采用 MIT 协议，详见 [LICENSE]。

# 联系与支持

- GitHub Issue 是首选的沟通与讨论渠道。
- 如需私信交流，请联系邮箱：[panxu71@163.com](mailto:panxu71@163.com)
- 欢迎 star、fork 本仓库，助力 PHP 社区生态建设！

本项目所有框架源码均源自官方渠道，未作任何修改，相关版权归原作者所有。仅为便于开发、学习及快速环境搭建而整理提供。
