<?php
defined('PAYNOWPATH') OR exit('No direct script access allowed');


// 微信支付相关配置
$config['wxpay'] = array(
	'APPID' => 'wx426b3015555a46be' ,
	'MCHID' => '1900009851' ,
	'KEY' => '8934e7d15453e97507ef794cf7b0519d' ,
	'APPSECRET' => '7813490da6f1265e4901ffb80afaa36f' ,
	'SSLCERT_PATH' => './paynow/sdk/wxpay/cert/apiclient_cert.pem' ,
	'SSLKEY_PATH' => './paynow/sdk/wxpay/cert/apiclient_key.pem' ,
	'CURL_PROXY_HOST' => "0.0.0.0" ,
	'CURL_PROXY_PORT' => "0" ,
	'REPORT_LEVENL' => '1',
	'NOTIFY_URL' => 'http://xxxx.com'
);




$config['alipay'] = array();
$config['jdpay'] = array();



$config['global'] = array(
	'callback_url' => 'http://xxxx.com' , 
	'notify_url' => 'http://xxxx.com'
);
