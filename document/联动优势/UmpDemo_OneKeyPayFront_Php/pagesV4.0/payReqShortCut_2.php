<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷——商户API后台下单</title>
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

$user_ip = $_REQUEST ['user_ip'];

$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "ret_url", $ret_url );
$map->put ( "notify_url", $notify_url );
$map->put ( "version", $version );

$map->put ( "goods_id", $goods_id );
$map->put ( "goods_inf", $goods_inf );
$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );

$map->put ( "amount", $amount );
$map->put ( "amt_type", $amt_type );
$map->put ( "mer_priv", $mer_priv );
$map->put ( "expire_time", $expire_time );
$map->put ( "expand", $expand );
$map->put ( "user_ip", $user_ip );


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
								<th nowrap>前台页面返回地址【ret_url】：</th>
								<td nowrap><strong><?php echo $_REQUEST['ret_url'];?></strong></td>
							</tr>
							<tr>
								<th nowrap>后台结果通知地址【notify_url】：</th>
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
                            	<tr>
								<th nowrap>用户ip地址【user_ip】：</th>
								<td nowrap><strong><?php echo $_REQUEST['user_ip'];?></strong></td>
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
//调用一键快捷API下单，生成请求URL代码

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

$user_ip = $_REQUEST ['user_ip'];

$map = new HashMap ();
$map->put ( "service", $service );
$map->put ( "charset", $charset );
$map->put ( "mer_id", $mer_id );
$map->put ( "sign_type", $sign_type );
$map->put ( "res_format", $res_format );
$map->put ( "ret_url", $ret_url );
$map->put ( "notify_url", $notify_url );
$map->put ( "version", $version );

$map->put ( "goods_id", $goods_id );
$map->put ( "goods_inf", $goods_inf );
$map->put ( "order_id", $order_id );
$map->put ( "mer_date", $mer_date );

$map->put ( "amount", $amount );
$map->put ( "amt_type", $amt_type );
$map->put ( "mer_priv", $mer_priv );
$map->put ( "expire_time", $expire_time );
$map->put ( "expand", $expand );
$map->put ( "user_ip", $user_ip );


$reqData = MerToPlat::makeRequestDataByGet ( $map ); //这个是重要的
$url = $reqData->getUrl ();


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