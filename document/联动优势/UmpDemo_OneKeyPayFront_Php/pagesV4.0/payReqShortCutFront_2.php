<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷-前台支付请求</title>
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
$ret_url = $_REQUEST ['ret_url'];
$notify_url = $_REQUEST ['notify_url'];
$version = $_REQUEST ['version'];
$goods_id = $_REQUEST ['goods_id'];
$goods_inf = $_REQUEST ['goods_inf'];
$order_id = $_REQUEST ['order_id'];
$mer_date = $_REQUEST ['mer_date'];
$expire_time = $_REQUEST ['expire_time'];
$expand = $_REQUEST ['expand'];
$mer_priv = $_REQUEST ['mer_priv'];
$amount = $_REQUEST ['amount'];
$amt_type = $_REQUEST ['amt_type'];
$pay_type = $_REQUEST ['pay_type'];
$gate_id = $_REQUEST ['gate_id'];
$user_ip = $_REQUEST ['user_ip'];
//如商户不传递商户用户标识参数，或用户在支付时，不选择同意快捷支付协议，则平台在用户支付完成后， 给商户下发的支付结果通知中不返回"用户业务协议号"和"支付协议号"。同时如该用户再次进行支付时， 所使用的依然是首次支付请求类型。
$mer_cust_id = $_REQUEST ['mer_cust_id'];
//针对首次支付，商户可以选择上送如下支付要素，联动会将商户上送的参数展示给用户，由用户补全：
$card_id = $_REQUEST ['card_id'];
$valid_date = $_REQUEST ['valid_date'];
$cvv2 = $_REQUEST ['cvv2'];
$media_id = $_REQUEST ['media_id'];
$media_type = $_REQUEST ['media_type'];
$identity_type = $_REQUEST ['identity_type'];
$identity_code = $_REQUEST ['identity_code'];
$card_holder = $_REQUEST ['card_holder'];
 //是否允许用户修改平台页面传递的支付
 $can_modify_flag = $_REQUEST ['can_modify_flag'];




$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "ret_url", $ret_url );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "notify_url", $notify_url );
$map->put ( "goods_id", $goods_id );
$map->put ( "goods_inf", $goods_inf );
$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );
$map->put ( "amount", $amount );
$map->put ( "amt_type", $amt_type );
$map->put ( "pay_type", $pay_type );
$map->put ( "gate_id", $gate_id );
$map->put ( "mer_priv", $mer_priv );
$map->put ( "user_ip", $user_ip );
$map->put ( "expire_time", $expire_time );
$map->put ( "expand", $expand );
$map->put ( "version", $version );
//是否进行协议支付请求参数
$map->put ( "mer_cust_id", $mer_cust_id );
//首次支付要素信息
$map->put ( "card_id", $card_id );
$map->put ( "valid_date", $valid_date );
$map->put ( "cvv2", $cvv2 );
$map->put ( "media_id", $media_id );
$map->put ( "media_type", $media_type );
$map->put ( "identity_type", $identity_type );
$map->put ( "identity_code", $identity_code );
$map->put ( "card_holder", $card_holder );
//是否允许用户修改平台页面传递的支付
$map->put ( "can_modify_flag", $can_modify_flag );

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
								<th nowrap>页面返回地址【ret_url】：</th>
								<td nowrap><strong><?php echo $_REQUEST['ret_url'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>后台通知地址【notify_url】：</th>
								<td nowrap><strong><?php echo $_REQUEST['notify_url'];?></strong></td>
							</tr>
							
							<tr>
								<th nowrap>版本号【version】：</th>
								<td nowrap><strong><?php echo $_REQUEST['version'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>商品号【goods_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['goods_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>商品描述信息【goods_inf】：</th>
								<td nowrap><strong><?php echo $_REQUEST['goods_inf'];?></strong></td>
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
								<th nowrap>付款币种【amt_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['amt_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>默认支付方式【pay_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['pay_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>用户IP地址【user_ip】：</th>
								<td nowrap><strong><?php echo $_REQUEST['user_ip'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>商户私有域【mer_priv】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_priv'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>业务扩展信息【expand】：</th>
								<td nowrap><strong><?php echo $_REQUEST['expand'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>订单过期时常【expire_time】：</th>
								<td nowrap><strong><?php echo $_REQUEST['expire_time'];?></strong></td>
							</tr>
                            <tr><td colspan="2">如商户不传递商户用户表示参数，或用户在支付时，不选择同意快捷支付协议，则平台在用户支付完成后，给商户下发的支付结果通知中不返回"用户业务协议号"和"支付协议号"。同时如该用户再次进行支付时，所使用的依然是首次支付请求类型。</td></tr>
                            <TR>
								<th>商户用户标识【mer_cust_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['mer_cust_id'];?></strong></td>
							</TR>
                             <tr><td colspan="2">针对首次支付，商户可以上送如下支付要素，联动会展示给用户，由用户补全缺少的要素：</td></tr>
							<tr>
								<th nowrap>默认银行【gate_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['gate_id'];?></strong></td>
							</tr>
							<TR>
								<th>卡号【card_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['card_id'];?></strong></td>
							</TR>
                            <tr>
								<th nowrap>媒介标识【media_id】：</th>
								<td nowrap><strong><?php echo $_REQUEST['media_id'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>媒介类型【media_type】：</th>
								<td><strong><?php echo $_REQUEST['media_type'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>有效期【valid_date】：</th>
								<td><strong><?php echo $_REQUEST['valid_date'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>cvv2【cvv2】：</th>
								<td nowrap><strong><?php echo $_REQUEST['cvv2'];?></strong></td>
							</tr>
							<TR>
								<th>证件类型【identity_type】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_type'];?></strong></td>
							</TR>
							<TR>
								<th>证件号【identity_code】：</th>
								<td nowrap><strong><?php echo $_REQUEST['identity_code'];?></strong></td>
							</TR>
							<TR>
								<th>持卡人姓名【card_holder】：</th>
								<td nowrap><strong><?php echo $_REQUEST['card_holder'];?></strong></td>
							</TR>
                            <tr><td colspan="2">*是否用户在联动平台上修改商户在首次支付中上送的用户的支付要素如card_id，card_holder等*不传递则可修改，传递0则不能修改</td></tr>
							<TR>
								<th>是否允许用户修改支付要素【can_modify_flag】：</th>
								<td nowrap><strong><?php echo $_REQUEST['can_modify_flag'];?></strong></td>
							</TR>
							
							
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
                  <td><textarea name="url" cols="40" rows="5" readonly="readonly"><?php echo $url;?></textarea></td>
                </tr>
			
				
            
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
//请求接口，生成请求URL代码
require_once ('mer2Plat.php');
$service = $_REQUEST ['service'];
$charset = $_REQUEST ['charset'];
$mer_id = $_REQUEST ['mer_id'];
$sign_type = $_REQUEST ['sign_type'];
$res_format = $_REQUEST ['res_format'];
$ret_url = $_REQUEST ['ret_url'];
$notify_url = $_REQUEST ['notify_url'];
$version = $_REQUEST ['version'];
$goods_id = $_REQUEST ['goods_id'];
$goods_inf = $_REQUEST ['goods_inf'];
$order_id = $_REQUEST ['order_id'];
$mer_date = $_REQUEST ['mer_date'];
$expire_time = $_REQUEST ['expire_time'];
$expand = $_REQUEST ['expand'];
$mer_priv = $_REQUEST ['mer_priv'];
$amount = $_REQUEST ['amount'];
$amt_type = $_REQUEST ['amt_type'];
$pay_type = $_REQUEST ['pay_type'];
$gate_id = $_REQUEST ['gate_id'];
$user_ip = $_REQUEST ['user_ip'];
//如商户不传递商户用户标识参数，或用户在支付时，不选择同意快捷支付协议，则平台在用户支付完成后， 给商户下发的支付结果通知中不返回"用户业务协议号"和"支付协议号"。同时如该用户再次进行支付时， 所使用的依然是首次支付请求类型。
$mer_cust_id = $_REQUEST ['mer_cust_id'];
//针对首次支付，商户可以选择上送如下支付要素，联动会将商户上送的参数展示给用户，由用户补全：
$card_id = $_REQUEST ['card_id'];
$valid_date = $_REQUEST ['valid_date'];
$cvv2 = $_REQUEST ['cvv2'];
$media_id = $_REQUEST ['media_id'];
$media_type = $_REQUEST ['media_type'];
$identity_type = $_REQUEST ['identity_type'];
$identity_code = $_REQUEST ['identity_code'];
$card_holder = $_REQUEST ['card_holder'];




$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "ret_url", $ret_url );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "notify_url", $notify_url );
$map->put ( "goods_id", $goods_id );
$map->put ( "goods_inf", $goods_inf );
$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );
$map->put ( "amount", $amount );
$map->put ( "amt_type", $amt_type );
$map->put ( "pay_type", $pay_type );
$map->put ( "gate_id", $gate_id );
$map->put ( "mer_priv", $mer_priv );
$map->put ( "user_ip", $user_ip );
$map->put ( "expire_time", $expire_time );
$map->put ( "expand", $expand );
$map->put ( "version", $version );
//是否进行协议支付请求参数
$map->put ( "mer_cust_id", $mer_cust_id );
//首次支付要素信息
$map->put ( "card_id", $card_id );
$map->put ( "valid_date", $valid_date );
$map->put ( "cvv2", $cvv2 );
$map->put ( "media_id", $media_id );
$map->put ( "media_type", $media_type );
$map->put ( "identity_type", $identity_type );
$map->put ( "identity_code", $identity_code );
$map->put ( "card_holder", $card_holder );


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