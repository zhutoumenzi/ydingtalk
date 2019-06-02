<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 14:36
 * 模板
 */

namespace xiaoyan\ydingtalk;


abstract class Template
{
    protected static $url;//接口地址

    protected static $headers;//协议头

    protected static $token;//ACCESS_TOKEN

    private static $_instance = [];

    private function __construct($token, $url, $headers)
    {
        self::$token = $token;
        self::$url = $url;
        self::$headers = $headers;
    }

    /**
     * 切换访问类
     * @param $token
     * @param $url
     * @param $headers
     * @return mixed
     */
    public static function getInstance($token, $url, $headers)
    {
        $name = get_called_class();
        if(!isset(self::$_instance[$name])){
            self::$_instance[$name] = new $name($token, $url, $headers);
        }
        return self::$_instance[$name];
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}