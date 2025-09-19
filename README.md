[TOC]

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

<framework>/
  └── <version>/
      ├── src/                   # 官方原始源码
      ├── docker/                # Dockerfile、docker-compose.yml、Nginx 配置等
      └── README.md              # 当前版本的部署与适配说明

## 快速开始

### 1. Docker 一键部署（推荐）

以 Laravel 8.x 为例：

```shell
cd laravel/8.x/docker
docker-compose up -d
```

### 2. 原生环境部署

- 进入所需框架及版本目录，获取 src/ 下官方源码。
- 参考 README.md 配置本地 PHP-FPM 与 Nginx 服务，实现原生部署。
- 项目保证与官方文档保持一致，可直接对比官方说明操作。

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

## 说明

- 目录结构已具备可扩展性，便于后续收录更多框架及版本。
- README语气正式、术语清晰，适用于企业或大型开源项目场景。
- 使用“官方原始源码、标准化部署、统一结构”等关键词突出专业性。
- 快速开始部分直观给出操作参考，降低上手门槛。

如需更细致的各版本下 README 模板或 Docker 部署实例说明，也可随时说明！
