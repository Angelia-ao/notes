<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键支付-wap/html5引导链接前台确认支付请求</title>
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
<?php
require_once ('mer2Plat.php');
$tradeNo = $_REQUEST ['tradeNo'];
$identityType = $_REQUEST ['identityType'];
$identity_Code = $_REQUEST ['identity_Code'];
$card_Holder = $_REQUEST ['card_Holder'];
$merCustId = $_REQUEST ['merCustId'];
$payType = $_REQUEST ['payType'];
$gateId = $_REQUEST ['gateId'];
$mobileId = $_REQUEST ['mobileId'];
$canModifyFlag = $_REQUEST ['canModifyFlag'];


$map = new HashMap ();
$map->put ( "tradeNo", $tradeNo );
$map->put ( "identityType", $identityType );
$map->put ( "identity_Code", $identity_Code );
$map->put ( "card_Holder", $card_Holder );
$map->put ( "merCustId", $merCustId );
$map->put ( "payType", $payType );
$map->put ( "gateId", $gateId );
$map->put ( "mobileId", $mobileId );
$map->put ( "canModifyFlag", $canModifyFlag );


	$identityCode = "";
	$cardHolder = "";
	
	if($_REQUEST ['identity_Code']!= "" && $_REQUEST ['card_Holder']!= ""){
		//对身份证号和姓名进行加密。该方法需要引用到php加密相关方法。
  		$identityCode = urlencode( RSACryptUtil::encrypt (iconv("UTF-8", "GBK", $identity_Code )));
		$cardHolder = urlencode(RSACryptUtil::encrypt (iconv("UTF-8", "GBK", $card_Holder )));
		
	}else{
		
		$identityCode = $identity_Code;
		$cardHolder = $card_Holder;
	}

$wap_url = "https://m.soopay.net/q/xhtml/index.do?tradeNo=".$tradeNo."&identityType=".$identityType."&identityCode=".$identityCode."&cardHolder=".$cardHolder."&merCustId".$merCustId."&payType=".$payType."&gateId=".$gateId."&canModifyFlag=".$canModifyFlag."&mobileId=".$mobileId;

$html5_url = "https://m.soopay.net/q/html5/index.do?tradeNo=".$tradeNo."&identityType=".$identityType."&identityCode=".$identityCode."&cardHolder=".$cardHolder."&merCustId".$merCustId."&payType=".$payType."&gateId=".$gateId."&mobileId=".$mobileId;


?>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>提交信息及签名查看</h3>
				<div class="mrmain">

					<table>
						<tbody>
							<tr>
								<th nowrap>U付订单号【tradeNo】：</th>
								<td nowrap><strong><?php echo $_REQUEST['tradeNo'];?></strong></td>
							</tr>
                            		<tr><td colspan="2"><strong>如用户未在商户端留存证件信息，证件信息，证件号，持卡人姓名参数可以不传值，但需传递该参数。</strong></td></tr>
							<tr>
								<th nowrap>证件类型【identityType】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identityType'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>证件号【identityCode】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_Code'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>持卡人姓名【card_Holder】：</th>
								<td nowrap><strong><?php echo $_REQUEST['card_Holder'];?></strong></td>
							</tr>
                               <tr><td colspan="2"><strong>对于"商户用户标识"：首次支付时：如果输入该值，且用户在联动的收银台上同意一键快捷服务协议，则会注册一键快捷用户业务协议；如果没有输入，平台不会注册用户业务协议。</strong></td></tr>
                            	<tr>
								<th nowrap>商户用户标识【merCustId】：</th>
								<td nowrap><strong><?php echo $_REQUEST['merCustId'];?></strong></td>
							</tr>
                             <tr><td colspan="2"><strong>支付方式和银行必须同时传递或者同时不传递。</strong></td></tr>
               <tr><td colspan="2"><strong>如果同时传递，则直接跳转至已选择银行，如果同时不传递，则引导链接跳转为收银台模式</strong></td></tr>
							<tr>
								<th nowrap>支付方式【payType】：</th>
								<td nowrap><strong><?php echo $_REQUEST['payType'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>卡对应银行【gateId】：</th>
								<td nowrap><strong><?php echo $_REQUEST['gateId'];?></strong></td>
							</tr>
                            <tr>
								<th nowrap>银行预留手机号【mobileId】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mobileId'];?></strong></td>
							</tr>
                              <tr><td colspan="2"><strong>*是否用户在联动平台上修改商户在首次支付中上送的用户的支付要素如card_id，card_holder等*</strong></td></tr>
							<tr>
								<th nowrap>是否允许用户修改支付要素【canModifyFlag】：</th>
								<td nowrap><strong><?php echo $_REQUEST['canModifyFlag'];?></strong></td>
							</tr>
	
							
							<tr>
								<td colspan="2"><div class="pbutton2 pline" align="center">
										<input type="submit" value="wap方式支付" class="button"
											onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $wap_url; ?>';else{return false;}" /><input type="submit" value="html5方式支付" class="button"
											onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $html5_url; ?>';else{return false;}" />
									
									</div></td>
							</tr>
						</tbody>
					</table>


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
</script>