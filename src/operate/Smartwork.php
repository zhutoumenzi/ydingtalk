<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 10:30
 * 智能人事类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Smartwork extends Template
{
    /**
     * 获取员工花名册字段信息
     * @param array $arr['userid_list'] //员工userid列表，最大列表长度：20
     * @param array $arr['field_filter_list'] //需要获取的花名册字段列表，最大列表长度：20。具体业务字段的code参见附录（大小写敏感）。不传入该参数时，企业可获取所有字段信息。
     * @return mixed
     */
    public function lists($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询企业待入职员工列表
     * @param array $arr['offset'] //分页游标，从0开始
     * @param array $arr['size'] //分页大小，最大50
     * @return mixed
     */
    public function querypreentry($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/querypreentry?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询企业在职员工列表
     * @param array $arr['status_list'] //在职员工子状态筛选，其他状态无效。2，试用期；3，正式；5，待离职；-1，无状态
     * @param array $arr['offset'] //分页游标，从0开始
     * @param array $arr['size'] //分页大小，最大20
     * @return mixed
     */
    public function queryonjob($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/queryonjob?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询企业离职员工列表
     * @param array $arr['offset'] //分页游标，从0开始
     * @param array $arr['size'] //分页大小，最大20
     * @return mixed
     */
    public function querydimission($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/querydimission?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取离职员工离职信息
     * @param array $arr['userid_list'] //员工userid列表，最大长度50
     * @return mixed
     */
    public function listdimission($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/listdimission?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 添加企业待入职员工
     * @param array $arr['param'] //添加待入职入参
     * @param array $arr['param']['name'] //员工姓名
     * @param array $arr['param']['mobile'] //手机号
     * @param array $arr['param']['pre_entry_time'] //预期入职时间
     * @param array $arr['param']['op_userid'] //操作人userid
     * @param array $arr['param']['extend_info'] //345
     * @return mixed
     */
    public function addpreentry($arr = [])
    {
        $url = self::$url.'/topapi/smartwork/hrm/employee/addpreentry?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}