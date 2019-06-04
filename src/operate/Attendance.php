<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 14:00
 * 考勤类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Attendance extends Template
{
    /**
     * 企业考勤排班详情
     * @param array $arr['workDate'] //起始时间。时间的毫秒数
     * @param array $arr['offset'] //偏移位置，从0开始，后续传offset+size的值。当返回结果中的has_more为false时，表示没有多余的数据了。
     * @param array $arr['size'] //分页大小，最大200，默认值：200
     * @return mixed
     */
    public function listschedule($arr = [])
    {
        $url = self::$url.'/topapi/attendance/listschedule?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 企业考勤组详情
     * @param array $arr['offset'] //偏移位置，从0开始，后续传offset+size的值。当返回结果中的has_more为false时，表示没有多余的数据了。
     * @param array $arr['size'] //分页大小，最大200，默认值：200
     * @return mixed
     */
    public function getsimplegroups($arr = [])
    {
        $url = self::$url.'/topapi/attendance/getsimplegroups?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取打卡详情
     * @param array $arr['userIds'] //企业内的员工id列表，最多不能超过50个
     * @param array $arr['checkDateFrom'] //查询考勤打卡记录的起始工作日。格式为“yyyy-MM-dd hh:mm:ss”。
     * @param array $arr['checkDateTo'] //查询考勤打卡记录的结束工作日。格式为“yyyy-MM-dd hh:mm:ss”。注意，起始与结束工作日最多相隔7天
     * @param array $arr['isI18n'] //取值为true和false，表示是否为海外企业使用，默认为false。其中，true：海外平台使用，false：国内平台使用
     * @return mixed
     */
    public function listRecord($arr = [])
    {
        $url = self::$url.'/attendance/listRecord?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取打卡结果
     * @param array $arr['workDateFrom'] //查询考勤打卡记录的起始工作日。格式为“yyyy-MM-dd HH:mm:ss”，HH:mm:ss可以使用00:00:00，具体查询的时候不会起作用，最后将返回此日期从0点到24点的结果
     * @param array $arr['workDateTo'] //查询考勤打卡记录的结束工作日。格式为“yyyy-MM-dd HH:mm:ss”，HH:mm:ss可以使用00:00:00，具体查询的时候不会起作用，最后将返回此日期从0点到24点的结果。注意，起始与结束工作日最多相隔7天
     * @param array $arr['userIdList'] //员工在企业内的UserID列表，企业用来唯一标识用户的字段。最多不能超过50个
     * @param array $arr['offset'] //表示获取考勤数据的起始点，第一次传0，如果还有多余数据，下次获取传的offset值为之前的offset+limit，0、1、2...依次递增
     * @param array $arr['limit'] //表示获取考勤数据的条数，最大不能超过50条
     * @param array $arr['isI18n'] //取值为true和false，表示是否为海外企业使用，默认为false。其中，true：海外平台使用，false：国内平台使用
     * @return mixed
     */
    public function lists($arr = [])
    {
        $url = self::$url.'/attendance/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取请假时长
     * @param array $arr['userid'] //企业内的员工id列表，最多不能超过50个
     * @param array $arr['from_date'] //查询考勤打卡记录的起始工作日。格式为“yyyy-MM-dd hh:mm:ss”。
     * @param array $arr['to_date'] //查询考勤打卡记录的结束工作日。格式为“yyyy-MM-dd hh:mm:ss”。注意，起始与结束工作日最多相隔7天
     * @return mixed
     */
    public function getleaveapproveduration($arr = [])
    {
        $url = self::$url.'/topapi/attendance/getleaveapproveduration?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询请假状态
     * @param array $arr['userid_list'] //待查询用户id列表，支持最多100个用户的批量查询
     * @param array $arr['start_time'] //开始时间 ，UNIX时间戳，支持最多180天的查询
     * @param array $arr['end_time'] //结束时间 ，UNIX时间戳，支持最多180天的查询时间
     * @param array $arr['offset'] //分页偏移，非负整数
     * @param array $arr['size'] //分页大小，正整数，最大20
     * @return mixed
     */
    public function getleavestatus($arr = [])
    {
        $url = self::$url.'/topapi/attendance/getleavestatus?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户考勤组
     * @param array $arr['userid'] //员工在企业内的UserID，企业用来唯一标识用户的字段
     * @return mixed
     */
    public function getusergroup($arr = [])
    {
        $url = self::$url.'/topapi/attendance/getusergroup?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}