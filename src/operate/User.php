<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 16:21
 * 用户管理类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;

class User extends Template
{
    /**
     * 获取用户详情
     * @param $userid
     * @return mixed
     */
    public function getUserView($userid)
    {
        $url = self::$url.'/user/get?access_token='.self::$token.'&userid='.$userid;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门用户userid列表
     * @param $deptId 部门id
     * @return mixed
     */
    public function getDeptUserId($deptId)
    {
        $url = self::$url.'/user/getDeptMember?access_token='.self::$token.'&deptId='.$deptId;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门用户
     * @param array $arr['lang'] //通讯录语言(默认zh_CN另外支持en_US)
     * @param array $arr['department_id'] //获取的部门id
     * @param array $arr['offset'] //支持分页查询，与size参数同时设置时才生效，此参数代表偏移量
     * @param array $arr['size'] //支持分页查询，与offset参数同时设置时才生效，此参数代表分页大小，最大100
     * @param array $arr['order'] //支持分页查询，部门成员的排序规则，默认不传是按自定义排序；
     * entry_asc：代表按照进入部门的时间升序
     * entry_desc：代表按照进入部门的时间降序
     * modify_asc：代表按照部门信息修改时间升序
     * modify_desc：代表按照部门信息修改时间降序
     * custom：代表用户定义(未定义时按照拼音)排序
     * @return mixed
     */
    public function getDeptUser($arr = [])
    {
        $url = self::$url.'/user/simplelist?access_token='.self::$token;
        foreach ($arr as $key => $vo)
        {
            $url = $url.'&'.$key.'='.$vo;
        }
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门用户详情
     * @param array $arr['lang'] //通讯录语言(默认zh_CN另外支持en_US)
     * @param array $arr['department_id'] //获取的部门id
     * @param array $arr['offset'] //支持分页查询，与size参数同时设置时才生效，此参数代表偏移量
     * @param array $arr['size'] //支持分页查询，与offset参数同时设置时才生效，此参数代表分页大小，最大100
     * @param array $arr['order'] //支持分页查询，部门成员的排序规则，默认不传是按自定义排序；
     * entry_asc：代表按照进入部门的时间升序
     * entry_desc：代表按照进入部门的时间降序
     * modify_asc：代表按照部门信息修改时间升序
     * modify_desc：代表按照部门信息修改时间降序
     * custom：代表用户定义(未定义时按照拼音)排序
     * @return mixed
     */
    public function getDeptUserView($arr = [])
    {
        $url = self::$url.'/user/listbypage?access_token='.self::$token;
        foreach ($arr as $key => $vo)
        {
            $url = $url.'&'.$key.'='.$vo;
        }
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取管理员列表
     * @return mixed
     */
    public function getUserAdmin()
    {
        $url = self::$url.'/user/get_admin?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取管理员通讯录权限范围
     * @return mixed
     */
    public function getUserAdminScope()
    {
        $url = self::$url.'/topapi/user/get_admin_scope?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}