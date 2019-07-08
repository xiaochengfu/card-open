<?php
include_once(__DIR__.'/libs/HttpRequest.php');

$appKey = '';      //这里换成您的 appKey
$appSecret = '';   //这里换成您的 appSecret

$params = [
    'page' => 1,
    'limit' => 10,
    'nonceStr' => md5(uniqid(microtime(true),true)),
];
ksort($params);
$params = http_build_query($params)."&appSecret={$appSecret}";
$params .= "&appKey={$appKey}&signature=".md5($params);
$result = HttpRequest::get('https://open.xiaochengfu.cn/api/card/poster?'.$params);
var_dump(json_decode($result, true));exit;
