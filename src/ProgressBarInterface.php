<?php

namespace Nece001\PhpProgressBar;

interface ProgressBarInterface
{
    /**
     * 初始
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-10
     *
     * @param int $total 总数量
     *
     * @return void
     */
    public function init($total);

    /**
     * 更新并输入进度条
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-10
     *
     * @param int $current 当前处理数量
     *
     * @return void
     */
    public function update($current);

    /**
     * 获取进度
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-10
     *
     * @return array
     */
    public function getProgress();
}
