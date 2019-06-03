<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/3
 * Time: 22:31
 * 发送群消息类
 */

namespace xiaoyan\ydingtalk\operate;


use xiaoyan\ydingtalk\http\Ask;
use xiaoyan\ydingtalk\Template;

class Chat extends Template
{
    /**
     * 发送群消息
     * @param array $arr['chatid'] //群会话的id，可以在调用创建群会话接口的返回结果里面获取，也可以通过dd.chooseChat获取
     * @param array $arr['msg'] //消息内容，消息类型和样例可参考“消息类型与数据格式”文档
     * @return mixed
     */
    public function send($arr = [])
    {
        $url = self::$url.'/chat/send?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 查询群消息已读人员列表
     * @param $messageId 发送群消息接口返回的加密消息id
     * @param $cursor 分页查询的游标，第一次可以传0，后续传返回结果中的next_cursor的值。当返回结果中，没有next_cursor时，表示没有后续的数据了，可以结束调用
     * @param $size 分页查询的大小，最大可以传100
     * @return mixed
     */
    public function getReadList($messageId, $cursor, $size)
    {
        $url = self::$url.'/chat/getReadList?access_token='.self::$token.'&messageId='.$messageId.'&cursor='.$cursor.'&size='.$size;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 创建会话
     * @param array $arr['name'] //群名称，长度限制为1~20个字符
     * @param array $arr['owner'] //群主userId，员工唯一标识ID；必须为该会话useridlist的成员之一
     * @param array $arr['useridlist'] //群成员列表，每次最多支持40人，群人数上限为1000
     * @param array $arr['showHistoryType'] //新成员是否可查看聊天历史消息（新成员入群是否可查看最近100条聊天记录），0代表否，1代表是，不传默认为否
     * @param array $arr['searchable'] //群可搜索，0-默认，不可搜索，1-可搜索
     * @param array $arr['validationType'] //入群验证，0：不入群验证（默认） 1：入群验证
     * @param array $arr['mentionAllAuthority'] //@all 权限，0-默认，所有人，1-仅群主可@all
     * @param array $arr['chatBannedType'] //群禁言，0-默认，不禁言，1-全员禁言
     * @param array $arr['managementType'] //管理类型，0-默认，所有人可管理，1-仅群主可管理
     * @return mixed
     */
    public function create($arr = [])
    {
        $url = self::$url.'/chat/create?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    /**
     * 修改会话
     * @param array $arr['chatid'] //群会话的id
     * @param array $arr['name'] //群名称，长度限制为1~20个字符
     * @param array $arr['owner'] //群主userId，员工唯一标识ID；必须为该会话useridlist的成员之一
     * @param array $arr['add_useridlist'] //添加成员列表，每次最多支持40人，群人数上限为1000
     * @param array $arr['del_useridlist'] //删除成员列表，每次最多支持40人，群人数上限为1000
     * @param array $arr['icon'] //群头像mediaid
     * @param array $arr['chatBannedType'] //群禁言，0-默认，不禁言，1-全员禁言
     * @param array $arr['searchable'] //群可搜索，0-默认，不可搜索，1-可搜索
     * @param array $arr['validationType'] //入群验证，0：不入群验证（默认） 1：入群验证
     * @param array $arr['mentionAllAuthority'] //@all 权限，0-默认，所有人，1-仅群主可@all
     * @param array $arr['showHistoryType'] //新成员可查看聊天历史 0否 1是
     * @param array $arr['managementType'] //管理类型，0-默认，所有人可管理，1-仅群主可管理
     * @return mixed
     */
    public function update($arr = [])
    {
        $url = self::$url.'/chat/update?access_token='.self::$token;
        $data = Ask::http($url, 'POST', $arr, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }

    public function get($chatid)
    {
        $url = self::$url.'/chat/get?access_token='.self::$token.'&chatid='.$chatid;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        return $res;
    }
}