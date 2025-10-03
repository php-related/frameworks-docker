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

- 2019-04-18 Zend Framework 进入 Linux 基金会，重命名为 Laminas，更多详情请查看 [Zend Framework官网](https://framework.zend.com/)。

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
      ├── ../                               # 源代码
      ├── nginx.conf                        # Nginx  配置
      └── docker/                           # Docker 配置
            ├── Dockerfile                  # 镜像模式 Dockerfile
            ├── Dockerfile.volume           # 挂载模式 Dockerfile
            ├── docker-compose.yml          # 镜像模式启动配置
            ├── docker-compose.volume.yml   # 挂载模式启动配置
            └── README.md                   # 部署说明文档
```

## ⚡ 快速开始

1. 克隆仓库

```bash
git clone https://github.com/php-related/frameworks-docker.git
```

2. 选择框架与版本
复制所需框架版本完整文件夹，包含源码和相关配置，例如：

```bash
cp -r frameworks-docker/Laravel/laravel-12.x /your/workspace/
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
