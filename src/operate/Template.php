<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 14:36
 * 模板
 */

namespace xiaoyan\ydingtalk\operate;


class Template
{
    private static $url;//接口地址

    private static $headers;//协议头

    private static $token;//ACCESS_TOKEN

    private static $_instance;

    private function __construct($token, $headers)
    {
        self::$token = $token;
        self::$headers = $headers;
    }

    public static function getInstance($token, $headers)
    {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($token, $headers);
        }
        return self::$_instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}