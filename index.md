# PHP 主流框架历史版本归档与标准化部署集成

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/yourusername/yourproject.svg)](https://github.com/yourusername/yourproject/issues)
[![GitHub forks](https://img.shields.io/github/forks/yourusername/yourproject.svg)](https://github.com/yourusername/yourproject/network/members)
[![GitHub stars](https://img.shields.io/github/stars/yourusername/yourproject.svg)](https://github.com/yourusername/yourproject/stargazers)
[![Docker Pulls](https://img.shields.io/docker/pulls/yourdockerrepo/yourimage.svg)](https://hub.docker.com/r/yourdockerrepo/yourimage)

---

## 🚀 项目简介

本项目致力于汇集主流 PHP 框架及其历史版本源码，并为每个框架和版本提供标准化的 Docker 部署方案。所有源码均保持官方原版，未做任何二次修改，确保原生兼容性。支持两种主流部署方式：

- 一键 Docker 部署  
- 基于 PHP-FPM + Nginx 的原生环境部署  

适用于开发、测试、教学及自动化集成场景。

---

## ✨ 核心特性

- **全版本归档**  
  涵盖 Laravel、Symfony、ThinkPHP、Yii、CodeIgniter 等主流 PHP 框架及主要历史版本，持续补充中。  
- **标准化部署**  
  每个框架及版本配备可复用 Docker 方案，简化环境搭建，支持一键启动。  
- **原生兼容**  
  保持官方源码原样，支持 PHP-FPM + Nginx 原生环境，方便源码分析和历史项目迁移。  
- **规范结构**  
  统一目录和文档标准，便于查找、二次开发与协作。  
- **开放协作**  
  鼓励社区参与，欢迎补充版本及优化部署方案。

---

## 📚 支持框架与版本

| 框架名称   | 已收录版本                          | Docker 支持 | 官网 / GitHub 链接                                                                                 |
|------------|-----------------------------------|-------------|--------------------------------------------------------------------------------------------------|
| ThinkPHP   | 3.2, 5.0, 5.1, 6.x, 8.0           | 已完成      | [官网](https://www.thinkphp.cn/) / [GitHub](https://github.com/top-think/think)                   |
| Webman    | 1.x, 2.x                         | 已完成      | [官网](https://www.workerman.net/webman/) / [GitHub](https://github.com/walkor/webman)            |
| Laravel   | 4.2, 5.8, 6.x - 12.x              | 已完成      | [官网](https://laravel.com/) / [GitHub](https://github.com/laravel/laravel)                       |
| Yii       | 1.1, 2.0                        | 已完成      | [官网](https://www.yiiframework.com/) / [GitHub](https://github.com/yiisoft-contrib/yiiframework.com) |
| CakePHP   | 未开始                          | 否          | [官网](https://cakephp.org/) / [GitHub](https://github.com/cakephp/cakephp)                       |
| CodeIgniter| 2.x, 3.x, 4.x                   | 已完成      | [官网](https://codeigniter.com/) / [GitHub](https://github.com/codeigniter4/CodeIgniter4)         |
| Hyperf    | 未开始                          | 否          | [官网](https://www.hyperf.io/) / [GitHub](https://github.com/hyperf/hyperf)                       |
| Phalcon   | 未开始                          | 否          | [官网](https://phalcon.io/en-us) / [GitHub](https://github.com/phalcon/phalcon)                   |
| Symfony   | 未开始                          | 否          | [官网](https://symfony.com/) / [GitHub](https://github.com/symfony/symfony)                       |

---

## 🎯 适用对象

- PHP 应用开发者与运维工程师  
- 框架学习、研究及版本对比分析人员  
- 需要支持历史项目或多框架环境测试的团队  
- DevOps、自动化测试及持续集成场景  

---

## 📂 目录结构示例

```text
<framework>/
  └── <version>/
      ├── ../                              # 官方源码
      ├── nginx.conf                      # Nginx 配置文件
      └── docker/                         # Docker 相关配置
            ├── Dockerfile                # 打包镜像用 Dockerfile
            ├── Dockerfile.volume         # 宿主机挂载代码用 Dockerfile
            ├── docker-compose.yml        # 打包版 Compose 配置
            ├── docker-compose.override.yml # 挂载版覆盖配置
            └── README.md                 # 部署说明文档
```

## ⚡ 快速开始

1. 克隆仓库

```bash
git clone https://github.com/php-related/frameworks-docker.git
cd frameworks-docker
```

2. 选择框架与版本
复制所需框架版本完整文件夹（包含源码和相关配置），例如：

```bash
cp -r Laravel/laravel-12.x /your/workspace/
```

注意

本项目一般以大版本（如 12.x）为标识，通常对应最新稳定小版本。仅当小版本间存在显著差异时，才单独维护。

3. 反馈缺失版本
如果使用时发现有重要小版本未收录，欢迎通过 Issues 联系我，并提供具体版本信息，我会尽快补充。

## 🐳 Docker 一键部署（推荐）

前置要求：

Docker 20.10+
Docker Compose 1.28+（或 Docker Desktop 内置版本）
以 Laravel 12.x 为例：

```bash
cd Laravel/laravel-12.x/docker
```

# 开发调试（宿主机挂载代码）

```bash
docker-compose -f docker-compose.volume.yaml -p laravel12-volume up -d --build
```

# 生产运行（整体打包）

```bash
docker-compose -f docker-compose.yaml -p laravel12 up -d --build
```

## 🖥️ 原生环境部署

详细步骤请参考对应目录中的 docker/README.md，示例：`Laravel/laravel-12.x/docker/README.md`

- 根据说明配置 PHP-FPM 与 Nginx
- 建议结合官方文档确保部署流程正确
- 保持与官方文档一致，便于对比操作
- 遇到问题及时查阅文档或寻求帮助

## 🛠 常用 Docker 命令参考

| Docker 单容器命令 |  |
| --- | --- |
| 操作 | 命令示例 |
| 构建镜像 | `docker build -f Dockerfile -t laravel12:latest .` |
| 启动容器 | `docker run -d --name laravel12 -p 8082:80 laravel12:latest` |
| 查看容器 | `docker ps` |
| 查看所有容器 | `docker ps -a` |
| 查看日志 | `docker logs -f laravel12` |
| 进入容器 | `docker exec -it laravel12 sh` |
| 停止容器 | `docker stop laravel12` |
| 删除容器 | `docker rm laravel12` |

| Docker Compose 多容器命令 |  |
| --- | --- |
| 操作 | 命令示例 |
| 启动并构建 | `docker-compose -f docker-compose.yaml up -d --build` |
| 停止并删除 | `docker-compose -f docker-compose.yaml down` |
| 重启服务 | `docker-compose -f docker-compose.yaml restart laravel12` |
| 清理孤儿容器 | `docker-compose -f docker-compose.yaml up -d --remove-orphans` |
| 查看日志 | `docker-compose -f docker-compose.yaml logs -f` |
| 进入容器 | `docker-compose -f docker-compose.yaml exec laravel12 sh` |

## 📖 贡献指南

- 欢迎通过 Issue 提交需求、报告问题或建议新框架版本。
- 提交 PR 前请遵守项目结构规范，附带详细说明。
- 详细流程见 CONTRIBUTING.md。

## 📜 许可证

本项目源码均来自官方渠道，遵守各自开源协议（MIT、Apache-2.0、GPL 等）。

本项目附加脚本及文档统一采用 MIT 许可证，详见 LICENSE。

## 📬 联系方式

- GitHub Issues（首选）：提交问题
- 邮箱：<panxu71@163.com>
- 欢迎 Star 和 Fork，支持 PHP 开发社区！

> 免责声明

本项目所有源码均采自官方渠道，未经任何修改。版权归原作者所有，仅供开发、学习及快速搭建环境使用。
