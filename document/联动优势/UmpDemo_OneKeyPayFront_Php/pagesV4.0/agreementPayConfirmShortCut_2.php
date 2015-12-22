<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷--确认支付</title>
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
$service = $_REQUEST ['service'];
$charset = $_REQUEST ['charset'];
$mer_id = $_REQUEST ['mer_id'];
$sign_type = $_REQUEST ['sign_type'];
$res_format = $_REQUEST ['res_format'];
$version = $_REQUEST ['version'];
$trade_no = $_REQUEST ['trade_no'];
$verify_code = $_REQUEST ['verify_code'];
//使用协议进行支付，上送如下参数：支付协议号必填、商户用户标识和用户业务协议号必填其一
$mer_cust_id = $_REQUEST ['mer_cust_id'];
$usr_busi_agreement_id = $_REQUEST ['usr_busi_agreement_id'];
$usr_pay_agreement_id = $_REQUEST ['usr_pay_agreement_id'];
//在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证
$valid_date = $_REQUEST ['valid_date'];
$cvv2 = $_REQUEST ['cvv2'];

$birthday = $_REQUEST ['birthday'];



$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "version", $version );
$map->put ( "trade_no", $trade_no );
$map->put ( "verify_code", $verify_code );
//使用协议进行支付，上送如下参数：支付协议号必填、商户用户标识和用户业务协议号必填其一
$map->put ( "mer_cust_id", $mer_cust_id );
$map->put ( "usr_busi_agreement_id", $usr_busi_agreement_id );
$map->put ( "usr_pay_agreement_id", $usr_pay_agreement_id );
//在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证
$map->put ( "valid_date", $valid_date );
$map->put ( "cvv2", $cvv2 );

$map->put ( "birthday", $birthday );


$reqData = MerToPlat::makeRequestDataByGet ( $map ); //这个是重要的
$sign = $reqData->getSign (); //这个是为了在本DEMO中显示签名结果。
$plain = $reqData->getPlain (); //这个是为了在本DEMO中显示签名原串
$url = $reqData->getUrl ();

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
								<th nowrap>接口名称【service】：</th>
								<td nowrap><strong><?php echo $_REQUEST['service'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>字符编码【charset】：</th>
								<td nowrap><strong><?php echo $_REQUEST['charset'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>商户编号【mer_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>签名方式【sign_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['sign_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>响应数据格式【res_format】：</th>
								<td nowrap><strong><?php echo $_REQUEST['res_format'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>版本号【version】：</th>
								<td nowrap><strong><?php echo $_REQUEST['version'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>U付交易号【trade_no】：</th>
								<td nowrap><strong><?php echo $_REQUEST['trade_no'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>短信验证码【verify_code】：</th>
								<td nowrap><strong><?php echo $_REQUEST['verify_code'];?></strong></td>
							</tr>
                            
                            <tr>
								<th nowrap>商户用户标识【mer_cust_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_cust_id'];?></strong></td>
							</tr>
							<tr>
			                  <th>用户业务协议号【usr_busi_agreement_id】：</th>
			                  <td ><strong><?php echo $_REQUEST['usr_busi_agreement_id'];?></strong></td>
			                </tr>
			               <tr>
			                  <th>支付协议号【usr_pay_agreement_id】：</th>
			                  <td><strong><?php echo $_REQUEST['usr_pay_agreement_id'];?></strong></td>
			                </tr>
						 <tr><td colspan="2"><strong>在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证：</strong></td></tr>
							<tr>
								<th nowrap>有效期【valid_date】：</th>
								<td><strong><?php echo $_REQUEST['valid_date'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>cvv2【cvv2】：</th>
								<td nowrap><strong><?php echo $_REQUEST['cvv2'];?></strong></td>
							</tr>
                            
                            	<tr>
								<th nowrap>出生日期【birthday】：</th>
								<td nowrap><strong><?php echo $_REQUEST['birthday'];?></strong></td>
							</tr>
                            	
							<tr>
								<th valign="top" nowrap>签名串【sign】：</th>
								<td><textarea name="sign" cols="40" rows="5" readonly="readonly"><?php echo $sign;?></textarea></td>
							</tr>
							
							<tr>
								<td colspan="2"><div class="pbutton2 pline" align="center">
										<input type="submit" value="提交" class="button"
											onClick="if(confirm('数据将提交到联动优势支付平台，是否继续？'))location.href= '<?php echo $url; ?>';else{return false;}" />
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
//调用确认支付，生成请求URL代码

require_once ('mer2Plat.php');
$service = $_REQUEST ['service'];
$charset = $_REQUEST ['charset'];
$mer_id = $_REQUEST ['mer_id'];
$sign_type = $_REQUEST ['sign_type'];
$res_format = $_REQUEST ['res_format'];
$version = $_REQUEST ['version'];
$trade_no = $_REQUEST ['trade_no'];
$verify_code = $_REQUEST ['verify_code'];
//使用协议进行支付，上送如下参数：支付协议号必填、商户用户标识和用户业务协议号必填其一
$mer_cust_id = $_REQUEST ['mer_cust_id'];
$usr_busi_agreement_id = $_REQUEST ['usr_busi_agreement_id'];
$usr_pay_agreement_id = $_REQUEST ['usr_pay_agreement_id'];
//在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证
$valid_date = $_REQUEST ['valid_date'];
$cvv2 = $_REQUEST ['cvv2'];

$birthday = $_REQUEST ['birthday'];



$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "version", $version );
$map->put ( "trade_no", $trade_no );
$map->put ( "verify_code", $verify_code );
//使用协议进行支付，上送如下参数：支付协议号必填、商户用户标识和用户业务协议号必填其一
$map->put ( "mer_cust_id", $mer_cust_id );
$map->put ( "usr_busi_agreement_id", $usr_busi_agreement_id );
$map->put ( "usr_pay_agreement_id", $usr_pay_agreement_id );
//在协议支付中，商户可选传如下参数，作为验证用户支付要素的凭证
$map->put ( "valid_date", $valid_date );
$map->put ( "cvv2", $cvv2 );

$map->put ( "birthday", $birthday );


$reqData = MerToPlat::makeRequestDataByGet ( $map ); //这个是重要的
$sign = $reqData->getSign (); //这个是为了在本DEMO中显示签名结果。
$plain = $reqData->getPlain (); //这个是为了在本DEMO中显示签名原串
$url = $reqData->getUrl ();
///结束

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
</script>