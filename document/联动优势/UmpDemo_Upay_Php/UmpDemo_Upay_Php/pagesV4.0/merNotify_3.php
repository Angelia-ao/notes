<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
//引入API文件
require_once ('plat2Mer.php');
require_once ('mer2Plat.php');
//获取联动平台支付结果通知数据（商户应采取循环遍历方式获取平台通知数据,不应采取固定编码的方式获取固定字段，
	//否则当平台通知数据发生变化时，容易出现接收数据验签不通过情况）
$data = new HashMap ();
$data->put ( "service", $_REQUEST ['service'] );
$data->put ( "charset", $_REQUEST ['charset'] );
$data->put ( "mer_id", $_REQUEST ['mer_id'] );
$data->put ( "sign_type", $_REQUEST ['sign_type'] );
$data->put ( "order_id", $_REQUEST ['order_id'] );
$data->put ( "mer_date", $_REQUEST ['mer_date'] );
$data->put ( "trade_no", $_REQUEST ['trade_no'] );
if($_REQUEST ['goods_id']!=null)
$data->put ( "goods_id", $_REQUEST ['goods_id'] );
$data->put ( "pay_date", $_REQUEST ['pay_date'] );
$data->put ( "amount", $_REQUEST ['amount'] );
$data->put ( "amt_type", $_REQUEST ['amt_type'] );
$data->put ( "pay_type", $_REQUEST ['pay_type'] );
if($_REQUEST ['media_id']!=null)
$data->put ( "media_id", $_REQUEST ['media_id'] );
if($_REQUEST ['media_type']!=null)
$data->put ( "media_type", $_REQUEST ['media_type'] );
$data->put ( "settle_date", $_REQUEST ['settle_date'] );
if($_REQUEST ['mer_priv']!=null)
$data->put ( "mer_priv", $_REQUEST ['mer_priv'] );
$data->put ( "trade_state", $_REQUEST ['trade_state'] );
$data->put ( "pay_seq", $_REQUEST ['pay_seq'] );
if($_REQUEST ['error_code']!=null)
$data->put ( "error_code", $_REQUEST ['error_code'] );
if($_REQUEST ['gate_id']!=null)
$data->put ( "gate_id", $_REQUEST ['gate_id'] );
if($_REQUEST ['identity_type']!=null)
$data->put ( "identity_type", $_REQUEST ['identity_type'] );
if($_REQUEST ['identity_code']!=null)
$data->put ( "identity_code", $_REQUEST ['identity_code'] );
if($_REQUEST ['card_holder']!=null)
$data->put ( "card_holder", $_REQUEST ['card_holder'] );
if($_REQUEST ['last_four_cardid']!=null)
$data->put ( "last_four_cardid", $_REQUEST ['last_four_cardid'] );
if($_REQUEST ['usr_busi_agreement_id']!=null)
$data->put ( "usr_busi_agreement_id", $_REQUEST ['usr_busi_agreement_id'] );
if($_REQUEST ['usr_pay_agreement_id']!=null)
$data->put ( "usr_pay_agreement_id", $_REQUEST ['usr_pay_agreement_id'] );
$data->put ( "version", $_REQUEST ['version'] );
$data->put ( "sign", $_REQUEST ['sign'] );

//获取请求数据
$service = $data->get ( "service" );
$charset = $data->get ( "charset" );
$mer_id = $data->get ( "mer_id" );
$sign_type = $data->get ( "sign_type" );
$order_id = $data->get ( "order_id" );
$mer_date = $data->get ( "mer_date" );
$trade_no = $data->get ( "trade_no" );
$goods_id = $data->get ( "goods_id" );
$pay_date = $data->get ( "pay_date" );
$amount = $data->get ( "amount" );
$amt_type = $data->get ( "amt_type" );
$pay_type = $data->get ( "pay_type" );
$media_id = $data->get ( "media_id" );
$media_type = $data->get ( "media_type" );
$settle_date = $data->get ( "settle_date" );
$mer_priv = $data->get ( "mer_priv" );
$trade_state = $data->get ( "trade_state" );
$pay_seq = $data->get ( "pay_seq" );
$error_code = $data->get ( "error_code" );
$gate_id = $data->get ( "gate_id" );
$identity_type = $data->get ( "identity_type" );
$identity_code = $data->get ( "identity_code" );
$card_holder = $data->get ( "card_holder" );
$last_four_cardid = $data->get ( "last_four_cardid" );
$usr_busi_agreement_id = $data->get ( "usr_busi_agreement_id" );
$usr_pay_agreement_id = $data->get ( "usr_pay_agreement_id" );
$version = $data->get ( "version" );
$sign = $data->get ( "sign" );


//获取UMPAY平台请求商户的支付结果通知数据,并对请求数据进行验签,此时商户接收到的支付结果通知会存放在这里,商户可以根据此处的trade_state订单状态来更新订单
$resData = new HashMap ();
	try{
		//获取UMPAY平台请求商户的支付结果通知数据,并对请求数据进行验签
		//如验证平台签名正确，即应响应UMPAY平台返回码为0000。【响应返回码代表通知是否成功，和通知的交易结果（支付失败、支付成功）无关】
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
//注意！商户在自己开发的过程中，请删除所有的中文注释，保证服务器接收响应的过程中不会英文导致乱码。
?><head>
<META NAME="MobilePayPlatform" CONTENT="<?php echo $data;?>" />
</head>
</html>
