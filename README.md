### 支付代码
wxpay_qrcode  微信扫码支付


### 创建微信扫码支付demo

```php
	require_once 'paynow.class.php';
	$paynow = new paynow('wxpay');

	$reslut = $paynow->create_order(array(
		'order_no' => '20170303948263' ,
		'description' => '购买测试服务' , 
		'money' => 0.01 , 
		'payType' => 'wxpay_qrcode',
		'attach' => '附加信息'
	));

	if($reslut['state'] == false) exit($reslut['message']);


	echo '<img src="http://pan.baidu.com/share/qrcode?w=345&h=348&url=' . $reslut['params']['code_url'] . '" alt="">';
```