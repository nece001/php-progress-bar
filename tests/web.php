<?php

/**
 * 运行测试方法
 * php内置web服务器是单进程执行的，所以要启两个进程才能达到效果
 * 
 * php -S 0.0.0.0:5689
 * 启动处理过程：http://127.0.0.1:5689/web.php
 * 
 * php -S 0.0.0.0:5679
 * 查看进度：http://127.0.0.1:5679/web.php?act=1
 */

use Nece001\PhpProgressBar\WebProgressBar;

require_once('../src/WebProgressBar.php');

$act = isset($_GET['act']) ? $_GET['act'] : '';

switch ($act) {
    case 1:
        update();
        break;
    default:
        start();
}

function start()
{
    $total = 5;
    $bar = new WebProgressBar();
    $bar->init($total);
    for ($i = 1; $i <= $total; $i++) {
        $bar->update($i);
        sleep(1);
    }
}

function update()
{
    $bar = new WebProgressBar();
    $result = $bar->getProgress();
    print_r($result);
}
