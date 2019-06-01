<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 22:55
 * 外部联系人管理类
 */

namespace xiaoyan\ydingtalk\operate;


class Extcontact extends Template
{
    /**
     * 获取外部联系人标签列表
     * @param array $arr['size'] //分页大小，最大100
     * @param array $arr['offset'] //偏移位置
     * @return mixed
     */
    public function listlabelgroups($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/listlabelgroups?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取外部联系人列表
     * @param array $arr['size'] //分页大小，最大100
     * @param array $arr['offset'] //偏移位置
     * @return mixed
     */
    public function lists($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/list?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取企业外部联系人详情
     * @param array $arr['user_id'] //用户id
     * @return mixed
     */
    public function get($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/get?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 添加外部联系人
     * @param array $arr['contact'] //外部联系人信息
     * @param array $arr['contact']['title'] //职位
     * @param array $arr['contact']['label_ids'] //标签列表
     * @param array $arr['contact']['share_dept_ids'] //共享给的部门ID
     * @param array $arr['contact']['address'] //地址
     * @param array $arr['contact']['remark'] //备注
     * @param array $arr['contact']['follower_user_id'] //负责人userId
     * @param array $arr['contact']['name'] //名称
     * @param array $arr['contact']['state_code'] //手机号国家码
     * @param array $arr['contact']['company_name'] //企业名
     * @param array $arr['contact']['share_user_ids'] //共享给的员工userId列表
     * @param array $arr['contact']['mobile'] //手机号
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 更新外部联系人
     * @param array $arr['contact'] //外部联系人信息
     * @param array $arr['contact']['user_id'] //该外部联系人的userId
     * @param array $arr['contact']['title'] //职位
     * @param array $arr['contact']['label_ids'] //标签列表
     * @param array $arr['contact']['share_dept_ids'] //共享给的部门ID
     * @param array $arr['contact']['address'] //地址
     * @param array $arr['contact']['remark'] //备注
     * @param array $arr['contact']['follower_user_id'] //负责人userId
     * @param array $arr['contact']['name'] //名称
     * @param array $arr['contact']['company_name'] //企业名
     * @param array $arr['contact']['share_user_ids'] //共享给的员工userId列表
     * @return mixed
     */
    public function update($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/update?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 删除外部联系人
     * @param array $arr['user_id'] //用户id
     * @return mixed
     */
    public function delete($arr = [])
    {
        $url = self::$url.'/topapi/extcontact/delete?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}