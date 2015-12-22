<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>U付直连付款申请</title>
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

$notify_url = $_REQUEST ['notify_url'];
$version = $_REQUEST ['version'];

$order_id = $_REQUEST ['order_id'];
$mer_date = $_REQUEST ['mer_date'];

$amount = $_REQUEST ['amount'];
$recv_account_type = $_REQUEST ['recv_account_type'];
$recv_bank_acc_pro = $_REQUEST ['recv_bank_acc_pro'];
$recv_account = $_REQUEST ['recv_account'];
$recv_user_name = $_REQUEST ['recv_user_name'];
$identity_type = $_REQUEST ['identity_type'];
$identity_code = $_REQUEST ['identity_code'];
$identity_holder = $_REQUEST ['identity_holder'];
$media_type = $_REQUEST ['media_type'];
$media_id = $_REQUEST ['media_id'];
$recv_gate_id = $_REQUEST ['recv_gate_id'];
$purpose = $_REQUEST ['purpose'];
$prov_name = $_REQUEST ['prov_name'];
$city_name = $_REQUEST ['city_name'];
$bank_brhname = $_REQUEST ['bank_brhname'];

$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "notify_url", $notify_url );
$map->put ( "version", $version );

$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );

$map->put ( "amount", $amount );
$map->put ( "recv_account_type", $recv_account_type );
$map->put ( "recv_bank_acc_pro", $recv_bank_acc_pro );
$map->put ( "recv_account", $recv_account );
$map->put ( "recv_user_name", $recv_user_name );
$map->put ( "identity_type", $identity_type );
$map->put ( "identity_code", $identity_code );
$map->put ( "identity_holder", $identity_holder );
$map->put ( "media_type", $media_type );
$map->put ( "media_id", $media_id );
$map->put ( "recv_gate_id", $recv_gate_id );
$map->put ( "purpose", $purpose );
$map->put ( "prov_name", $prov_name );
$map->put ( "city_name", $city_name );
$map->put ( "bank_brhname", $bank_brhname );

$reqData = MerToPlat::requestTransactionsByGet ( $map ); //这个是重要的
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
								<th nowrap>结果通知地址【notify_url】：</th>
								<td nowrap><strong><?php echo $_REQUEST['notify_url'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>版本号【version】：</th>
								<td nowrap><strong><?php echo $_REQUEST['version'];?></strong></td>
							</tr>
							
							<tr>
								<th nowrap>商品订单号【order_id】：</th>
								<td><strong><?php echo $_REQUEST['order_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>商品订单日期【mer_date】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_date'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>付款金额【amount】：</th>
								<td nowrap><strong><?php echo $_REQUEST['amount'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方账户类型【recv_account_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['recv_account_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方账户属性【recv_bank_acc_pro】：</th>
								<td nowrap><strong><?php echo $_REQUEST['recv_bank_acc_pro'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方账号【recv_account】：</th>
								<td nowrap><strong><?php echo $_REQUEST['recv_account'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方户名【recv_user_name】：</th>
								<td nowrap><strong><?php echo $_REQUEST['recv_user_name'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方证件类型【identity_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方平台预留证件号码【identity_code】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_code'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>证件持有人真实姓名【identity_holder】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_holder'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>媒介标识【media_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['media_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>媒介类型【media_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['media_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>收款方账户发卡行【recv_gate_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['recv_gate_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>摘要【purpose】：</th>
								<td nowrap><strong><?php echo $_REQUEST['purpose'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>省【prov_name】：</th>
								<td nowrap><strong><?php echo $_REQUEST['prov_name'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>市【city_name】：</th>
								<td nowrap><strong><?php echo $_REQUEST['city_name'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>开户行支行全称【bank_brhname】：</th>
								<td nowrap><strong><?php echo $_REQUEST['bank_brhname'];?></strong></td>
							</tr>
							<tr>
								<th valign="top" nowrap>签名串【sign】：</th>
								<td><textarea name="sign" cols="40" rows="5" readonly="readonly"><?php echo $sign;?></textarea></td>
							</tr>
							<!-- 
				<tr>
                  <th valign="top" nowrap>签名明文：</th>
                  <td><textarea cols="40" rows="5" readonly="readonly"><?php echo $plain;?></textarea></td>
                </tr>
                 -->
							<tr>
								<td colspan="2"><div class="pbutton2 pline" align="center">
										<input type="susplitt" value="提交" class="button"
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
//调用付款API下单，生成请求URL代码
require_once ('mer2Plat.php');
$service = $_REQUEST ['service'];
$charset = $_REQUEST ['charset'];
$mer_id = $_REQUEST ['mer_id'];
$sign_type = $_REQUEST ['sign_type'];
$res_format = $_REQUEST ['res_format'];
$ret_url = $_REQUEST ['ret_url'];
$notify_url = $_REQUEST ['notify_url'];
$version = $_REQUEST ['version'];

$order_id = $_REQUEST ['order_id'];
$mer_date = $_REQUEST ['mer_date'];

$amount = $_REQUEST ['amount'];
$recv_account_type = $_REQUEST ['recv_account_type'];
$recv_bank_acc_pro = $_REQUEST ['recv_bank_acc_pro'];
$recv_account = $_REQUEST ['recv_account'];
$recv_user_name = $_REQUEST ['recv_user_name'];
$identity_type = $_REQUEST ['identity_type'];
$identity_code = $_REQUEST ['identity_code'];
$identity_holder = $_REQUEST ['identity_holder'];
$media_type = $_REQUEST ['media_type'];
$media_id = $_REQUEST ['media_id'];
$recv_gate_id = $_REQUEST ['recv_gate_id'];
$purpose = $_REQUEST ['purpose'];
$prov_name = $_REQUEST ['prov_name'];
$city_name = $_REQUEST ['city_name'];
$bank_brhname = $_REQUEST ['bank_brhname'];

$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "ret_url", $ret_url );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "notify_url", $notify_url );
$map->put ( "version", $version );

$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );

$map->put ( "amount", $amount );
$map->put ( "recv_account_type", $recv_account_type );
$map->put ( "recv_bank_acc_pro", $recv_bank_acc_pro );
$map->put ( "recv_account", $recv_account );
$map->put ( "recv_user_name", $recv_user_name );
$map->put ( "identity_type", $identity_type );
$map->put ( "identity_code", $identity_code );
$map->put ( "identity_holder", $identity_holder );
$map->put ( "media_type", $media_type );
$map->put ( "media_id", $media_id );
$map->put ( "recv_gate_id", $recv_gate_id );
$map->put ( "purpose", $purpose );
$map->put ( "prov_name", $prov_name );
$map->put ( "city_name", $city_name );
$map->put ( "bank_brhname", $bank_brhname );

$reqData = MerToPlat::requestTransactionsByGet ( $map ); //这个是重要的
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