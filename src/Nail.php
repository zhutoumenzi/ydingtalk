<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/31
 * Time: 22:16
 */

namespace xiaoyan\ydingtalk;


class Nail
{

    /**
     * GET请求类
     * @param $url
     * @return false|string
     */
    public static function requestByGet($url)
    {
        return file_get_contents($url);
    }
}