﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>历史订单查询（支持12个月）</title>
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
				<h3>历史订单查询（支持12个月）<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./merOrderInfoQuery_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
									<td><select name="service">
											<option value="mer_order_info_query" selected>查询订单（支持12月）</option>
									</select></td>
								</tr>
								<tr>
									<th>字符编码【charset】：</th>
									<td><input type=text class="wtxt" name="charset" value="UTF-8" /></td>
								</tr>
								<tr>
									<th>商户编号【mer_id】：</th>
									<td><input type=text class="wtxt" name="mer_id" value="6245" /></td>
								</tr>
								<tr>
									<th>签名方式【sign_type】：</th>
									<td><input type=text class="wtxt" name="sign_type" value="RSA" /></td>
								</tr>
								<tr>
									<th>响应数据格式【res_format】：</th>
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
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
									<th>版本号【version】：</th>
									<td><input type="text" value="4.0" class="wtxt" name="version" />
										<span>*</span></td>
								</tr>
								<tr>
								<th >订单类型:</th>
							    	<td><select name="order_type">
							    		<option value="">不传值(默认消费订单)</option>
							    		<option value="1">消费</option>
							    		<option value="2">预授权</option>
							    	</select></td>
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