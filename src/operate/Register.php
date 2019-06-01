<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 15:04
 * 登录类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;

class Register extends Template
{
    /**
     * 获取用户userid
     * @param $code 前端免登录code
     * @return mixed
     */
    public function getuserinfo($code)
    {
        $url = self::$url.'/user/getuserinfo?access_token='.self::$token.'&code='.$code;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}