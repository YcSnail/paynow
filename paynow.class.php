<?php
define('PAYNOWPATH', __DIR__ . '\paynow');
date_default_timezone_set('PRC');


include PAYNOWPATH . '/paynow.config.php';
require_once PAYNOWPATH . '/paynow.system.php';

class paynow extends paynowSystem{
    public function __construct($payType){
        $this->load($payType);
        $this->paynow = new $payType;


        // 允许的支付方式
    	$this->allow_paytype = array(
    		'wxpay' => array(
    			'wxpay_qrcode' , 
    		)
    	);
        $this->allow_paytype = $this->allow_paytype[$payTypw];
    }



    /**
     * 创建支付订单
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function create_order($params = array()){
    	if( ! in_array($params['payType'], $this->allow_paytype)){
    		$this->reslut(false , '不存在的支付方式');	
    	}
    	return $this->paynow->$params['payType']($params);
    }




    /**
     * 加载相关文件
     * @param  [type] $file [description]
     * @return [type]       [description]
     */
	private function load($file){
		$fileName = __DIR__ . "/paynow/sdk/{$file}/{$file}.sdk.php";
		if( ! file_exists($fileName) ){
			return $this->reslut(false , "初始化的支付SDK不存在");
		}
		require_once $fileName;
		return true;
	}

}