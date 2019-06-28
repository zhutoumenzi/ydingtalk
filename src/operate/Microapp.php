<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/28
 * Time: 14:41
 * 应用管理类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;

class Microapp
{
    /**
     * 获取应用列表
     * @param array $arr
     * @return mixed
     */
    public function lists($arr = [])
    {
        $url = self::$url.'/microapp/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取员工可见的应用列表
     * @param $manager
     * @return mixed
     */
    public function list_by_userid($manager)
    {
        $url = self::$url.'/microapp/list_by_userid?access_token='.self::$token.'&&userid='.$manager;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取应用的可见范围
     * @param array $arr['agentId'] //需要查询的应用实例化agentId
     * @return mixed
     */
    public function visible_scopes($arr = [])
    {
        $url = self::$url.'/microapp/visible_scopes?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 设置应用的可见范围
     * @param array $arr['agentId'] //应用实例化id
     * @param array $arr['isHidden'] //是否仅限管理员可见，true代表仅限管理员可见
     * @param array $arr['deptVisibleScopes'] //设置可见的部门id列表，格式为JSON数组
     * @param array $arr['userVisibleScopes'] //设置可见的部门id列表，格式为JSON数组
     * @return mixed
     */
    public function set_visible_scopes($arr = [])
    {
        $url = self::$url.'/microapp/set_visible_scopes?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}