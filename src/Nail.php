<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/31
 * Time: 22:16
 * 入口控制
 */

namespace xiaoyan\ydingtalk;


class Nail
{

    /**
     * 错误信息
     * @var null
     */
    protected static $error = null;

    /**
     * GET请求类
     * @param $url
     * @return false|string
     */
    public static function requestByGet($url)
    {
        return file_get_contents($url);
    }

    /**
     * 设置/获取 错位信息
     * @param null $msg
     * @return string
     */
    public static function error($msg = null)
    {
        if(!is_null($msg)){
            self::$erreor = $msg;
        }else{
            return self::$error;
        }
    }
}