<?php
	//禁用错误报告
// 	error_reporting(0);
	//报告运行时错误
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//报告所有错误
// 	error_reporting(E_ALL);
	//商户的私钥路径
	define("privatekey",'E:\cert\6374_CeShiShangHu.key.pem');
	//商户私钥配置地址,如果需要按商户配置私钥地址，则在map中添加“商户号=私钥绝对路径”即可
// 	global $mer_pk ;//= array();
	$mer_pk = array();
	$mer_pk['9995'] = 'E:\cert\testMer.key.pem';
	$mer_pk['9996'] = 'E:\cert\testMer.key.pem';
	$mer_pk['6245'] = 'E:\cert\6245_UFuCeShiSH.key.pem';
	
	//UMPAY的平台证书路径
	define("platcert",'E:\cert\cert_2d59.cert.pem');
	//日志生成目录
	define("logpath","D:\\phplog1\\umpLog.log");
	//记录日志文件的同时是否在页面输出:要输出为true,否则为false
	define("log_echo",false);
	//UMPAY平台地址,根据实际情况修改
	define("plat_url","http://pay.soopay.net");
	//支付产品名称:标准支付spay 
	define("plat_pay_product_name","spay");
	return $mer_pk;
?>