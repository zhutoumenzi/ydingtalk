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
use xiaoyan\ydingtalk\Template;

class User extends Template
{
    /**
     * 获取用户详情
     * @param $userid
     * @return mixed
     */
    public function get($userid)
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
    public function getDeptMember($deptId)
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
    public function simplelist($arr = [])
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
    public function listbypage($arr = [])
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
    public function get_admin()
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
    public function get_admin_scope()
    {
        $url = self::$url.'/topapi/user/get_admin_scope?access_token='.self::$token;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 根据unionid获取userid
     * @param $unionid
     * @return mixed
     */
    public function getUseridByUnionid($unionid)
    {
        $url = self::$url.'/user/getUseridByUnionid?access_token='.self::$token.'&unionid='.$unionid;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 创建用户
     * @param array $arr['userid'] //员工在当前企业内的唯一标识，也称staffId
     * @param array $arr['name'] //成员名称。长度为1~64个字符
     * @param array $arr['orderInDepts'] //在对应的部门中的排序,Map结构的json字符串, key是部门的Id, value是人员在这个部门的排序值
     * @param array $arr['department'] //数组类型，数组里面值为整型，成员所属部门id列表
     * @param array $arr['position'] //职位信息。长度为0~64个字符
     * @param array $arr['mobile'] //手机号码，企业内必须唯一，不可重复。如果是国际号码，请使用+xx-xxxxxx的格式
     * @param array $arr['tel'] //分机号，长度为0~50个字符，企业内必须唯一，不可重复
     * @param array $arr['workPlace'] //办公地点，长度为0~50个字符
     * @param array $arr['remark'] //备注，长度为0~1000个字符
     * @param array $arr['email'] //邮箱。长度为0~64个字符。企业内必须唯一，不可重复
     * @param array $arr['orgEmail'] //员工的企业邮箱，员工的企业邮箱已开通，才能增加此字段， 否则会报错
     * @param array $arr['jobnumber'] //员工工号。对应显示到OA后台和客户端个人资料的工号栏目。长度为0~64个字符
     * @param array $arr['isHide'] //是否号码隐藏,true表示隐藏,false表示不隐藏
     * @param array $arr['isSenior'] //是否高管模式，true表示是，false表示不是。
     * @param array $arr['extattr'] //扩展属性，可以设置多种属性
     * @param array $arr['hiredDate'] //入职时间，Unix时间戳
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/user/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 更新用户
     * @param array $arr['lang'] //通讯录语言(默认zh_CN另外支持en_US)
     * @param array $arr['userid'] //员工在当前企业内的唯一标识，也称staffId
     * @param array $arr['name'] //成员名称。长度为1~64个字符
     * @param array $arr['department'] //数组类型，数组里面值为整型，成员所属部门id列表
     * @param array $arr['orderInDepts'] //实际是Map的序列化字符串，Map的Key是deptId，表示部门id，Map的Value是order，表示排序的值，列表是按order的倒序排列输出的，即从大到小排列输出的
     * @param array $arr['position'] //职位信息。长度为0~64个字符
     * @param array $arr['mobile'] //手机号码，企业内必须唯一，不可重复。如果是国际号码，请使用+xx-xxxxxx的格式
     * @param array $arr['tel'] //分机号，长度为0~50个字符，企业内必须唯一，不可重复
     * @param array $arr['workPlace'] //办公地点，长度为0~50个字符
     * @param array $arr['remark'] //备注，长度为0~1000个字符
     * @param array $arr['email'] //邮箱。长度为0~64个字符。企业内必须唯一，不可重复
     * @param array $arr['orgEmail'] //员工的企业邮箱，员工的企业邮箱已开通，才能增加此字段， 否则会报错
     * @param array $arr['jobnumber'] //员工工号。对应显示到OA后台和客户端个人资料的工号栏目。长度为0~64个字符
     * @param array $arr['isHide'] //是否号码隐藏,true表示隐藏,false表示不隐藏
     * @param array $arr['isSenior'] //是否高管模式，true表示是，false表示不是。
     * @param array $arr['extattr'] //扩展属性，可以设置多种属性
     * @param array $arr['hiredDate'] //入职时间，Unix时间戳
     * @return mixed
     */
    public function update($arr = [])
    {
        $url = self::$url.'/user/update?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 删除用户
     * @param $userid
     * @return mixed
     */
    public function delete($userid)
    {
        $url = self::$url.'/user/delete?access_token='.self::$token.'&userid='.$userid;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}