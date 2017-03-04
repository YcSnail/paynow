<?php
	require_once 'paynow.class.php';
	$paynow = new paynow('wxpay');

	$reslut = $paynow->create_order(array(
		'order_no' => '20170303948263' ,
		'description' => '购买测试服务' , 
		'money' => 3 , 
		'payType' => 'wxpay_qrcode'
	));

	if($reslut['state'] == false) exit($reslut['message']);


	echo '<img src="http://pan.baidu.com/share/qrcode?w=345&h=348&url=' . $reslut['params']['code_url'] . '" alt="">';
