<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/2
 * Time: 20:19
 * 通讯录权限范围类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Auth extends Template
{
    /**
     * 获取通讯录权限范围
     * @return mixed
     */
    public function scopes()
    {
        $url = self::$url.'/auth/scopes?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}