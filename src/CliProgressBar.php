<?php

namespace Nece001\PhpProgressBar;

/**
 * Cli方式的进度条
 *
 * @Author nece001@163.com
 * @DateTime 2023-05-10
 */
class CliProgressBar implements ProgressBarInterface
{
    private $current;
    private $total;
    private $percent;

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
    public function init($total)
    {
        $this->total = $total;
    }

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
    public function update($current)
    {
        $this->current = $current;
        $number = intval($current / $this->total * 50);
        $this->percent = round($current / $this->total * 100, 2);
        printf("progress: [%-50s] %d%% Done\r", str_repeat('#', $number), $this->percent);
    }

    /**
     * 获取进度
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-10
     *
     * @return array
     */
    public function getProgress()
    {
        return array('current' => $this->current, 'total' => $this->total, 'percent' => $this->percent . '%');
    }
}
