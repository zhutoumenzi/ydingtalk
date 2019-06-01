<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 21:00
 * 部门管理类
 */

namespace xiaoyan\ydingtalk\operate;


class Department extends Template
{
    /**
     * 获取子部门ID列表
     * @param $id
     * @return mixed
     */
    public function list_ids($id)
    {
        $url = self::$url.'/department/list_ids?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门列表
     * @return mixed
     */
    public function lists()
    {
        $url = self::$url.'/department/list?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门详情
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $url = self::$url.'/department/get?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询部门的所有上级父部门路径
     * @param $id
     * @return mixed
     */
    public function list_parent_depts_by_dept($id)
    {
        $url = self::$url.'/department/list_parent_depts_by_dept?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询指定用户的所有上级父部门路径
     * @param $userId
     * @return mixed
     */
    public function list_parent_depts($userId)
    {
        $url = self::$url.'/department/list_parent_depts?access_token='.self::$token.'&userId='.$userId;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}