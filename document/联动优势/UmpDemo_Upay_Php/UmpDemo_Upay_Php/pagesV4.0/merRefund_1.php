<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>商户退费服务</title>
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
				<h3>
					商户退费服务<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./merRefund_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
									<td><input type=text class="wtxt" name="service" value="mer_refund" /><span>*</span></td>
								</tr>
								<tr>
									<th>字符编码【charset】：</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /><span>*</span></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】：</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /><span>*</span></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】：</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /><span>*</span></td>
								</tr>
								<tr>
									<th>响应数据格式【res_format】：</th>
									<td><input type=text class="wtxt" name="res_format" value="HTML" /></td>
								</tr>
                                <tr>
									<th>退款结果通知地址【notify_url】：</th>
									<td><input type=text class="wtxt" name="notify_url" value="http://114.113.159.207:8756/pgtest/tnotify0000V4.jsp" /><span>*</span></td>
								</tr>
								<tr>
									<th>退款流水号【refund_no】：</th>
									<td><input type="text"
										value="<?php echo rand(1000000,999999);?>" class="wtxt"
										name="refund_no" /> <span>*</span></td>
								</tr>
								<tr>
									<th>原订单号【order_id】：</th>
									<td><input type="text" value="<?php echo $orderId;?>"
										class="wtxt" name="order_id" /> <span>*</span></td>
								</tr>
								<tr>
									<th>原订单日期【mer_date】：</th>
									<td><input type="text" value="<?php echo $merDate;?>"
										class="wtxt" name="mer_date" /> <span>*</span></td>
								</tr>
								<tr>
									<th>退款金额【refund_amount】：</th>
									<td><input type="text" value="1" class="wtxt" name="refund_amount" />
										<span>*</span></td>
								</tr>
								<tr>
									<th>交易金额【org_amount】：</th>
									<td><input type="text" value="1" class="wtxt"
										name="org_amount" /> <span>*</span></td>
								</tr>
								<tr>
									<th>版本号【version】：</th>
									<td><input type="text" value="4.0" class="wtxt" name="version" />
										<span>*</span></td>
								</tr>
								<tr>
									<th></th>
									<td><div class="pbutton2 pline">
											<input type="submit" value="提交" class="button" />
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
</html>
<script>
</script>