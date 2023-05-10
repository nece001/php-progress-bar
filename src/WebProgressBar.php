<?php

namespace Nece001\PhpProgressBar;

/**
 * Web方式的进度条（用session保存数据）
 *
 * @Author nece001@163.com
 * @DateTime 2023-05-10
 */
class WebProgressBar implements ProgressBarInterface
{
    const SESSION_KEY = '__php_progress_bar_session_key_20230510__';

    private $key;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-10
     *
     * @param string $prefix 前缀，用于多个进度条时区分数据
     */
    public function __construct($prefix = '')
    {
        $this->key = $prefix . self::SESSION_KEY;
    }

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
        session_start();
        $_SESSION[$this->key] = array('total' => $total, 'current' => 0, 'percent' => 0);
        session_write_close();
    }

    /**
     * 更新进度
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
        session_start();
        $_SESSION[$this->key]['current'] = $current;
        $_SESSION[$this->key]['percent'] = Round($current / $_SESSION[$this->key]['total'] * 100, 2) . '%';
        session_write_close();
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
        session_start();
        return $_SESSION[$this->key];
    }
}
