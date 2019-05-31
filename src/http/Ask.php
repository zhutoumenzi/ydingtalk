<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/31
 * Time: 22:41
 * 处理网络请求 get/post
 */

namespace xiaoyan\ydingtalk\http;


use xiaoyan\ydingtalk\Nail;

class Ask
{

    /**
     * curl操作函数
     * @param  string $url        请求地址
     * @param  string $method     提交方式
     * @param  array  $postFields 提交内容
     * @param  array  $header     请求头
     * @return mixed              返回数据
     */
    public static function http($url, $method = 'GET', $postFields = null, $headers = null)
    {
        $method = strtoupper($method);
        if (!in_array($method, ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS'])) {
            return false;
        }
        $opts = [
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_URL            => $url,
            CURLOPT_FAILONERROR    => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CONNECTTIMEOUT => 30,
        ];
        if ($method == 'POST' && !is_null($postFields)) {
            $opts[CURLOPT_POSTFIELDS] = $postFields;
        }
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            $opts[CURLOPT_SSL_VERIFYPEER] = false;
            $opts[CURLOPT_SSL_VERIFYHOST] = false;
        }
        if (!empty($headers) && is_array($headers)) {
            $httpHeaders = [];
            foreach ($headers as $key => $value) {
                array_push($httpHeaders, $key . ':' . $value);
            }
            $opts[CURLOPT_HTTPHEADER] = $httpHeaders;
        }
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data = curl_exec($ch);
        $err  = curl_errno($ch);
        curl_close($ch);
        if ($err > 0) {
            Nail::error(curl_error($ch));
            return false;
        } else {
            return $data;
        }
    }

}