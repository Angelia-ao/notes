<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>验签平台请求商户结果通知 组织响应平台数据</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>
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

	//注意！商户在自己开发的过程中，请删除head里的中文，保证服务器接收响应的过程中不会英文导致乱码。商户开发请参照merNotify_3页面。


?> 

  <head>
<!-- 商户响应平台支付结果通知，以此来告知平台收到了平台的支付结果通知，否则平台会继续发送支付结果通知 -->
<META NAME="MobilePayPlatform" CONTENT="<?php echo $data;?>" />

<title>解析平台请求商户结果通知 组织响应平台数据</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
<link type="text/css" rel="stylesheet"
	href="../common/syntaxHighlighter/css/SyntaxHighlighter.css"></link>
<script language="javascript"
	src="../common/syntaxHighlighter/js/shCore.js"></script>
<script language="javascript"
	src="../common/syntaxHighlighter/js/shBrushPhp.js"></script>
</head>
<body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
         <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>验签支付结果通知及组织响应平台数据</h3>
                 <div><strong>商户可以根据示例代码进行相关开发工作，可以根据本页面逻辑处理代码来处理商户端收到的响应内容。</strong></div>
          <tr><th><td><strong>本页面可以作为模拟商户接收支付结果通知及验签响应使用。</strong></td></th></tr>
          <tr><th><td><strong>在本页面地址后修改结果通知字符串，并请求，则可以模式平台通知商户及商户生成响应内容，例如本页面地址为：http://localhost:8686/UmpDemo-All/jsp/V4.0/merNotify_2.jsp，则模拟请求为：</strong></td></th></tr>
          <tr><th><td><strong>http://localhost:8686/UmpDemo-All/jsp/V4.0/merNotify_2.jsp?amount=1&amt_type=RMB&charset=UTF-8……&sign_type=RSA,商户可以直接请求，进行本地测试，结果通知字符串可以向联动优势联调负责人沟通获取。 </strong></td></th></tr>
          
              <div><tr><th><td><strong>商户可以直接根据merNotify_3页面来完成己方支付结果通知页面的开发,开发时请注意请勿在"head"中含有中文，否则平台可能获取乱码数据,导致无法获取正常响应数据</strong></td></th></tr></div>
				<div class="mrmain">

					<table>
						<tbody>							
							<tr>
								<th nowrap>商户编号【mer_id】：</th>
								<td nowrap><strong><?php echo $resData->get ( "mer_id" );?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>签名类型【sign_type】：</th>
								<td nowrap><strong><?php echo $resData->get ( "sign_type" );?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>版本号【version】：</th>
								<td nowrap><strong><?php echo $resData->get ( "version" );?></strong></td>
							</tr>
                            <tr>
								<th nowrap>订单号【order_id】：</th>
								<td nowrap><strong><?php echo $resData->get ( "order_id" );?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>订单日期【mer_date】：</th>
								<td nowrap><strong><?php echo $resData->get ( "mer_date" );?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>响应信息【ret_msg】：</th>
								<td nowrap><strong><?php echo $resData->get ( "ret_msg" );?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>验签响应结果【ret_code】：</th>
								<td nowrap><strong><?php echo $resData->get ( "ret_code" );?></strong><span>------验签成功返回0000</span></td>
							</tr>
							<tr>
								<th>商户响应平台数据内容：</th>
								<td><textarea name="mer2plat" cols="40" rows="5"
										readonly="readonly"><?php echo $data;?></textarea></td>
							</tr>
                              <tr><td colspan="2"><strong>在该页面可点击右键→源文件，可以查看验签响应内容，验签响应内容完整正确标准数据内容如下所示，其中META NAME="MobilePayPlatform" CONTENT=""标签头必须且严格按照标准要求。</strong></td></tr>
                            <tr>
								<th>商户响应平台标准数据完整格式：</th>
								<td><textarea name="mer2plat" cols="40" rows="5"
										readonly="readonly"><META NAME="MobilePayPlatform" CONTENT="<?php echo $data;?>" /></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><div class="pbutton2 pline" align="center">
										<input type="button" value="查看代码" class="button"
											onClick="document.getElementById('codeDiv').style.display='block';" />
									</div></td>
							</tr>
						</tbody>
					</table>

					<div id="codeDiv" style="display: none">
						<table width="200" border="0">
							<tr>
								<td><pre name="code" class="php" id="code">

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

	//注意！商户在自己开发的过程中，请删除head里的中文，保证服务器接收响应的过程中不会英文导致乱码。商户开发请参照merNotify_3页面。



						</pre></td>
							</tr>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div id="FOOTA"><?php include("./bottom.php");?></div>
	<script language="javascript">
dp.SyntaxHighlighter.ClipboardSwf = '../common/syntaxHighlighter/js/clipboard.swf';
dp.SyntaxHighlighter.HighlightAll('code');
</script>
</body>
</html>
<script>
document.getElementById("paymentnotify").className="msel";
</script>