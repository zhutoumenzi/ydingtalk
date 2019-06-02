<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 21:46
 * 角色管理
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Role extends Template
{
    /**
     * 获取角色列表
     * @return mixed
     */
    public function lists()
    {
        $url = self::$url.'/topapi/role/list?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取角色下的员工列表
     * @param array $arr['role_id'] //角色ID
     * @param array $arr['size'] //分页大小，默认值：20，最大值200
     * @param array $arr['offset'] //分页偏移，默认值：0
     * @return mixed
     */
    public function simplelist($arr = [])
    {
        $url = self::$url.'/topapi/role/simplelist?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取角色组
     * @param array $arr['group_id'] //角色组的Id
     * @return mixed
     */
    public function getrolegroup($arr = [])
    {
        $url = self::$url.'/topapi/role/getrolegroup?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取角色详情
     * @param array $arr['roleId'] //角色Id
     * @return mixed
     */
    public function getrole($arr = [])
    {
        $url = self::$url.'/topapi/role/getrole?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 创建角色
     * @param array $arr['roleName'] //角色名称
     * @param array $arr['groupId'] //角色组id
     * @return mixed
     */
    public function add_role($arr = [])
    {
        $url = self::$url.'/role/add_role?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 更新角色
     * @param array $arr['roleName'] //角色名称
     * @param array $arr['roleId'] //角色id
     * @return mixed
     */
    public function update_role($arr = [])
    {
        $url = self::$url.'/role/update_role?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 更新角色
     * @param array $arr['role_id'] //角色id
     * @return mixed
     */
    public function deleterole($arr = [])
    {
        $url = self::$url.'/topapi/role/deleterole?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 创建角色组
     * @param array $arr['name'] //角色组名称
     * @return mixed
     */
    public function add_role_group($arr = [])
    {
        $url = self::$url.'/role/add_role_group?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 批量增加员工角色
     * @param array $arr['roleIds'] //角色id list，最大列表长度：20
     * @param array $arr['userIds'] //员工id list，最大列表长度：100
     * @return mixed
     */
    public function addrolesforemps($arr = [])
    {
        $url = self::$url.'/topapi/role/addrolesforemps?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 批量删除员工角色
     * @param array $arr['roleIds'] //角色标签id，最大列表长度：20
     * @param array $arr['userIds'] //用户userId，最大列表长度：100
     * @return mixed
     */
    public function removerolesforemps($arr = [])
    {
        $url = self::$url.'/topapi/role/removerolesforemps?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}