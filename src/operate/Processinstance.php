<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/4
 * Time: 10:11
 * 审批类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Processinstance extends Template
{
    /**
     * 发起审批实例
     * @param array $arr['agent_id'] //企业应用标识(ISV调用必须设置)
     * @param array $arr['process_code'] //审批流的唯一码，process_code就在审批流编辑的页面URL中
     * @param array $arr['originator_user_id'] //审批实例发起人的userid
     * @param array $arr['dept_id'] //发起人所在的部门，如果发起人属于根部门，传-1
     * @param array $arr['approvers'] //审批人userid列表，最大列表长度：20。多个审批人用逗号分隔，按传入的顺序依次审批
     * @param array $arr['approvers_v2'] //审批人列表，支持会签/或签，优先级高于approvers变量
     * @param array $arr['approvers_v2']['user_ids'] //审批人userid列表，会签/或签列表长度必须大于1，非会签/或签列表长度只能为1
     * @param array $arr['approvers_v2']['task_action_type'] //审批类型，会签：AND；或签：OR；单人：NONE
     * @param array $arr['cc_list'] //抄送人userid列表，最大列表长度：20。多个抄送人用逗号分隔
     * @param array $arr['cc_position'] //抄送时间，分为（START, FINISH, START_FINISH）
     * @param array $arr['form_component_values'] //审批流表单参数，最大列表长度：20。
     * @param array $arr['form_component_values']['name'] //表单每一栏的名称
     * @param array $arr['form_component_values']['value'] //表单每一栏的值
     * @param array $arr['form_component_values']['ext_value'] //扩展值
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/topapi/processinstance/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 批量获取审批实例id
     * @param array $arr['process_code'] //流程模板唯一标识，可在OA管理后台编辑审批表单部分查询
     * @param array $arr['start_time'] //开始时间。Unix时间戳
     * @param array $arr['end_time'] //结束时间，默认取当前时间。Unix时间戳
     * @param array $arr['size'] //分页参数，每页大小，最多传10，默认值：10
     * @param array $arr['cursor'] //分页查询的游标，最开始传0，后续传返回参数中的next_cursor值，默认值：0
     * @param array $arr['userid_list'] //发起人用户id列表，用逗号分隔，最大列表长度：10
     * @return mixed
     */
    public function listids($arr = [])
    {
        $url = self::$url.'/topapi/processinstance/listids?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取审批实例详情
     * @param array $arr['process_instance_id'] //审批实例id
     * @return mixed
     */
    public function get($arr = [])
    {
        $url = self::$url.'/topapi/processinstance/get?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户待审批数量
     * @param array $arr['userid'] //用户id
     * @return mixed
     */
    public function gettodonum($arr = [])
    {
        $url = self::$url.'/topapi/process/gettodonum?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取用户可见的审批模板
     * @param array $arr['userid'] //用户id
     * @param array $arr['offset'] //分页游标，从0开始。根据返回结果里的next_cursor是否为空来判断是否还有下一页，且再次调用时offset设置成next_cursor的值
     * @param array $arr['size'] //分页大小，最大可设置成100
     * @return mixed
     */
    public function listbyuserid($arr = [])
    {
        $url = self::$url.'/topapi/process/listbyuserid?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}