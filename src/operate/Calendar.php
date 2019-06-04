<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 14:40
 * DING日程类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Calendar extends Template
{
    /**
     * 创建日程
     * @param array $arr['create_vo'] //创建日程实体
     * @param array $arr['create_vo']['summary'] //日程主题
     * @param array $arr['create_vo']['reminder'] //事项开始前提醒
     * @param array $arr['create_vo']['reminder']['minutes'] //距开始时多久进行提醒(单位:分钟)
     * @param array $arr['create_vo']['reminder']['remind_type'] //提醒类型:app-应用内
     * @param array $arr['create_vo']['location'] //地点
     * @param array $arr['create_vo']['receiver_userids'] //接收者userid
     * @param array $arr['create_vo']['end_time'] //结束时间
     * @param array $arr['create_vo']['end_time']['unix_timestamp'] //结束的unix时间戳(单位:毫秒)
     * @param array $arr['create_vo']['end_time']['timezone'] //时区
     * @param array $arr['create_vo']['calendar_type'] //日程类型:notification-提醒
     * @param array $arr['create_vo']['start_time'] //开始时间
     * @param array $arr['create_vo']['start_time']['unix_timestamp'] //开始的unix时间戳(单位:毫秒)
     * @param array $arr['create_vo']['start_time']['timezone'] //时区
     * @param array $arr['create_vo']['source'] //显示日程来源
     * @param array $arr['create_vo']['source']['title'] //日程来源
     * @param array $arr['create_vo']['source']['url'] //点击日程跳转目标地址
     * @param array $arr['create_vo']['description'] //备注
     * @param array $arr['create_vo']['creator_userid'] //创建者userid
     * @param array $arr['create_vo']['uuid'] //请求的唯一标识, 保证请求唯一性
     * @param array $arr['create_vo']['biz_id'] //业务方自己的主键
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/topapi/calendar/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}