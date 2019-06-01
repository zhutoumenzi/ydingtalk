<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 16:21
 * 用户管理类
 */

namespace xiaoyan\ydingtalk\operate;


class User extends Template
{
    public function getUserView($userid)
    {
        $url = self::$url.'/user/get?access_token='.self::$token.'&userid='.$userid;
    }
}