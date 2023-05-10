<?php

/**
 * 运行测试
 * > php cli.php
 */

use Nece001\PhpProgressBar\CliProgressBar;

require_once('../src/CliProgressBar.php');

$total = 10;
$bar = new CliProgressBar();
$bar->init($total);

for ($i = 1; $i <= $total; $i++) {
    $bar->update($i);

    sleep(1);
}
