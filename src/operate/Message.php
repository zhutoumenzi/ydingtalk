<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/2
 * Time: 20:25
 * 发送工作通知消息类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Message extends Template
{
    /**
     * 发送工作通知消息
     * @param array $arr['agent_id'] //应用agentId
     * @param array $arr['userid_list'] //接收者的用户userid列表，最大列表长度：100
     * @param array $arr['dept_id_list'] //接收者的部门id列表，最大列表长度：20,  接收者是部门id下(包括子部门下)的所有用户
     * @param array $arr['to_all_user'] //是否发送给企业全部用户
     * @param array $arr['msg'] //消息内容，消息类型和样例参考“消息类型与数据格式”。最长不超过2048个字节
     * @return mixed
     */
    public function asyncsend_v2($arr = [])
    {
        $url = self::$url.'/topapi/message/corpconversation/asyncsend_v2?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询工作通知消息的发送进度
     * @param array $arr['agent_id'] //发送消息时使用的微应用的id
     * @param array $arr['task_id'] //发送消息时钉钉返回的任务id
     * @return mixed
     */
    public function getsendprogress($arr = [])
    {
        $url = self::$url.'/topapi/message/corpconversation/getsendprogress?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询工作通知消息的发送结果
     * @param array $arr['agent_id'] //微应用的agentid
     * @param array $arr['task_id'] //异步任务的id
     * @return mixed
     */
    public function getsendresult($arr = [])
    {
        $url = self::$url.'/topapi/message/corpconversation/getsendresult?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}