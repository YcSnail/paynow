<?php
/**
 * 微信支付SDK
 */
defined('PAYNOWPATH') OR exit('No direct script access allowed');
require_once 'lib/WxPay.Api.php';
class wxpay extends WxPayApi{

	public function wxpay_qrcode($parmas = array()){
		global $config;

		// $input->SetGoods_tag("test");
		
		$input = new WxPayUnifiedOrder();
		$input->SetProduct_id($parmas['order_no']);
		$input->SetBody($parmas['description']);
		$input->SetAttach(@$parmas['attach']);
		$input->SetOut_trade_no($config['wxpay']['MCHID'] . date("YmdHis"));
		$input->SetTotal_fee($parmas['money'] * 100);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 60 * 30));
		$input->SetNotify_url($config['wxpay']['NOTIFY_URL']);
		$input->SetTrade_type("NATIVE");
		$reslut = WxPayApi::unifiedOrder($input);
		if(isset($reslut['return_code']) && $reslut['return_code'] == 'FALL'){
			return array(
				'state' => false , 
				'message' => $reslut['return_msg']
			);
		}else{
			return array(
				'state' => true , 
				'params' => $reslut
			);
		}

		return $reslut;
	}
	
}