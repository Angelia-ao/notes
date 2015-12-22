<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>一键快捷——商户API后台下单</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>

<?php
//初始化测试数据
$orderId = rand ( 100000, 999999 );
$merDate = date ( "Ymd" );
?>

<body>
<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>一键快捷——商户API后台下单<span>(带<font color="red">*</font>项为必填)</span>
				</h3>
                   <tr><td colspan="2"><strong>无线类首次请求（Wap/Html5/客户端sdk）及协议支付时的商户后台下单均使用本接口</strong></td></tr>
				<div class="mrmain">
				<form name="subForm" action="./payReqShortCut_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】</th>
                                    <td><input type=text class="wtxt" name="service" value="pay_req_shortcut" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>字符编码【charset】</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /><span><font color="red">*</font></span></td>
								</tr>
                                <tr>
									<th>页面返回地址【ret_url】</th>
									<td><input type=text class="wtxt" name="ret_url"
										value="http://10.10.43.231/demo/pagesV4.0/paymentNotify_2.php" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>结果通知地址【notify_url】</th>
									<td><input type=text class="wtxt" name="notify_url"
										value="http://10.10.43.231/demo/pagesV4.0/paymentNotify_2.php" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>响应数据格式【res_format】</th>
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
								</tr>
								<tr>
									<th>版本号【version】</th>
									<td><input type=text class="wtxt" name="version" value="4.0" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商品号【goods_id】</th>
									<td><input type=text class="wtxt" name="goods_id"
										value="12345678" /></td>
								</tr>
								<tr>
									<th>商品描述信息【goods_inf】</th>
									<td><input type=text class="wtxt" name="goods_inf" value="联动优势" /></td>
								</tr>
								<tr>
									<th>商品订单号【order_id】</th>
									<td><input type=text class="wtxt" name="order_id"
										value="<?php echo $orderId;?>" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商品订单日期【mer_date】</th>
									<td><input type=text class="wtxt" name="mer_date"
										value="<?php echo $merDate;?>" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>付款金额【amount】</th>
									<td><input type=text class="wtxt" name="amount" value="1" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>付款币种【amt_type】</th>
									<td><input type=text class="wtxt" name="amt_type" value="RMB" /><span><font color="red">*</font></span></td>
								</tr>
								<tr>
									<th>商户私有域【mer_priv】</th>
									<td><input type=text class="wtxt" name="mer_priv" value="测试商品" /></td>
								</tr>
								<tr>
									<th>业务扩展信息【expand】</th>
									<td><input type=text class="wtxt" name="expand" value="2342234" /></td>
								</tr>
                                <tr>
									<th>用户ip地址【user_id】</th>
									<td><input type=text class="wtxt" name="user_id"
										value="192.168.1.1" /></td>
								</tr>

								<tr>
									<th>订单过期时常【expire_time】</th>
									<td><input type=text class="wtxt" name="expire_time"
										value="360" /><span>单位：分钟</span></td>
								</tr>
								<tr>
									<th></th>
									<td><div class="pbutton2 pline">
											<input style="width:130px" type="submit" value="提交" class="button" />
										</div></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="FOOTA"><?php include("./bottom.php");?></div>
</body>
<script>

</script>
</html>
