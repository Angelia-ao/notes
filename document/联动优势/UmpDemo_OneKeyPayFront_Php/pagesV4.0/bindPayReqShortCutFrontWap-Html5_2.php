<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>用户主动签约绑卡（WAP/Html5）</title>
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
$merId = $_REQUEST ['merId'];
$ret_url = $_REQUEST ['ret_url'];
$merCustId = $_REQUEST ['merCustId'];
$signType = $_REQUEST ['signType'];

$identityType = $_REQUEST ['identityType'];
$identity_code = $_REQUEST ['identity_code'];
$card_holder = $_REQUEST ['card_holder'];

$payType = $_REQUEST ['payType'];
$gateId = $_REQUEST ['gateId'];

$mobileId = $_REQUEST ['mobileId'];
$canModifyFlag = $_REQUEST ['canModifyFlag'];


$map = new HashMap ();
$map->put ( "merId", $merId );
$map->put ( "merCustId", $merCustId );
$map->put ( "ret_url", $ret_url );
$map->put ( "signType", $signType );

$map->put ( "identityType", $identityType );
$map->put ( "identity_code", $identity_code );
$map->put ( "card_holder", $card_holder );

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
	//单独对身份证号和姓名进行加密处理。
	
	$retUrl = "";
	$retUrl = urlencode($ret_url);
	//对前台返回url地址进行url编码。
	
$sign = urlencode(SignUtil::sign2("merId"."=".$merId."&"."merCustId"."=".$merCustId,$merId));

//注：需要签名的参数范例：merId=9995&merCustId=123456
//生成请求所需签名

$plain = "&merId=".$merId."&merCustId=".$merCustId."&retUrl=".$retUrl."&signType=".$signType."&identityType=".$identityType."&identityCode=".$identityCode."&cardHolder=".$cardHolder."&payType=".$payType."&gateId=".$gateId."&mobileId=".$mobileId."&canModifyFlag=".$canModifyFlag;

//生成请求的字符串。

$wap_url = "https://m.soopay.net/q/xhtml/protIndex.do?".$plain."&sign=".$sign;

$html5_url = "https://m.soopay.net/q/html5/protIndex.do?".$plain."&sign=".$sign;
;

?>

  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>用户主动签约绑卡（WAP/Html5）</h3>
				<div class="mrmain">

					<table>
						<tbody>
							<tr>
								<th nowrap>商户号【merId】：</th>
								<td nowrap><strong><?php echo $_REQUEST['merId'];?></strong></td>
							</tr>
                            <tr>
								<th nowrap>前台页面同步跳转通知【retUrl】:</th>
								<td nowrap><strong><?php echo $_REQUEST['ret_url'];?></strong></td>
							</tr>
                            	<tr>
								<th nowrap>商户用户标识【merCustId】：</th>
								<td nowrap><strong><?php echo $_REQUEST['merCustId'];?></strong></td>
							</tr>
                            <tr>
								<th nowrap>签名方式【signType】：</th>
								<td nowrap><strong><?php echo $_REQUEST['signType'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>证件类型【identityType】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identityType'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>证件号【identityCode】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_code'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>持卡人姓名【cardHolder】：</th>
								<td nowrap><strong><?php echo $_REQUEST['card_holder'];?></strong></td>
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
                  <th valign="top" nowrap>签名明文：</th>
                  <td><textarea cols="40" rows="5" readonly="readonly"><?php echo $plain;?></textarea></td>
                </tr>
                <tr>
								<th valign="top" nowrap>签名串【sign】：</th>
								<td><textarea name="sign" cols="40" rows="5" readonly="readonly"><?php echo $sign;?></textarea></td>
							</tr>
                              <tr>
                  <th valign="top" nowrap>请求url【url】：</th>
                  <td><textarea name="url" cols="40" rows="5" readonly="readonly"><?php echo $wap_url;?></textarea></td>
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