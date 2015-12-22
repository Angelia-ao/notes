<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
//引入API文件
require_once ('plat2Mer.php');
require_once ('mer2Plat.php');
//获取联动平台调理阿敏结果通知数据（商户应采取循环遍历方式获取平台通知数据,不应采取固定编码的方式获取固定字段，
	//否则当平台通知数据发生变化时，容易出现接收数据验签不通过情况）

$data = new HashMap ();
$data->put ( "mer_date", $_REQUEST ['mer_date'] );
if($_REQUEST ['error_code']!=null)
$data->put ( "mer_id", $_REQUEST ['mer_id'] );
$data->put ( "order_id", $_REQUEST ['order_id'] );
$data->put ( "refund_amt", $_REQUEST ['refund_amt'] );
$data->put ( "refund_no", $_REQUEST ['refund_no'] );
$data->put ( "refund_state", $_REQUEST ['refund_state'] );
$data->put ( "version", $_REQUEST ['version'] );
$data->put ( "sign", $_REQUEST ['sign'] );
$data->put ( "sign_type", $_REQUEST ['sign_type'] );




//获取请求数据
$mer_date = $data->get ( "mer_date" );
$mer_id = $data->get ( "mer_id" );
$order_id = $data->get ( "order_id" );
$refund_amt = $data->get ( "refund_amt" );
$refund_no = $data->get ( "refund_no" );
$refund_state = $data->get ( "refund_state" );
$version = $data->get ( "version" );
$sign = $data->get ( "sign" );
$sign_type = $data->get ( "sign_type" );


//获取UMPAY平台请求商户的退款结果通知数据,并对请求数据进行验签,此时商户接收到的退款结果通知会存放在这里,商户可以根据此处的trade_state订单状态来更新订单
$resData = new HashMap ();
	try{
		//获取UMPAY平台请求商户的退款结果通知数据,并对请求数据进行验签
		//如验证平台签名正确，即应响应UMPAY平台返回码为0000。【响应返回码代表通知是否成功，和通知的退款结果】
		//验签支付结果通知 如验签成功，则返回ret_code=0000
$reqData = PlatToMer::getNotifyRequestData ( $data );
		
		$resData->put("ret_code","0000");
	} catch (Exception $e){
		//如果验签失败，则抛出异常，返回ret_code=1111
		System.out.printf("验证签名发生异常" + $e);
		
		$resData->put("ret_code","1111");
	}
	//验签后的数据都组织在resData中。
    //生成平台响应UMPAY平台数据,将该串放入META标签，以下几个参数为结果通知必备参数
		

//生成平台响应UMPAY平台数据,将该串放入META标签

$resData->put ( "mer_id", $data->get ( "mer_id" ) );
$resData->put ( "sign_type", $data->get ( "sign_type" ) );
$resData->put ( "mer_date", $data->get ( "mer_date" ) );
$resData->put ( "order_id", $data->get ( "order_id" ) );
$resData->put ( "version", $data->get ( "version" ) );
$resData->put ( "ret_msg", "success" );
$data = MerToPlat::notifyResponseData ( $resData );

	//注意！商户在自己开发的过程中，请删除head里的中文，保证服务器接收响应的过程中不会英文导致乱码。商户开发请参照merNotify_3页面。

?><head>
<META NAME="MobilePayPlatform" CONTENT="<?php echo $data;?>" />
</head>
</html>
