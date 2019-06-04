<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 15:25
 * 公告类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Blackboard extends Template
{
    /**
     * 获取用户公告数据
     * @param array $arr['userid'] //用户id
     * @return mixed
     */
    public function listtopten($arr = [])
    {
        $url = self::$url.'/topapi/blackboard/listtopten?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}