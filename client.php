<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/31
 * Time: 22:25
 */
// 全局自动加载
require __DIR__ . '/vendor/autoload.php';
// 调用类方法，打印返回值字符串的长度
use xiaoyan\ydingtalk\Nail;
$a = Nail::Register();
$a->test();