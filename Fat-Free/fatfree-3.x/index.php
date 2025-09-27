<?php
// 引入 Fat-Free Framework
$f3 = require('./base.php');

// 定义路由
$f3->route('GET /', function () {
    echo 'Hello, Fat-Free Framework!';
});

// 运行应用
$f3->run();
