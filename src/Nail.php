<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/31
 * Time: 22:16
 * 入口控制
 */

namespace xiaoyan\ydingtalk;


use xiaoyan\ydingtalk\http\Ask;

/**
 * Class Nail
 * @package xiaoyan
 * @method \xiaoyan\ydingtalk\operate\Register test() static 从主服务器读取数据
 */

class Nail
{
    /**
     * 接口地址
     * @var string
     */
    protected static $url = 'https://oapi.dingtalk.com';

    /**
     * 钉钉appKey
     * @var string
     */
    protected static $appKey = '';

    /**
     * 钉钉秘钥
     * @var string
     */
    protected static $appSecret = '';

    /**
     * 协议头
     * @var array
     */
    protected static $headers = [
        'Content-Type' => 'application/json',
    ];

    /**
     * ACCESS_TOKEN
     * @var string
     */
    protected static $token;

    /**
     * 错误信息
     * @var null
     */
    protected static $error = null;

    /**
     * 返回ACCESS_TOKEN
     * @return string
     */
    public static function getToken()
    {
        if(self::$token){
            return self::$token;
        }
        $url = self::$url.'/gettoken?appkey='.self::$appKey.'&appsecret='.self::$appSecret;
        $data = Ask::http($url, 'GET', null, self::$headers);
        $res = json_decode($data, true);
        if($res['errmsg'] == 'ok'){
            self::$token = $res['access_token'];
            return self::$token;
        }else{
            return self::error($data);
        }
    }

    /**
     * 设置ACCESS_TOKEN
     * @param $token
     */
    public static function setToken($token)
    {
        self::$token = $token;
    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        return call_user_func_array([__NAMESPACE__.'\operate\\'.$name, 'getInstance'], [self::$token, self::$url, self::$headers]);
    }

    /**
     * 设置/获取 错位信息
     * @param null $msg
     * @return string
     */
    public static function error($msg = null)
    {
        if(!is_null($msg)){
            self::$error = $msg;
        }else{
            return self::$error;
        }
    }
}