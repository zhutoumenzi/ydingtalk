<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 15:15
 * 签到类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Checkin extends Template
{
    /**
     * 获取部门用户签到记录
     * @param $department_id 部门id（1 表示根部门）
     * @param $start_time 开始时间。Unix时间戳，如：1520956800000
     * @param $end_time 结束时间。Unix时间戳，如：1520956800000。开始时间和结束时间的间隔不能大于45天
     * @param $offset 支持分页查询，与size 参数同时设置时才生效，此参数代表偏移量，从0、1、2...依次递增
     * @param $size 支持分页查询，与offset 参数同时设置时才生效，此参数代表分页大小，最大100
     * @param $order 排序asc 为正序desc 为倒序
     * @return mixed
     */
    public function record($department_id, $start_time, $end_time, $offset = 0, $size = 100, $order = 'asc')
    {
        $url = self::$url.'/checkin/record?access_token='.self::$token.'&department_id='.$department_id.'&start_time='.$start_time.'&end_time='.$end_time.'&offset='.$offset.'&size='.$size.'&order='.$order;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户签到记录
     * @param array $arr['userid_list'] //需要查询的用户列表，最大列表长度：10
     * @param array $arr['start_time'] //起始时间。Unix时间戳，如：1520956800000
     * @param array $arr['end_time'] //结束时间。Unix时间戳，如：1520956800000。如果是取1个人的数据，时间范围最大到10天，如果是取多个人的数据，时间范围最大1天。
     * @param array $arr['cursor'] //分页查询的游标，最开始可以传0，然后以1、2依次递增
     * @param array $arr['size'] //分页查询的每页大小，最大100
     * @return mixed
     */
    public function get($arr = [])
    {
        $url = self::$url.'/topapi/checkin/record/get?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}