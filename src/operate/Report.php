<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 11:00
 * 日志类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Report extends Template
{
    /**
     * 获取用户日志数据
     * @param array $arr['start_time'] //起始时间。时间的毫秒数
     * @param array $arr['end_time'] //截止时间。时间的毫秒数，如：1520956800000
     * @param array $arr['template_name'] //要查询的模板名称
     * @param array $arr['userid'] //员工的userid
     * @param array $arr['cursor'] //查询游标，初始传入0，后续从上一次的返回值中获取
     * @param array $arr['size'] //每页数据量, 最大值是20
     * @return mixed
     */
    public function lists($arr = [])
    {
        $url = self::$url.'/topapi/report/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取日志统计数据
     * @param array $arr['report_id'] //日志id
     * @return mixed
     */
    public function statistics($arr = [])
    {
        $url = self::$url.'/topapi/report/statistics?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取日志相关人员列表
     * @param array $arr['report_id'] //日志id
     * @param array $arr['type'] //查询类型 0:已读人员列表 1:评论人员列表 2:点赞人员列表
     * @param array $arr['offset'] //分页查询的游标，最开始传0，后续传返回参数中的next_cursor值，默认值为0
     * @param array $arr['size'] //分页参数，每页大小，最多传100，默认值为100
     * @return mixed
     */
    public function listbytype($arr = [])
    {
        $url = self::$url.'/topapi/report/statistics/listbytype?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取日志接收人员列表
     * @param array $arr['report_id'] //日志id
     * @param array $arr['offset'] //分页查询的游标，最开始传0，后续传返回参数中的next_cursor值，默认值为0
     * @param array $arr['size'] //分页参数，每页大小，最多传100，默认值为100
     * @return mixed
     */
    public function receiver_list($arr = [])
    {
        $url = self::$url.'/topapi/report/receiver/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取日志评论详情
     * @param array $arr['report_id'] //日志id
     * @param array $arr['offset'] //分页查询的游标，最开始传0，后续传返回参数中的next_cursor值，默认值为0
     * @param array $arr['size'] //分页参数，每页大小，最多传100，默认值为100
     * @return mixed
     */
    public function comment_list($arr = [])
    {
        $url = self::$url.'/topapi/report/comment/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户日志未读数
     * @param array $arr['userid'] //用户id
     * @return mixed
     */
    public function getunreadcount($arr = [])
    {
        $url = self::$url.'/topapi/report/getunreadcount?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户可见的日志模板
     * @param array $arr['userid'] //用户id
     * @param array $arr['offset'] //分页游标，从0开始。根据返回结果里的next_cursor是否为空来判断是否还有下一页，且再次调用时offset设置成next_cursor的值
     * @param array $arr['size'] //分页大小，最大可设置成100
     * @return mixed
     */
    public function listbyuserid($arr = [])
    {
        $url = self::$url.'/topapi/report/template/listbyuserid?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}