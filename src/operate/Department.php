<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/1
 * Time: 21:00
 * 部门管理类
 */

namespace xiaoyan\ydingtalk\operate;


class Department extends Template
{
    /**
     * 获取子部门ID列表
     * @param $id
     * @return mixed
     */
    public function list_ids($id)
    {
        $url = self::$url.'/department/list_ids?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门列表
     * @return mixed
     */
    public function lists()
    {
        $url = self::$url.'/department/list?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取部门详情
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $url = self::$url.'/department/get?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询部门的所有上级父部门路径
     * @param $id
     * @return mixed
     */
    public function list_parent_depts_by_dept($id)
    {
        $url = self::$url.'/department/list_parent_depts_by_dept?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询指定用户的所有上级父部门路径
     * @param $userId
     * @return mixed
     */
    public function list_parent_depts($userId)
    {
        $url = self::$url.'/department/list_parent_depts?access_token='.self::$token.'&userId='.$userId;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 获取企业员工人数
     * @param $onlyActive
     * @return mixed
     */
    public function get_org_user_count($onlyActive)
    {
        $url = self::$url.'/user/get_org_user_count?access_token='.self::$token.'&onlyActive='.$onlyActive;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 创建部门
     * @param array $arr['name'] //部门名称，长度限制为1~64个字符，不允许包含字符‘-’‘，’以及‘,’
     * @param array $arr['parentid'] //父部门id，根部门id为1
     * @param array $arr['order'] //在父部门中的排序值，order值小的排序靠前
     * @param array $arr['createDeptGroup'] //是否创建一个关联此部门的企业群，默认为false
     * @param array $arr['deptHiding'] //是否隐藏部门,true表示隐藏false表示显示
     * @param array $arr['deptPermits'] //可以查看指定隐藏部门的其他部门列表，如果部门隐藏，则此值生效，取值为其他的部门id组成的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['userPermits'] //可以查看指定隐藏部门的其他人员列表，如果部门隐藏，则此值生效，取值为其他的人员userid组成的的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['outerDept'] //限制本部门成员查看通讯录，限制开启后，本部门成员只能看到限定范围内的通讯录。true表示限制开启
     * @param array $arr['outerPermitDepts'] //outerDept为true时，可以配置额外可见部门，值为部门id组成的的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['outerPermitUsers'] //outerDept为true时，可以配置额外可见人员，值为userid组成的的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['outerDeptOnlySelf'] //outerDept为true时，可以配置该字段，为true时，表示只能看到所在部门及下级部门通讯录
     * @param array $arr['sourceIdentifier'] //部门标识字段，开发者可用该字段来唯一标识一个部门，并与钉钉外部通讯录里的部门做映射
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/department/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 更新部门
     * @param array $arr['lang'] //通讯录语言(默认zh_CN另外支持en_US)
     * @param array $arr['name'] //部门名称，长度限制为1~64个字符，不允许包含字符‘-’‘，’以及‘,’
     * @param array $arr['parentid'] //父部门id，根部门id为1
     * @param array $arr['order'] //在父部门中的排序值，order值小的排序靠前
     * @param array $arr['id'] //部门id
     * @param array $arr['createDeptGroup'] //是否创建一个关联此部门的企业群，默认为false
     * @param array $arr['groupContainSubDept'] //部门群是否包含子部门
     * @param array $arr['groupContainOuterDept'] //部门群是否包含外包部门
     * @param array $arr['groupContainHiddenDept'] //部门群是否包含隐藏部门
     * @param array $arr['autoAddUser'] //如果有新人加入部门是否会自动加入部门群
     * @param array $arr['deptManagerUseridList'] //部门的主管列表,取值为由主管的userid组成的字符串，不同的userid使用“|”符号进行分割
     * @param array $arr['deptHiding'] //是否隐藏部门,true表示隐藏false表示显示
     * @param array $arr['deptPermits'] //可以查看指定隐藏部门的其他部门列表，如果部门隐藏，则此值生效，取值为其他的部门id组成的的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['userPermits'] //可以查看指定隐藏部门的其他人员列表，如果部门隐藏，则此值生效，取值为其他的人员userid组成的字符串，使用“|”符号进行分割。总数不能超过200
     * @param array $arr['outerDept'] //是否本部门的员工仅可见员工自己, 为true时，本部门员工默认只能看到员工自己
     * @param array $arr['outerPermitDepts'] //本部门的员工仅可见员工自己为true时，可以配置额外可见部门，值为部门id组成的的字符串，使用|符号进行分割。总数不能超过200
     * @param array $arr['outerPermitUsers'] //本部门的员工仅可见员工自己为true时，可以配置额外可见人员，值为userid组成的的字符串，使用|符号进行分割。总数不能超过200
     * @param array $arr['outerDeptOnlySelf'] //outerDept为true时，可以配置该字段，为true时，表示只能看到所在部门及下级部门通讯录
     * @param array $arr['orgDeptOwner'] //企业群群主
     * @param array $arr['sourceIdentifier'] //部门标识字段，开发者可用该字段来唯一标识一个部门，并与钉钉外部通讯录里的部门做映射
     * @return mixed
     */
    public function update($arr = [])
    {
        $url = self::$url.'/department/update?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 删除部门
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $url = self::$url.'/department/delete?access_token='.self::$token.'&id='.$id;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}