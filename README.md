# PHP主流框架历史版本归档与标准化部署集成

## 项目简介

本项目致力于汇集主流 PHP 框架及其历史版本源码，并为每个框架和版本提供标准化的 Docker 部署方案。所有框架源码均保持官方原版，未做任何二次修改，确保原生兼容性。项目支持两种主流部署方式：一键 Docker 部署和基于 PHP-FPM + Nginx 的原生环境部署，便于开发、测试、教学及自动化集成场景下灵活适配。

## 核心特性

- **全版本归档**：涵盖 Laravel、Symfony、ThinkPHP、Yii、CodeIgniter 等主流 PHP 框架及主要历史版本，持续补充中。
- **标准化部署**：每个框架及版本均配备可复用的 Docker 部署方案，极大简化环境搭建流程，支持一键启动。
- **原生兼容**：所有框架源码均为官方原版，支持直接通过 PHP-FPM + Nginx 部署，适用于源码分析与历史项目迁移。
- **规范结构**：统一的目录命名和文档体系，方便查找、二次开发与团队协作。
- **开放协作**：鼓励社区参与，欢迎补全更多历史版本或优化部署方案。

## 框架与版本支持情况

| 框架名称    | 已收录版本                         | Docker部署支持情况 | 官网/GitHub地址                                                                                 |
| ----------- | -------------------------------- | ------------------ | ---------------------------------------------------------------------------------------------- |
| ThinkPHP    | 3.2, 5.0, 5.1, 6.x, 8.0          | 已完成             | [官网](https://www.thinkphp.cn/) / [GitHub](https://github.com/top-think/think)               |
| Webman     | 1.x, 2.x                         | 已完成             | [官网](https://www.workerman.net/webman/) / [GitHub](https://github.com/walkor/webman)        |
| Laravel    | 4.2, 5.8, 6.x, 7.x, 8.x, 9.x, 10.x, 11.x, 12.x | 已完成           | [官网](https://laravel.com/) / [GitHub](https://github.com/laravel/laravel)                    |
| Yii        | 1.1, 2.0                        | 已完成             | [官网](https://www.yiiframework.com/) / [GitHub](https://github.com/yiisoft-contrib/yiiframework.com) |
| CakePHP    | 未开始                          | 否                 | [官网](https://cakephp.org/) / [GitHub](https://github.com/cakephp/cakephp)                    |
| CodeIgniter| 2.x, 3.x, 4.x                   | 已完成             | [官网](https://codeigniter.com/) / [GitHub](https://github.com/codeigniter4/CodeIgniter4)     |
| Hyperf     | 未开始                          | 否                 | [官网](https://www.hyperf.io/) / [GitHub](https://github.com/hyperf/hyperf)                   |
| Phalcon    | 未开始                          | 否                 | [官网](https://phalcon.io/en-us) / [GitHub](https://github.com/phalcon/phalcon)               |
| Symfony    | 未开始                          | 否                 | [官网](https://symfony.com/) / [GitHub](https://github.com/symfony/symfony)                   |

## 适用对象

- PHP 应用开发者及运维工程师
- 框架学习、研究与对比分析人员
- 需要支持历史项目或多框架环境测试的团队
- DevOps、自动化测试和持续集成场景

## 目录结构说明

```text
<framework>/
  └── <version>/
      ├── ../                              # 官方原始源码
      ├── nginx.conf                       # 原生环境部署 Nginx 配置
      └── docker/                          # docker相关配置
            ├──Dockerfile                  # Dockerfile 打包模式Dockerfile
            ├──Dockerfile.volume           # Dockerfile 挂载模式Dockerfile
            ├──docker-compose.yml          # 打包模式基础配置
            ├──docker-compose.override.yml # 挂载模式配置，自动被 docker-compose 读取并覆盖
            └──README.md                   # 当前版本的部署与适配说明
```

## 快速开始

colne项目到本地，选择自己需要的框架，拷贝整个版本文件夹（全部文件），即为框架源码，如：`Laravel/laravel-12.0`。

### 1. Docker 一键部署（推荐）

先决条件

- 安装 Docker（版本建议 20.10+）
- 安装 Docker Compose（版本建议 1.28+ 或使用 Docker Desktop 自带版本）

以 Laravel 12.x 为例：

```shell
cd Laravel/laravel-12.0/docker

1. 开发调试（带挂载）
docker-compose -f docker-compose.volume.yaml -p laravel12-volume up -d --build

2. 生产运行（整体打包）（推荐）
docker-compose -f docker-compose.yaml -p laravel12 up -d --build
```

---

### 2. 原生环境部署

具体请参考对应框架下的docker目录中的README.md，如：`Laravel/laravel-12.x/docker/README.md`

- 参考 README.md 配置本地 PHP-FPM 与 Nginx 服务，实现原生部署。
- 项目保证与官方文档保持一致，可直接对比官方说明操作。

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
docker-compose -f docker-compose.yaml restart <容器名称>
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

| 操作	| 单容器命令示例	| 多容器命令示例| 
|------------------------------|--------------------|--------------------------|
| 构建镜像	| docker build -f Dockerfile -t laravel12 .	| docker-compose -f docker-compose.yaml build| 
| 启动服务	| docker run -d -p 8082:80 laravel12	| docker-compose -f docker-compose.yaml up -d| 
| 停止服务	| docker stop laravel12-run	| docker-compose -f docker-compose.yaml down| 
| 查看日志	| docker logs -f laravel12-run	| docker-compose -f docker-compose.yaml logs -f| 
| 进入终端	| docker exec -it laravel12-run sh	| docker exec -it <服务名>  sh| 

请根据实际部署方式选择对应的命令使用。

## 总结

| 方式                         | 适用场景           | 特点                     |
|------------------------------|--------------------|--------------------------|
|传统 nginx+php-fpm	|传统服务器或自定义环境|灵活可控，需环境手动配置|
| docker-compose.yaml           | 生产/标准开发      | 镜像包含代码，启动即用   |
| docker-compose.volume.yaml    | 本地开发调试       | 宿主机代码同步，无需重建 |
| docker run（整体打包）        | 部署/测试/演示      | 一条命令，快速启动       |

---

### 说明：

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
