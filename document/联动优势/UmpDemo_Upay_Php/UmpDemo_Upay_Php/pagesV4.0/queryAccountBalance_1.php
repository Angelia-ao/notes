<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>商户结算账户余额查询</title>
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
				<h3>商户结算账户余额查询<span>(带*项为必填)</span></h3>
				<div class="mrmain">
					<form name="subForm" action="./queryAccountBalance_2.php" method="post"
						style="margin: 0px">
						<table>
							<tbody>
								<tr>
									<th>接口名称【service】：</th>
									<td><select name="service">
											<option value="mer_cancel" selected>撤销交易</option>
									</select></td>
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
									<td><input type=text class="wtxt" name="res_format"
										value="HTML" /></td>
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