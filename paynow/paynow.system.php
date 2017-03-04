<?php
defined('PAYNOWPATH') OR exit('No direct script access allowed');
class paynowSystem{



	/**
	 * 反馈给使用者相关信息
	 * @param  [type] $state  [description]
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	public function reslut($state , $params = array()){
		echo '<pre>';
		$reslut = array('state' => $state ? 'true' : 'false');
		is_array($params) ? $reslut['params'] = $params : $reslut['message'] = $params;
		print_r($reslut);
		exit;
	}
}